<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
    

?>
<?php 
 class cart{
    private $db;
    private $fm;
    public function __construct(){
       $this->db = new Database();
       $this->fm = new Format();

    }
    public function addToCart($quantity,$id){
      $quantity= $this->fm->validation($quantity);

      $quantity = mysqli_real_escape_string($this->db->link,$quantity);
      $productid = mysqli_real_escape_string($this->db->link,$id);
      $sid  = session_id();

      $query = "SELECT * FROM tbl_product WHERE productid = '$productid'";
      $result = $this->db->select($query)->fetch_assoc();

      $productname = $result['productname'];
      $price = $result['price'];
      $image = $result['image'];
      
      $chquery = "SELECT * FROM tbl_cart WHERE productid = '$productid' AND sid ='$sid'";
      $getckpro = $this->db->select($chquery);
      if($getckpro){
         $msg = "Product already Added into cart!!";
         return $msg;
      }else {
         $query  = "INSERT INTO tbl_cart(sid,productid,productname,price,quantity,image) VALUES('$sid','$productid','$productname','$price','$quantity','$image')";

               $productinsert = $this->db->inserted($query);
               if ($productinsert){
                  header("Location:cart.php");
                  
                  
               }else {
                  header("Location:404.php");
               }
      }
   }
    public function getCartProduct(){
      $sid  = session_id();
      $query= "SELECT * FROM tbl_cart where  sid ='$sid' ";
      $result = $this->db->select($query);
      return $result;
  }
  public function updateCartquantity($cartid,$quantity){
   $cartid = mysqli_real_escape_string($this->db->link,$cartid);
   $quantity = mysqli_real_escape_string($this->db->link,$quantity);
   $query= "UPDATE `tbl_cart` SET `quantity` = '$quantity' WHERE cartid = '$cartid' ";
            $updated_row = $this->db->update($query);
            if($updated_row){
               header("Location:cart.php");
            }else {
                $output = '<span style="color:red;">Quantity Updated Faiiled</span>';
                return $output;
            }
          
  }
  public function delProductByCart($delid){
   $query= "DELETE  FROM tbl_cart where  cartid = '$delid' ";
   $deldata = $this->db->delete($query);
      if($deldata){
         header("Location:cart.php");
         
      }else{
         $msg = "<span style='color:red'>Product not delete Delete </span>";
         return $msg;
      }
  }
  public function checkcart(){
   $sid  = session_id();
   $query= "SELECT * FROM tbl_cart where  sid ='$sid' ";
     $result = $this->db->select($query);
     return $result;
  }
  public function delcartdata(){
   $sid  = session_id();
     $query = "DELETE FROM tbl_cart WHERE `sid` ='$sid'";
     $result=$this->db->delete($query);
  }
  public function orderProduct($cmrid){
   $sid  = session_id();
   $query= "SELECT * FROM tbl_cart where  sid ='$sid' ";
     $getPro = $this->db->select($query);
     if($getPro){
        while($result=$getPro->fetch_assoc()){
           $productid=$result['productid'];
           $productname=$result['productname'];
           $quantity=$result['quantity'];
           $price=$result['price'] * $quantity;
           $vat = $price*0.1;
            $grandtotal = $price +$vat;
           $image=$result['image'];
           $query  = "INSERT INTO tbl_order(cmrid,productid,productname,quantity,price,image) VALUES('$cmrid','$productid','$productname','$quantity','$grandtotal','$image')";

           $productinsert = $this->db->inserted($query);
        }
     }
    
  }
  public function payableAmount($cmrid){
   
   $query= "SELECT price FROM tbl_order where  cmrid ='$cmrid' AND date = now() ";
   $getamount = $this->db->select($query);
   
      return $getamount;
  
}
  public function getOrderProduct($cmrid){
   $query= "SELECT * FROM tbl_order where  cmrid ='$cmrid' ORDER BY date DESC ";
   $getamount = $this->db->select($query);
   return $getamount;
  }
  public function getAllProduct(){
   $query= "SELECT * FROM tbl_order ORDER BY date DESC";
   $getodata = $this->db->select($query);
   return $getodata;
  }
  public function productShifted($id,$price,$time){
   $id = mysqli_real_escape_string($this->db->link,$id);
   $price = mysqli_real_escape_string($this->db->link,$price);
   $time = mysqli_real_escape_string($this->db->link,$time);
   $query= "UPDATE `tbl_order` SET `status` = '1' WHERE `cmrid` = '$id' AND date = '$time' AND price = '$price'";
   $updated_row = $this->db->update($query);
   if($updated_row){
       $output = "Shifted succesfully";
       return $output;
   }else {
       $output = "Shifted Faiiled.!! Try Again";
       return $output;
   }
 
  }
  public function delOrder($id,$price,$time){
   $query= "DELETE  FROM tbl_order where  cmrid = '$id'  AND date = '$time' AND price = '$price'";
   $delorder = $this->db->delete($query);
      if($delorder){
         echo "<script>window.location='ordered.php';</script>";
         
      }else{
         $msg = "<span style='color:red'>order not delete Delete </span>";
         return $msg;
      }
  }
  public function updateOrderquantity($cartid,$quantity){
   $cartid = mysqli_real_escape_string($this->db->link,$cartid);
   $quantity = mysqli_real_escape_string($this->db->link,$quantity);
   $query= "UPDATE `tbl_order` SET `quantity` = '$quantity' WHERE orderid = '$cartid' ";
            $updated_row = $this->db->update($query);
            if($updated_row){
               header("Location:order.php");
            }else {
                $output = '<span style="color:red;">Quantity Updated Faiiled</span>';
                return $output;
            }
          
  }
  public function delProOrder($orderid){
   $query= "DELETE  FROM tbl_order where  orderid = '$orderid' ";
   $deldata = $this->db->delete($query);
      if($deldata){
         header("Location:order.php");
         
      }else{
         $msg = "<span style='color:red'>Product not delete Delete </span>";
         return $msg;
      }
  }
  
 }

?>