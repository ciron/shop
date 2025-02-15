<?php
ob_start();


include_once $_SERVER['DOCUMENT_ROOT']. '/shop/config/config.php';


class Database{
    public $host   = DB_HOST;
    public $user   = DB_USER;
    public $pass   = DB_PASS;
    public $dbname = DB_NAME;

    public $link;
    public $error;
        public function __construct(){
            $this->connectDB();
        }
        private function connectDB(){
            $this->link=mysqli_connect($this->host,$this->user,$this->pass,$this->dbname);

            if(!$this->link){
            $this->error="connection fail".$this->link->connect_error;
            return false;
            }
        }
        public function select($query){
            $result= $this->link->query($query) or die ($this->link->error.__LINE__);
            if($result->num_rows > 0){
                return $result;
            }else {
                return false;
            }
        }
        public function inserted($insert) {
            $insert_row = $this->link->query($insert) or die ($this->link->error.__LINE__);
            if($insert_row){
               return $insert_row;
            }else {
                die("Error : (".$this->link->errno.")".$this->link->error);
            }
        }
        public function update($updated){
            $update_row = $this->link->query($updated) or die ($this->link->error.__LINE__);
            if($update_row){
                
                return $update_row;
            }else {
                return false;
            }
        }
        public function delete($delete){
            $delete_row = $this->link->query($delete) or die ($this->link->error.__LINE__);
            if($delete_row){
               
                return $delete_row;
            }else {
                return false;
            }
        }
    
    
}

?>
