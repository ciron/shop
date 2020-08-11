<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
    

?>
<?php 
 class Customer{
    private $db;
    private $fm;
    public function __construct(){
       $this->db = new Database();
       $this->fm = new Format();

    }
    public function customerRegistration($data){
      $customername = mysqli_real_escape_string($this->db->link,$data['names']);
      $email  = mysqli_real_escape_string($this->db->link,$data['email']);
      $address = mysqli_real_escape_string($this->db->link,$data['address']);
      $city  = mysqli_real_escape_string($this->db->link,$data['city']);
      $phone = mysqli_real_escape_string($this->db->link,$data['phone']);
      $birthday = mysqli_real_escape_string($this->db->link,$data['birthday']);
      $pass  = mysqli_real_escape_string($this->db->link,md5($data['pass']));

      if(empty($customername)||empty($email)||empty($address)||empty($city)||empty($phone)||empty($birthday)||empty($pass)){
         $msg = "<span style='color:red;font-size:20px;'>Filed  must not be empty!!</span>";
         return $msg;
     }
     $mailquery = "SELECT * FROM tbl_customer WHERE email='$email' OR phone ='$phone' LIMIT 1";
     $mailChk =$this->db->select($mailquery);
     if($mailChk!=false){
      $msg = "<span style='color:red;font-size:20px;'>This Email Or Phone is already Exist!! please try anotherone!</span>";
      return $msg;
     }else {
        $query = "INSERT INTO tbl_customer(names,email,address,city,phone,birthday,pass) VALUES ('$customername','$email','$address','$city','$phone','$birthday','$pass')";
        $customerdata =$this->db->inserted($query);
        if($customerdata){
           $msg = "Registration Succefully";
           return $msg;
        }else{
         $msg = "Dear User your Registration Failed! Please try again!";
         return $msg;
        }
     }
    }
    public function customerLogin($email,$pass){
      $email= $this->fm->validation($email);
      $pass= $this->fm->validation($pass);

      $email = mysqli_real_escape_string($this->db->link,$email);
      $pass = mysqli_real_escape_string($this->db->link,$pass);

      if(empty($email)||empty($pass)){
         $msg = "<span style='color:red;font-size:20px;'>Username And pass must not be empty!!</span>";
         return $msg;
     }else{
      $loginQuery = "SELECT * FROM tbl_customer WHERE email= '$email' AND pass ='$pass'";
      $loginchk =$this->db->select($loginQuery);
      if($loginchk!=false){
        $value = $loginchk->fetch_assoc();
        Session::set("customerLogin",true);
        Session::set("id", $value['id']);
        Session::set("names", $value['names']);
        Session::set("email", $value['email']);
         header("Location:order.php");
      }else{
         $msg = "<span style='color:red;font-size:20px;'>Username And pass is incorrect! Try again.</span>";
         return $msg;
      }
     }
    }
   public function getCustomerData($id){
      $cuspro = "SELECT * FROM tbl_customer WHERE id= '$id' ";
      $cusprochk =$this->db->select($cuspro);      
        return $cusprochk;        
}
    public function customerUpdateinfo($data,$cusid){
      $customername = mysqli_real_escape_string($this->db->link,$data['names']);
      $email  = mysqli_real_escape_string($this->db->link,$data['email']);
      $address = mysqli_real_escape_string($this->db->link,$data['address']);
      $city  = mysqli_real_escape_string($this->db->link,$data['city']);
      $phone = mysqli_real_escape_string($this->db->link,$data['phone']);
      
      if(empty($customername)||empty($email)||empty($address)||empty($city)||empty($phone)){
         $msg = "<span style='color:red;font-size:20px;'>Filed  must not be empty!!</span>";
         return $msg;
     }else {
        $query= "UPDATE tbl_customer
        SET
         names = '$customername',
         email = '$email',
         address = '$address',
         city = '$city',
         phone = '$phone'       
        
         WHERE id = '$cusid' ";
        $updated_row = $this->db->update($query);
        if($updated_row){
            $output = "Your Information Updated succesfully";
            return $output;
        }else {
            $output = "Your Information Updated Faiiled";
            return $output;
        }
     }
    }
    public function customerContact($data,$files){
      $names = mysqli_real_escape_string($this->db->link,$data['names']);
      $email       = mysqli_real_escape_string($this->db->link,$data['email']);
      $mobile  = mysqli_real_escape_string($this->db->link,$data['mobile']);
      $address = mysqli_real_escape_string($this->db->link,$data['address']);
      $body = mysqli_real_escape_string($this->db->link,$data['body']);
     

   
        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if(empty($names)||empty($email)||empty($mobile)||empty($address)||empty($body)){
            $msg = "filed  must not be empty";
            return $msg;
        }
        if(move_uploaded_file($file_tmp, $uploaded_image)){
            if (in_array($file_ext, $permited) === false) {
                echo "<span class='error'>You can upload only:-"
                .implode(', ', $permited)."</span>";
            }
            elseif ($file_size >1048567) {
                echo "<span class='error'>Image Size should be less then 1MB!
                </span>";
            }
            else {
                move_uploaded_file($file_tmp, $uploaded_image);
                $query  = "INSERT INTO `tbl_contact`(names,email,mobile,address,body,image) VALUES('$names','$email','$mobile','$address','$body','$uploaded_image')";
    
                $productinsert = $this->db->inserted($query);
                if ($productinsert){
                   
                    $msg = "Meaasge send Succesfully With Your Prescription";
                    return $msg;
                   
                }else {
                    $msg = "Meaasge send failed";
                    return $msg;
                }
            }
        }else{
                $query  = "INSERT INTO `tbl_contact`(names,email,mobile,address,body) VALUES('$names','$email','$mobile','$address','$body')";
      
                $productinsert = $this->db->inserted($query);
                if ($productinsert){
                   
                    $msg = "Meaasge send Succesfully!! contact with you soon";
                    return $msg;
                   
                }else {
                    $msg = "Meaasge send failed";
                    return $msg;
                }
            }
      
   }
   public function getAllMessage(){
    $cuslist = "SELECT * from tbl_contact ORDER BY conid DESC";
    $result =$this->db->select($cuslist);
    return $result;
 }
 public function getCustomerMessage($id){
    $cusmsg = "SELECT * FROM tbl_contact WHERE conid= '$id' ";
    $cusmsgchk =$this->db->select($cusmsg);
    return $cusmsgchk;
  }
  public function delCusMsg($id){
    $query= "DELETE  FROM tbl_contact where  conid = '$id' ";
    $delmsg = $this->db->delete($query);
    if($delmsg){
        echo "<script>window.location='inbox.php';</script>";
        
     }else{
        $msg = "<span style='color:red'>Message not  Delete </span>";
        return $msg;
     }
  }
  public function getAllUsers(){
    $allcus = "SELECT * FROM  tbl_customer";
    $cuschk =$this->db->select($allcus);
    return $cuschk;
  }
  public function delCustomer($id){
    $query= "DELETE  FROM tbl_customer where  id = '$id' ";
    $delmsg = $this->db->delete($query);
    if($delmsg){
        echo "<script>window.location='alluser.php';</script>";
        
     }else{
        $msg = "<span style='color:red'>Customer not  Delete </span>";
        return $msg;
     }
  }
  public function getCusDiscountData($id){
    $cuspro = "SELECT * FROM tbl_customer WHERE id= '$id' AND city ='Dhaka'";
    $cusprochk =$this->db->select($cuspro);      
      return $cusprochk;        
}
 }

 $b= new Customer() ;    
$dv=$b->getCusDiscountData('Dhaka');
?>