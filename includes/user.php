<?php

require_once(LIB_PATH . DS . 'database.php');

class User {

    protected static $table_name = "ndb_users";
    protected static $db_fields = array('us_id', 'us_name', 'us_pass', 'us_level', 'us_salt');
    public $us_id;
    public $us_name;
    public $us_pass;
    public $us_level;
    public $us_salt;
    public $errors = array();
    public $extra = array();
	public $rights = array(
		RIGHT_INSERT_DOC => false,
			RIGHT_EDIT_DOC => false,
			RIGHT_DELETE_DOC => false,
			RIGHT_VIEW_DOC => false,
			RIGHT_USER_CONTROL => false,
			RIGHT_LOG_HISTORY => false
	);
    //public $first_name;
    // public $last_name;
    //public function full_name(){
    //  if(isset($this->first_name)&&isset($this->last_name)){
    //      return $this->first_name." ".$this->last_name;
    //  }else{
    //     return "";
    // }
    //  }


    public static function authentucate($us_name = "", $us_pass = "") {
        global $database;
        $us_name = $database->escape_value($us_name);
        $us_pass = $database->escape_value($us_pass);
        //$us_passed = self::get_encrypted_password($us_pass);
        $check = self::find_by_username($us_name);
		if(empty($us_pass)){
		 return false;
		}
        if(empty($check)) return false;
        
        $us_pass = self::get_encrypted_password($us_pass, $check->us_salt);

        $sql = "SELECT * FROM ndb_users ";
        $sql .= "WHERE us_name = '{$us_name}' ";
        $sql .="And us_pass = '{$us_pass}' ";
        $sql .= "LIMIT 1";
		
        //var_dump($sql);

        $result_array = self::find_by_sql($sql);
        return !empty($result_array) ? array_shift($result_array) : false;
        //return false;
    }

    public static function find_all() {
        return self::find_by_sql("SELECT * FROM " . self::$table_name);
    }

    public function comments() {
        return Comment::find_comments_on($this->id);
    }

    public static function find_by_id($id = 0) {
        global $database;
        $result_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE us_id={$id} LIMIT 1");
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function find_by_username($username = "") {
        global $database;
        $result_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE us_name='{$username}' LIMIT 1");
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function find_by_sql($sql = "") {
        global $database;
        $result_set = $database->query($sql);
        $object_array = array();
        while ($row = $database->fetch_array($result_set)) {
            $object_array[] = self::instantiate($row);
            
        }
        return $object_array;
    }

    public static function count_all() {
        global $database;
        $sql = "SELECT COUNT(*) FROM " . self::$table_name;
        $result_set = $database->query($sql);
        $row = $database->fetch_array($result_set);
        return array_shift($row);
    }

    private static function instantiate($record) {
        $object = new self();

        //  $object->id=$record['id'];
        //   $object->username=$record['username'];
        //     $object->password=$record['password'];
        //     $object->first_name=$record['first_name'];
        //   $object->last_name=$record['last_name'];

        foreach ($record as $attribute => $value) {
            if ($object->has_attribute($attribute)) {
                $object->$attribute = $value;
            }
            
        }
		
        if($object->has_attribute("us_level")){
        	$object->assignRights($object);
        }
		
        return $object;
    }
    
    private function assignRights($user) {
		switch ($user->us_level) {
			case USER_LEVEL_1 :
				$user->rights [RIGHT_INSERT_DOC] = true;
				$user->rights [RIGHT_EDIT_DOC] = true;
				$user->rights [RIGHT_DELETE_DOC] = true;
				$user->rights [RIGHT_VIEW_DOC] = true;
				$user->rights [RIGHT_USER_CONTROL] = true;
				$user->rights [RIGHT_LOG_HISTORY] = true;
				break;
			case USER_LEVEL_2 :
				$user->rights [RIGHT_INSERT_DOC] = true;
				$user->rights [RIGHT_EDIT_DOC] = true;
				$user->rights [RIGHT_DELETE_DOC] = true;
				$user->rights [RIGHT_VIEW_DOC] = true;
				break;
			case USER_LEVEL_3 :
				$user->rights [RIGHT_INSERT_DOC] = true;
				$user->rights [RIGHT_EDIT_DOC] = true;
				$user->rights [RIGHT_VIEW_DOC] = true;
				break;
				
			case USER_LEVEL_4 :
				$user->rights [RIGHT_VIEW_DOC] = true;
				break;
		}
	}

    private function has_attribute($attribute) {
        $object_vars = $this->attributes();

        return array_key_exists($attribute, $object_vars);
    }

    public function attributes() {
        $attributes = array();
        foreach (self::$db_fields as $field) {
            if (property_exists($this, $field)) {
                $attributes[$field] = $this->$field;
            }
        }
        return $attributes;
    }

    protected function sanitized_attributes() {
        global $database;
        $clean_attributes = array();

        foreach ($this->attributes()as $key => $value) {
            $clean_attributes[$key] = $database->escape_value($value);
        }
        return $clean_attributes;
    }

    public function save() {
        return isset($this->id) ? $this->update() : $this->create();
    }

    public function create_user() {
        global $database;
        //create hash before insert
        $this->us_salt = base64_encode(mcrypt_create_iv(16));
        $this->us_pass = self::get_encrypted_password($this->us_pass, $this->us_salt);

        $attributes = $this->attributes();

        $sql = "INSERT INTO " . self::$table_name . " (";
        $sql .= join(", ", array_keys($attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes));
        $sql .= "')";

        if ($database->query($sql)) {
            $this->id = $database->insert_id();
            return true;
        } else {
            return false;
        }
    }

    public function create() {
        global $database;
        //create hash before insert
        $this->password = self::get_encrypted_password($this->password);
        $attributes = $this->attributes();

        $sql = "INSERT INTO " . self::$table_name . " (";
        $sql .= join(", ", array_keys($attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes));
        $sql .= "')";

        if ($database->query($sql)) {
            $this->id = $database->insert_id();
            return true;
        } else {
            return false;
        }
    }

    public function update() {

        global $database;
        //create hash before insert
        //$this->password = self::get_encrypted_password($this->password);
        $attributes = $this->sanitized_attributes();
        $attribute_pairs = array();
        foreach ($attributes as $key => $value) {
            $attribute_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . self::$table_name . " SET ";
        $sql .= join(", ", $attribute_pairs);
        $sql .= " WHERE us_id=" . $database->escape_value($this->us_id);

        $database->query($sql);
        return ($database->affected_rows() == 1) ? true : false;
    }

    public function delete() {
        global $database;

        $sql = "DELETE FROM " . self::$table_name . " ";
        $sql .= "WHERE us_id=" . $database->escape_value($this->us_id);
        $sql .= " LIMIT 1";

        $database->query($sql);
        return($database->affected_rows() == 1) ? true : false;
    }

    static function get_encrypted_password($password, $salt) {
        //return sha1($password+$salt);
        return hash("sha512", $password.$salt);
    }
    
//     static function set_encrypted_password($password) {
//     	$salt = mcrypt_create_iv(16);
//     	return sha1($password+$salt);
//     }

    function update_username() {
        $this->validate_user(array('username'));
        if (empty($this->errors)) {
            return $this->update();
        } else {
            return false;
        }
    }

    function update_password() {
        $this->validate_user(array('password'));
        if (empty($this->errors)) {
            $this->password = self::get_encrypted_password($this->password,$this->salt);
            return $this->update();
        } else {
            return false;
        }
    }

    function validate_user($fields = array()) {
        $validation = new Validation();
        //var_dump($fields);
        if (in_array('username', $fields)) {
            if ($validation->isEmpty($this->us_name)) {
                $this->errors['username'] = "Username cannot be empty";
            } else {
                $existName = self::find_by_username($this->us_name);
                if ($existName) {
                    $this->errors['username'] = "Username already exists";
                }
            }
        }

        if (in_array('password', $fields)) {
            $encOldPassword = self::get_encrypted_password($this->extra['old_password']);
            if ($validation->isEmpty($this->extra['old_password'])) {
                $this->errors['old_password'] = "Current password cannot be empty";
            } else if ($validation->isNotEqual($this->us_pass, $encOldPassword)) {
                $this->errors['old_password'] = "Current password is incorrect";
            }
            if ($validation->isEmpty($this->extra['new_password'])) {
                $this->errors['new_password'] = "New password cannot be empty";
            }
            if ($validation->isEmpty($this->extra['conf_password'])) {
                $this->errors['conf_password'] = "Confirm password cannot be empty";
            }
            if ($validation->isNotEqual($this->extra['new_password'], $this->extra['conf_password'])) {
                $this->errors['conf_password'] = "New password and confirm password does not match";
            }
        }
    }
    
    public function isAuthorized($right){
    	return ($this->rights[$right]);
    }
	
    
}

?>