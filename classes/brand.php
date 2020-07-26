<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
    

?>

<?php 
    class brand{
        private $db;
        private $fm;
        public function __construct(){
           $this->db = new Database();
           $this->fm = new Format();

     }
     public function brandinsert($brandname){
        $brandname= $this->fm->validation($brandname);

        $brandname = mysqli_real_escape_string($this->db->link,$brandname);
        
        if(empty($brandname)){
            $msg = "Brand Name  must not be empty";
            return $msg;
        }else {
            $insert = "INSERT INTO `tbl_brand`(brandname) VALUES ('$brandname')";
            $brandins = $this->db->inserted($insert);
            if ($brandins){
               
                $msg = "Brand inserted Succesfully";
                return $msg;
               
            }else {
                $msg = "Brand inserted failed";
                return $msg;
            }
            
        }
     }
     public function getAllBrand(){
        $query= "SELECT * FROM tbl_brand ORDER BY brandid DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function getBrandById($id){
       $query= "SELECT * FROM tbl_brand where brandid ='$id' ";
       $result = $this->db->select($query);
       return $result;
    }
    public function brandupdate($brandname,$id){
       $brandname= $this->fm->validation($brandname);

       $brandname = mysqli_real_escape_string($this->db->link,$brandname);
       $id = mysqli_real_escape_string($this->db->link,$id);
       
       if(empty($brandname)){
           $output = "Brand Name should not be empty";
           return $output;
       }else {
           $query= "UPDATE `tbl_brand` SET `brandname` = '$brandname' WHERE `tbl_brand`.`brandid` = '$id' ";
           $updated_row = $this->db->update($query);
           if($updated_row){
               $output = "Brand Name Updated succesfully";
               return $output;
           }else {
               $output = "Brand Name Updated Faiiled";
               return $output;
           }
         
       }
    }
    public function delBrandById($id){
        $delete = "DELETE FROM `tbl_brand` WHERE `brandid` = '$id' ";
        $deldata = $this->db->delete($delete);
        if($deldata){
           $output = "Brand Name Deleted succesfully";
           return $output;
        }else {
           $output = "Brand Name Deleted failed";
           return $output;
        }
    }

    }
?>