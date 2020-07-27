<?php
   $filepath = realpath(dirname(__FILE__));

    include_once ($filepath.'/../lib/session.php');
    Session::checkLogin();
    include_once ($filepath.'/../helpers/format.php');
    include_once ($filepath.'/../lib/database.php');

   
 
?>
<?php 
 class adminlogin{
     private $db;
     private $fm;
     public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
     }
     public function adminlogin($ausername,$apass){
         $ausername= $this->fm->validation($ausername);
         $apass= $this->fm->validation($apass);

         $ausername = mysqli_real_escape_string($this->db->link,$ausername);
         $apass = mysqli_real_escape_string($this->db->link,$apass);

         if(empty($ausername)|| empty($apass)){
             $loginmsg = "username and pass must not be empty";
             return $loginmsg;

         }else {
             $query ="SELECT * FROM `tbl_admin` WHERE ausername = '$ausername' AND apass = '$apass' ";
             $result = $this->db->select($query);
             if ($result != false){
                 $value = $result->fetch_assoc();
                Session::set("adminlogin",true);
                
                Session::set("ausername",$value['ausername']);
                Session::set("apass",$value['apass']);
                Session::set("aname",$value['aname']);
                header("location:../admin/index.php");

             } else {
                $loginmsg = "username and pass must not correct";
                return $loginmsg;
             }
         }
     }
    
 }

?>