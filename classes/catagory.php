<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
    

?>
<?php 
 class catagory{
        private $db;
        private $fm;
        public function __construct(){
           $this->db = new Database();
           $this->fm = new Format();

     }
     public function catinsert($catName){
        $catName= $this->fm->validation($catName);

        $catName = mysqli_real_escape_string($this->db->link,$catName);
        
        if(empty($catName)){
            $msg = "Catagory  must not be empty";
            return $msg;
        }else {
            $insert = "INSERT INTO `tbl_catagory`(catName) VALUES ('$catName')";
            $catins = $this->db->inserted($insert);
            if ($catins){
               
                $msg = "Catagory inserted Succesfully";
                return $msg;
               
            }else {
                $msg = "Catagory inserted failed";
                return $msg;
            }
            
        }
     }
     public function getAllCat(){
         $query= "SELECT * FROM tbl_catagory ORDER BY catid DESC";
         $result = $this->db->select($query);
         return $result;
     }
     public function getCatById($id){
        $query= "SELECT * FROM tbl_catagory where catid ='$id' ";
        $result = $this->db->select($query);
        return $result;
     }
     public function catupdate($catName,$id){
        $catName= $this->fm->validation($catName);

        $catName = mysqli_real_escape_string($this->db->link,$catName);
        $id = mysqli_real_escape_string($this->db->link,$id);
        
        if(empty($catName)){
            $output = "Catagory  should not be empty";
            return $output;
        }else {
            $query= "UPDATE `tbl_catagory` SET `catName` = '$catName' WHERE `tbl_catagory`.`catid` = '$id' ";
            $updated_row = $this->db->update($query);
            if($updated_row){
                $output = "Catagory Updated succesfully";
                return $output;
            }else {
                $output = "Catagory Updated Faiiled";
                return $output;
            }
          
        }
     }
     public function delCatById($id){
         $delete = "DELETE FROM `tbl_catagory` WHERE `catid` = '$id' ";
         $deldata = $this->db->delete($delete);
         if($deldata){
            $output = "Catagory Deleted succesfully";
            return $output;
         }else {
            $output = "Catagory Deleted failed";
            return $output;
         }
     }

    }
?>