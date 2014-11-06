<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(LIB_PATH . DS . 'database.php');

class Product extends DatabaseObject {

    protected static $table_name = "ndb_doc";
    protected static $db_fields = array('d_id', 'cor_non', 'cr_brd','ref1','ref2','ref3','reffull','reference', 'requester', 'unit', 'contact_p', 'date_sub',
                                        'description', 'date_reciv_it', 'smrc_date', 'smrc_status','priority','date_develop',
                                        'AVPIT','VPIT','COST_DATE','CFO_DATE','BRP','DEV_HAND','PACK_DATE','DEV_TESTER','TEST_ENV','TEST_C_NO','TEST_COM_DATE','TEST_STAT',
                                        'date_temo','remarks','assing_to','ded_line','USER_ASS','develop_r_date',
                                        'document_complet','date_hand_qa','QA_REF_N','QA_TEST_N','QA_STATUS','qa_complete','date_back_it','D_FIX_BY','USER_Not','release_date',
                                        'status','scan_doc1','scan_doc2','scan_doc3', 'update_on','d_visible', 'edited_by');
    public $d_id;
    public $cor_non;
    public $cr_brd;
	
	public $ref1;
	public $ref2;
	public $ref3;
	public $reffull;
    
    public $reference;
    public $requester;
    public $unit;
    
    public $contact_p;
    public $date_sub;
    public $description;
    
    public $date_reciv_it;
    public $smrc_date;
    public $smrc_status;
    
     public $priority;
     public $date_develop;
     
     public $AVPIT;
    public $VPIT;
    public $COST_DATE;
     public $CFO_DATE;
      public $BRP;
      public $DEV_HAND;
       public $PACK_DATE;
        public $DEV_TESTER;
         public $TEST_ENV;
          public $TEST_C_NO;
           public $TEST_COM_DATE;
            public $TEST_STAT;
    
     
     public $date_temo;
     
     public $remarks;
     public $assing_to;
	 public $ded_line;
	 public $USER_ASS;
    public $develop_r_date;
    public $document_complet;
    
     public $date_hand_qa;
      public $QA_REF_N;
       public $QA_TEST_N;
        public $QA_STATUS;
     public $qa_complete;
     public $date_back_it;
     
      public $D_FIX_BY;
       public $USER_Not;
     
    public $release_date;
    public $status;
     public $scan_doc1;
     
     public $scan_doc2;
     public $scan_doc3;
     
     public $update_on;
     public $d_visible;
	 
	 public $sname;
	 
	 public $maxvalue;
	 
	 public $edited_by;
     
     
     
    public $errors = array();
    public $files = array();
    protected $upload_errors = array(
        UPLOAD_ERR_OK => "No errors.",
        UPLOAD_ERR_INI_SIZE => "larger than upload max fils size",
        UPLOAD_ERR_FORM_SIZE => "larfer than form max file size.",
        UPLOAD_ERR_PARTIAL => "partial upload",
        UPLOAD_ERR_NO_FILE => "No file",
        UPLOAD_ERR_NO_TMP_DIR => "No temporarary directory",
        UPLOAD_ERR_CANT_WRITE => "cant write to disk",
        UPLOAD_ERR_EXTENSION => "file upload stopped by extension"
    );
    public static $price_ranges = array(
        1 => 1500,
        2500,
        3500,
        4500
    );
   // public $upload_dir = '/public/images/products/';
   public $sandbox = '/php_sandbox';
    public $upload_dir = '/public/upload/docs/';

    public function attach_file($file, $img_no, $required = FALSE) {

        if (!$file || empty($file) || !is_array($file)) {
            $this->errors['file'] = "No, file was uploaded";
            return false;
        } elseif ($file['error'] != UPLOAD_ERR_OK) {
            if (!$required && $file['error'] == UPLOAD_ERR_NO_FILE) {
                return true;
            } else {
                $this->errors['file'] = $this->upload_errors[$file['error']];
                return false;
            }
        } else {
            $this->files[] = array(
                'upload' => $file,
                //'img_no' => $img_no
                'file_no' => $img_no
            );
            return true;
        }
    }

    private static function instantiate($record) {
        $object = new self();

        foreach ($record as $attribute => $value) {
            if ($object->has_attribute($attribute)) {
                $object->$attribute = $value;
            }
        }
        return $object;
    }

    public function save() {
        if (isset($this->d_id)) $this->validate_save(true); else $this->validate_save();
        if (empty($this->errors)) {
            return isset($this->d_id) ? $this->update() : $this->create();
        } else {
        	var_dump($this->errors);
            return FALSE;
        }
    }
    
    private function is_exists(){
    	$product = isset($this->d_id) ? self::find_by_reference($this->reference, $this->d_id) : self::find_by_reference($this->reference);
    	if($product){
    		return TRUE;	
    	} else {
    		return FALSE;
    	}
    } 
    
    
		
		
	 function validate_save($edit = false){      	
		$validation = new Validation();
		//$session = new Session();
		if (! $edit) {
			if ($validation->isEmpty ( $this->cor_non )) {
				$this->errors ['title'] = "Title cannot be empty";
				// $session->message="Choose Unite";
			} else if ($validation->isTooLong ( $this->cor_non, 100 )) {
				$this->errors ['title'] = "Title cannot be emptyis too long";
			}
			
			if($validation->isEmpty($this->ref1)){
            $this->errors['title'] = "select type";
        }
			if($validation->isEmpty($this->ref2)){
            $this->errors['title'] = "select the unit";
        }
		}
        
        if($this->is_exists()){
        	$this->errors['ref'] = "reference already exists";
			
        }
		
		
		
		/* if($validation->isEmpty($this->ref1)){
            $this->errors['title'] = "select type";
        } else if($validation->isTooLong($this->ref1, 100)){
            $this->errors['title'] = "Title cannot be emptyis too long";
        } else if($this->is_exists()){
        	$this->errors['ref'] = "reference already exists";
        }
		
		
		
		
		
	/*	if($validation->isEmpty($this->ref2)){
            $this->errors['title'] = "select the unit";
        } else if($validation->isTooLong($this->ref2, 100)){
            $this->errors['title'] = "Title cannot be emptyis too long";
        } else if($this->is_exists()){
        	$this->errors['ref'] = "reference already exists";
        } */
		
		if($validation->isEmpty($this->requester)){
            $this->errors['title'] = "Requester cannot be empty";
        } else if($validation->isTooLong($this->requester, 100)){
            $this->errors['title'] = "Title cannot be emptyis too long";
        } else if($this->is_exists()){
        	$this->errors['ref'] = "reference already exists";
        }
		
		if($validation->isEmpty($this->description)){
            $this->errors['title'] = "Description cannot be empty";
        } 
		
		
		
		if($validation->isEmpty($this->date_reciv_it)){
            $this->errors['title'] = "Recive Date must be fill out";
        } 
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
        //if($validation->isEmpty($this->price)){
          //  $this->errors['price'] = "Price cannot be empty";
       // } else if($validation->isInvalidAmount($this->price)){
          //  $this->errors['price'] = "Invalid amount";
      //  } 
      //  if($validation->isEmpty($this->quan)){
           // $this->errors['quan'] = "Quantity cannot be empty";
       // } else if($validation->isNotWholeNumber($this->quan)){
           // $this->errors['quan'] = "Quantity must be a whole number";
       // }
        
    }

    public static function count_all($searchString = '') {
        global $database;
        $sql = "SELECT COUNT(*) FROM " . self::$table_name ." WHERE d_visible =1 ";
        $sql .= $searchString;
        $result_set = $database->query($sql);
        $row = $database->fetch_array($result_set);
        return array_shift($row);
    }
    
    public static function count_status($searchString = '') {
        global $database;
        $sql = "SELECT COUNT(*) FROM " . self::$table_name ." WHERE d_visible =1 AND status = 'pending' ";
        $sql .= $searchString;
        $result_set = $database->query($sql);
        $row = $database->fetch_array($result_set);
        return array_shift($row);
    }
	
	public static function count_statpendtem($searchString = '') {
        global $database;
        $sql = "SELECT COUNT(*) FROM " . self::$table_name ." WHERE d_visible =1 AND status = 'Pending Temonos' ";
        $sql .= $searchString;
        $result_set = $database->query($sql);
        $row = $database->fetch_array($result_set);
        return array_shift($row);
    }
	
	public static function count_statqatest($searchString = '') {
        global $database;
        $sql = "SELECT COUNT(*) FROM " . self::$table_name ." WHERE d_visible =1 AND status = 'QA Testing' ";
        $sql .= $searchString;
        $result_set = $database->query($sql);
        $row = $database->fetch_array($result_set);
        return array_shift($row);
    }
	
	
	
	
	 public static function count_statuscomplet($searchString = '') {
        global $database;
        $sql = "SELECT COUNT(*) FROM " . self::$table_name ." WHERE d_visible =1 AND status = 'completed' ";
        $sql .= $searchString;
        $result_set = $database->query($sql);
        $row = $database->fetch_array($result_set);
        return array_shift($row);
    }
	
	public static function count_statusdev($searchString = '') {
        global $database;
        $sql = "SELECT COUNT(*) FROM " . self::$table_name ." WHERE d_visible =1 AND status = 'Development' ";
        $sql .= $searchString;
        $result_set = $database->query($sql);
        $row = $database->fetch_array($result_set);
        return array_shift($row);
    }
	
	
	
	
	 public static function count_statusclose($searchString = '') {
        global $database;
        $sql = "SELECT COUNT(*) FROM " . self::$table_name ." WHERE d_visible =1 AND status = 'close' ";
        $sql .= $searchString;
        $result_set = $database->query($sql);
        $row = $database->fetch_array($result_set);
        return array_shift($row);
    }
	
	public static function count_statusreject($searchString = '') {
        global $database;
        $sql = "SELECT COUNT(*) FROM " . self::$table_name ." WHERE d_visible =1 AND status = 'rejected' ";
        $sql .= $searchString;
        $result_set = $database->query($sql);
        $row = $database->fetch_array($result_set);
        return array_shift($row);
    }
	
	public static function count_statushold($searchString = '') {
        global $database;
        $sql = "SELECT COUNT(*) FROM " . self::$table_name ." WHERE d_visible =1 AND status = 'hold' ";
        $sql .= $searchString;
        $result_set = $database->query($sql);
        $row = $database->fetch_array($result_set);
        return array_shift($row);
    }
	
        public static function count_statusin($searchString = '') {
        global $database;
        $sql = "SELECT COUNT(*) FROM " . self::$table_name ." WHERE d_visible =1 AND status = 'inprogress' ";
        $sql .= $searchString;
        $result_set = $database->query($sql);
        $row = $database->fetch_array($result_set);
        return array_shift($row);
    }
        
	
	public static function count_statuscr($searchString = '') {
        global $database;
        $sql = "SELECT COUNT(*) FROM " . self::$table_name ." WHERE d_visible =1 AND cr_brd='CR' AND status = 'pending' ";
        $sql .= $searchString;
        $result_set = $database->query($sql);
        $row = $database->fetch_array($result_set);
        return array_shift($row);
    }
	
	public static function count_statusbr($searchString = '') {
        global $database;
        $sql = "SELECT COUNT(*) FROM " . self::$table_name ." WHERE d_visible =1 AND cr_brd='BRD' AND status = 'pending' ";
        $sql .= $searchString;
        $result_set = $database->query($sql);
        $row = $database->fetch_array($result_set);
        return array_shift($row);
    }
	
	public static function count_statusrep($searchString = '') {
        global $database;
        $sql = "SELECT COUNT(*) FROM " . self::$table_name ." WHERE d_visible =1 AND cr_brd='RR' AND status = 'pending' ";
        $sql .= $searchString;
        $result_set = $database->query($sql);
        $row = $database->fetch_array($result_set);
        return array_shift($row);
    }
	
	public static function count_statusassing_to($searchString = '') {
        global $database;
        $sql = "SELECT COUNT(*) FROM " . self::$table_name ." WHERE d_visible =1 AND lower(assing_to) like lower('%m%')";
        $sql .= $searchString;
        $result_set = $database->query($sql);
        $row = $database->fetch_array($result_set);
        return array_shift($row);
    }
	
	public static function count_statusassing_to2namelist($sname='',$searchString = '') {
        global $database;
        $result_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE d_visible =1 AND lower(assing_to) like lower('%". $database->escape_value($sname) ."%')");
        return !empty($result_array) ? array_shift($result_array) : false;
    
    }
	
	public static function count_statusassing_to2($sname='',$searchString = '') {
        global $database;
        $sql = "SELECT COUNT(*) FROM " . self::$table_name ." WHERE d_visible =1 AND lower(assing_to) like lower('%". $database->escape_value($sname) ."%')";
        $sql .= $searchString;
        $result_set = $database->query($sql);
        $row = $database->fetch_array($result_set);
        return array_shift($row);
    }
    

    public static function find_all() {
        return self::find_by_sql("SELECT * FROM " . self::$table_name );
    }
    
    public static function find_by_reference($ref = "", $id = 0) {
    	global $database;
    	$result_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE reference = '" . $database->escape_value($ref) . "' AND d_id <> ".$database->escape_value($id)." LIMIT 1");
    	return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function find_by_id($id = 0) {
        global $database;
        $result_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE d_id=" . $database->escape_value($id) . " LIMIT 1");
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function find_all_by_cat_id($id = 0) {
        global $database;
        return self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE cat_id=" . $database->escape_value($id));
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
	
	public static function find_by_sql2() {
        global $database;
		//$objectt_array = array();
		
		
		
		
		
    $result = mysqli_query("SELECT MAX(ref3) AS maxnumber FROM ndb_doc WHERE unit= 'BC' AND cr_brd= 'CR'");
    $row = mysqli_fetch_row($result);
    $highest_id = $row[0];
    return $highest_id;

		
		
		
		
		
		
		
		
		
		
		
        //$maxvalue = $database->query($sql);
		//$sql22 = "SELECT MAX(ref3) AS maxnumber FROM ndb_doc WHERE  unit= '".$temref1 ."' AND cr_brd= '". $tempref2 ."' " ;
		//$sql22 = "SELECT MAX(ref3) AS maxnumber FROM ndb_doc WHERE unit= 'BC' AND cr_brd= 'CR'";
		//$result = mysqli_query($conn->connection,$sql22) or die(mysql_error());
		//$result_set = $database->query($sql22);
		// while ($row = $database->fetch_array($result_set)) {
		 //$object_array[] = self::instantiate($row['maxnumber']);
		// }
		//return $objectt_array;
		//$sql = "SELECT COUNT(*) FROM " . self::$table_name ." WHERE d_visible =1 AND cr_brd='REPORT' AND status = 'pending' ";
        //$sql .= $searchString;
        //$result_set = $database->query($sql);
        //$row = $database->fetch_array($result_set);
        //return array_shift($row);
		
		
        //$object_array = array();
       // while ($row = $database->fetch_array($result_set)) {
            //$object_array[] = self::instantiate($row);
      //  }
        //return $maxvalue;
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
            if (!empty($value))
                $clean_attributes[$key] = $database->escape_value($value);
        }
        return $clean_attributes;
    }

    function assign_files() {
        if (!empty($this->files)) {
            foreach ($this->files as $file) {
                $field = "scan_doc" . $file['file_no'];
                //$fileName = $file['file_no'] . '_' . time() . '.' . pathinfo($file['upload']['name'], PATHINFO_EXTENSION);
                $fileName = $file['file_no'] . '_' . $this->reffull . '.' . pathinfo($file['upload']['name'], PATHINFO_EXTENSION);
                $this->$field = $fileName;
            }
        }
        //var_dump($this->files);
    }

    function save_files($path) {
        if (!empty($this->files)) {
            if (!is_dir($path)) {
                mkdir($path, 0777, TRUE);
            }
            foreach ($this->files as $file) {
                $field = "scan_doc" . $file['file_no'];
                move_uploaded_file($file['upload']['tmp_name'], $path . "/" . $this->$field);
            }
        }
    }

    public function create() {
        global $database;

        $this->assign_files(); //assign filenames to db_fields

        $attributes = $this->sanitized_attributes();

        $sql = "INSERT INTO " . self::$table_name . " (";
        $sql .= join(", ", array_keys($attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes));
        $sql .= "')";

        //echo $sql;

        if ($database->query($sql)) {
            $this->id = $database->insert_id();
            //$path = SITE_ROOT . $this->upload_dir ;
            $path = SITE_ROOT . $this->upload_dir . $this->cr_brd;
            //upload files
            $this->save_files($path);

            return true;
        } else {
            return false;
        }
    }

    public function update() {

        global $database;
        $this->assign_files(); //assign filenames to db_fields
        $attributes = $this->sanitized_attributes();
        $attribute_pairs = array();
        foreach ($attributes as $key => $value) {
            $attribute_pairs[] = "{$key}='{$value}'";
        }
        //var_dump($attributes);
        $sql = "UPDATE " . self::$table_name . " SET ";
        $sql .= join(", ", $attribute_pairs);
        $sql .= " WHERE d_id =". $database->escape_value($this->d_id);

//        if ($this->uploadFile()) {
//            $database->query($sql);
//            return ($database->affected_rows() == 1) ? true : false;
//        }
        //echo $sql;
        $database->query($sql);
        //$path = SITE_ROOT . $this->upload_dir ;
        $path = SITE_ROOT . $this->upload_dir . $this->cr_brd;
		//SERVER_ADDRESS . $this->upload_dir . $this->cr_brd . '/'  . $this->scan_doc1;
        //upload files
        echo $path;
        $this->save_files($path);
        return ($database->affected_rows() == 1) ? true : false;

        return FALSE;
    }
	
	function update_document() {
        //$this->validate_user(array('username'));
        if (empty($this->errors)) {
            return $this->update();
        } else {
        	//var_dump($this->errors);
            return false;
        }
    }
	
	
    
    public function delete_one($potoid){
         global $database;
         
         
         
         
         $sql= "UPDATE " . self::$table_name . " ";
         $sql .= "SET image_".$potoid."=NULL ";
         $sql .= "WHERE id=" . $database->escape_value($this->id);
         
          $database->query($sql);
        return($database->affected_rows() == 1) ? true : false;
    }
    

    public function delete() {
        global $database;

        $sql = "DELETE FROM " . self::$table_name . " ";
        $sql .= "WHERE d_id=" . $database->escape_value($this->d_id);
        $sql .= " LIMIT 1";

        $database->query($sql);
        return($database->affected_rows() == 1) ? true : false;
    }
    
    
     public function visibledel() {
        global $database;
        
        //UPDATE Customers SET ContactName='Alfred Schmidt', City='Hamburg' WHERE CustomerName='Alfreds Futterkiste';

        $sql = "UPDATE " . self::$table_name . " ";
        $sql .= "SET d_visible= 0 WHERE d_id = " . $database->escape_value($this->d_id);
        $sql .= " LIMIT 1";

        $database->query($sql);
        return($database->affected_rows() == 1) ? true : false;
    }

    public static function get_search_string($title = '', $cat_id = '', $type_id = '', $color_id = '', $size_id = '', $price = '') {
        $params = array();
        global $database;
        if (!empty($title))
            $params['title'] = $title;
        if (!empty($cat_id))
            $params['cat_id'] = $cat_id;

        if (!empty($type_id))
            $params['type_id'] = $type_id;

        if (!empty($color_id)) {
            $params['color_id'] = $color_id;
        }

        if (!empty($size_id)) {
            $params['size_id'] = $size_id;
        }

        if (!empty($price)) {
            $params['price'] = $price;
        }

        $i = 0;
        $query = '';
        foreach ($params as $key => $value) {
            $i++;
            if ($i == 1)
                $query .= " WHERE ";
            else
                $query .= " AND ";
            if (in_array($key, array('title'))) {
                $query .= " LOWER($key) like LOWER('%$value%') ";
            } else if (in_array($key, array('price'))) {
                if (is_array($value)) {
                    $j = 0;
                    foreach ($value as $val) {
                        $j++;
                        $price = self::get_price_range($val);
                        if ($j == 1)
                            $query .= $database->where_between($key, $price['min'], $price['max']);
                        else
                            $query .= $database->where_between($key, $price['min'], $price['max'], 'OR');
                    }
                } else {
                    $price = self::get_price_range($value);
                    $query .= $database->where_between($key, $price['min'], $price['max']);
                }
            } else if (is_array($value)) {
                $query .= $key . " IN('" . implode("', '", $value) . "')";
            } else {
                $query .= " $key = '$value' ";
            }
        }
        return $query;
    }
    public function destroy() {

        if ($this->visibledel()) {
            //$target_path = SITE_ROOT . DS . 'public' . DS . $this->image_path();
             $path = SITE_ROOT . $this->upload_dir . $this->id;
        // unlink($path.'/'.$this->image_1) ;
         //unlink($path.'/'.$this->image_2) ;
        // unlink($path.'/'.$this->image_3) ;
         //unlink($path.'/'.$this->image_4) ;
         return true;
        } else {
            return false;
        }
    }
    
    public function destroyone($potoid) {

        if ($this->delete_one($potoid)) {
            //$target_path = SITE_ROOT . DS . 'public' . DS . $this->image_path();
             $path = SITE_ROOT . $this->upload_dir . $this->id;
         //unlink($path.'/'.$this->image_1) ;
         $property="image_$potoid";
         unlink($path.'/'.$this->$property) ;
         //unlink($path.'/'.$this->image_3) ;
         //unlink($path.'/'.$this->image_4) ;
         return true;
        } else {
            return false;
        }
    }
    
    
    
    
    
    

    public static function get_price_range($range_id) {
        $price = array();
        $price['min'] = self::$price_ranges[$range_id];
        if (!empty(self::$price_ranges[$range_id + 1])) {
            $price['max'] = self::$price_ranges[$range_id + 1] - 1;
        } else {
            $price['max'] = 0;
        }
        return $price;
    }

    public function image_path($no = 1) {
        //$field = 'scan_doc' . $scan_doc;
        //$field = 'scan_doc1';
        $field = 'scan_doc' . $no;
        //return $path = SERVER_ADDRESS . $this->upload_dir  . $this->scan_doc1;
        //return $path = SERVER_ADDRESS . $this->upload_dir  . $field;
		//. $this->cr_brd
        //return 'upload/docs/' . $this->cr_brd . '/' . $this->scan_doc1;
        return SERVER_ADDRESS . $this->upload_dir  . $this->cr_brd . '/' . $this->$field;
    }
    
    public static function getLastDocNumber($ref1, $ref2){
    	global $database;
    	$ref1 = $database->escape_value($ref1);
    	$ref2 = $database->escape_value($ref2);
    	$max="SELECT MAX(ref3) AS maxnumber FROM ndb_doc WHERE unit= '".$ref1."' AND cr_brd= '".$ref2."'";
    	$result_set = $database->query($max);
    	$row = $database->fetch_array($result_set);
    	return  array_shift($row);
    }

}

