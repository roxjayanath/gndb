<?php

require_once(LIB_PATH.DS."constants.php");

class MySQLDatabase {
    
   private $connection;
   public $last_query;
   
   private $magic_quotes_active;
   private $real_escape_string;
   
   
   function __construct(){
    $this->open_connection();
     
        $this->magic_quotes_active=get_magic_quotes_gpc();
        $this->real_escape_string=function_exists("mysql_real_escape_string");
        
   }
   
   public function open_connection(){
        $this->connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS);
        if(!$this->connection){
            die("Database connection failed :".mysqli_error());
            
        }else{
            $db_select = mysqli_select_db($this->connection,DB_NAME);
            if(!$db_select){
                die("Database selection failed ".mysqli_error());
            }
            
        }
    }
   public function close_connection(){
    
    if(isset($this->connection)){
        mysqli_close($this->connection);
        unset($this->connection);
    }
    
   }
   
   public function query($sql){
    $this->last_query=$sql;
    $result = mysqli_query($this->connection,$sql);
    $this->comfirm_query($result);
    return $result;
   }
   
  public function escape_value($value){
       
        if($this->real_escape_string){
            if($this->magic_quotes_active){
                $value=stripcslashes($value);
            }
            $value=mysqli_real_escape_string($this->connection,$value);
        }else{
            if(!$this->magic_quotes_active){
                $value=addcslashes($value);
            }
        }
        return $value;
        }  
   
   public function num_rows($result_set){
    return mysqli_num_rows($result_set);
   }
   
   public function insert_id(){
    return mysqli_insert_id($this->connection);
    
   }
   
   public function affected_rows(){
    return mysqli_affected_rows($this->connection);
   }
   
   
   
   
   
   public function fetch_array($result_set){
    return mysqli_fetch_array($result_set);
   }
   
  private function comfirm_query($result){
    if(!$result){
        $output = "Database query failed: ".mysqli_error($this->connection)."<br/><br/>";
        $output .="Last SQL query: ".$this->last_query;
        die($output);
    }
   }
   
   public function where_between($field, $min, $max, $connector = FALSE){
       $between = $connector ? " {$connector} " : '';
       $between .= "({$field} >= '{$min}' ";
       if(!empty($max)){
       $between .= "AND {$field} <= '{$max}'";
       }
       $between .= ')';
       return $between;
   }

}

$database = new MySQLDatabase();

$db =& $database;

?>