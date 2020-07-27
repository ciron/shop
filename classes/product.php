<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
    

?>
<?php 
    class product{
        private $db;
        private $fm;
        public function __construct(){
           $this->db = new Database();
           $this->fm = new Format();

     }
     public function productinsert($data,$files){
        $productname = mysqli_real_escape_string($this->db->link,$data['productname']);
        $catid       = mysqli_real_escape_string($this->db->link,$data['catid']);
        $brandid  = mysqli_real_escape_string($this->db->link,$data['brandid']);
        $body = mysqli_real_escape_string($this->db->link,$data['body']);
        $price = mysqli_real_escape_string($this->db->link,$data['price']);
        $types = mysqli_real_escape_string($this->db->link,$data['types']);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $files['image']['name'];
        $file_size = $files['image']['size'];
        $file_temp = $files['image']['tmp_name'];
    
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image ="file/".$unique_image;

        if(empty($productname)||empty($catid)||empty($brandid)||empty($body)||empty($price)||empty($file_name)||empty($types)){
            $msg = "filed  must not be empty";
            return $msg;
        }elseif ($file_size >1048567) {
            echo "<span class='error'>Image Size should be less then 1MB!
            </span>";
        } elseif (in_array($file_ext, $permited) === false) {
            echo "<span class='error'>You can upload only:-"
            .implode(', ', $permited)."</span>";
        }else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query  = "INSERT INTO `tbl_product`(productname,catid,brandid,body,price,image,types) VALUES('$productname','$catid','$brandid','$body','$price','$uploaded_image','$types')";

            $productinsert = $this->db->inserted($query);
            if ($productinsert){
               
                $msg = "Product inserted Succesfully";
                return $msg;
               
            }else {
                $msg = "Product inserted failed";
                return $msg;
            }
        }
     }
     public function getAllProduct(){
        $pdlist = "SELECT  tbl_product.*,tbl_catagory.catName,tbl_brand.Brandname
        FROM tbl_product
        INNER JOin tbl_catagory
        ON tbl_product.catid = tbl_catagory.catid 
        INNER JOin tbl_brand
        ON tbl_product.brandid = tbl_brand.brandid 
         ORDER BY tbl_product.productid DESC";
        $result =$this->db->select($pdlist);
        return $result;
     }
     public function getProductById($id){
        $query= "SELECT * FROM tbl_product where productid ='$id' ";
        $result = $this->db->select($query);
        return $result;
     }
     public function productupdate($data,$files,$id){
        $productname = mysqli_real_escape_string($this->db->link,$data['productname']);
        $catid       = mysqli_real_escape_string($this->db->link,$data['catid']);
        $brandid  = mysqli_real_escape_string($this->db->link,$data['brandid']);
        $body = mysqli_real_escape_string($this->db->link,$data['body']);
        $price = mysqli_real_escape_string($this->db->link,$data['price']);
        $types = mysqli_real_escape_string($this->db->link,$data['types']);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $files['image']['name'];
        $file_size = $files['image']['size'];
        $file_temp = $files['image']['tmp_name'];
    
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "file/".$unique_image;

        if(empty($productname)||empty($catid)||empty($brandid)||empty($body)||empty($price)||empty($types)){
            $msg = "filed  must not be empty";
            return $msg;
        }else{
            if(!empty($file_name)){

                if ($file_size >1048567) {
                    echo "<span class='error'>Image Size should be less then 1MB!
                    </span>";
                } elseif (in_array($file_ext, $permited) === false) {
                    echo "<span class='error'>You can upload only:-"
                    .implode(', ', $permited)."</span>";
                }else {
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "UPDATE tbl_product SET productname ='$productname',catid ='$catid',brandid ='$brandid',body ='$body',price ='$price',image ='$uploaded_image', types ='$types' where productid='$id'";

                    $productupdate = $this->db->update($query);
                    if ($productupdate){
                    
                        $msg = "Product inserted Succesfully";
                        return $msg; 
                    
                    }else {
                        $msg = "Product inserted failed";
                        return $msg;
                    }
                }
            }
            else {
                $query = "UPDATE tbl_product SET productname ='$productname',catid ='$catid',brandid ='$brandid',body ='$body',price ='$price', types ='$types' where productid='$id'";

                $productupdate = $this->db->update($query);
                if ($productupdate){
                
                    $msg = "Product inserted Succesfully";
                    return $msg;
                
                }else {
                    $msg = "Product inserted failed";
                    return $msg;
                }
            }
        }
    }
    public function delProById($id){
        // $delquery = "SELECT * FROM tbl_product WHERE productid ='$id'";
        // $getdata = $this->db->select($delquery);
        // if($getdata){
        //     while($delimg=$getdata->fetch_assoc()){
        //         $dellink = $delimg['image'];
        //         unlink($dellink);
        //     }
        // }
        
        $deletequery = "DELETE FROM tbl_product WHERE productid = '$id'";
        $deldata = $this->db->delete($deletequery);
        if($deldata){
           $msg = "Product Deleted succesfully";
           return $msg;
        }else {
           $msg = "Product Deleted failed";
           return $msg;
        }
    }
    public function getFeturedProduct() {
        $query= "SELECT * FROM tbl_product WHERE types ='1' ORDER BY productid DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }
    public function getNewProduct(){
        $query= "SELECT * FROM tbl_product  ORDER BY productid DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }
    public function getSingleProduct($id){
        $query = "SELECT  tbl_product.*,tbl_catagory.catName,tbl_brand.Brandname
        FROM tbl_product,tbl_catagory,tbl_brand
       
        where tbl_product.catid = tbl_catagory.catid 
        AND tbl_product.brandid = tbl_brand.brandid AND tbl_product.productid = '$id'";
        $result =$this->db->select($query);
        return $result;
    }
    public function latestFromSquare(){
        $query= "SELECT * FROM tbl_product where brandid = '1'  ORDER BY productid DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function latestFromAcme(){
        $query= "SELECT * FROM tbl_product where brandid = '7'  ORDER BY productid DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function latestFromAci(){
        $query= "SELECT * FROM tbl_product where brandid = '6'  ORDER BY productid DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function latestFromIncepta(){
        $query= "SELECT * FROM tbl_product where brandid = '13'  ORDER BY productid DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function getProductByCat($id){
        $catid = mysqli_real_escape_string($this->db->link,$id);
        $query= "SELECT * FROM tbl_product where catid ='$catid' ORDER BY productid DESC ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getProductByTablet(){
        $query= "SELECT * FROM tbl_product where catid ='46' ORDER BY productid DESC ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getProductBySyrup(){
        $query= "SELECT * FROM tbl_product where catid ='48' ORDER BY productid DESC ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getProductByInjecttion(){
        $query= "SELECT * FROM tbl_product where catid ='47' ORDER BY productid DESC ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getProductByCapsules(){
        $query= "SELECT * FROM tbl_product where catid ='44' ORDER BY productid DESC ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getProductByDrop(){
        $query= "SELECT * FROM tbl_product where catid ='43' ORDER BY productid DESC ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getProductByMedicine(){
        $query= "SELECT * FROM tbl_product where catid ='31' ORDER BY productid DESC ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getProductByLiquid(){
        $query= "SELECT * FROM tbl_product where catid ='45' ORDER BY productid DESC ";
        $result = $this->db->select($query);
        return $result;
    }
    public function sliderAdding($data,$files){
        $title = mysqli_real_escape_string($this->db->link,$data['title']);
        
 
    
         $permited  = array('jpg', 'jpeg', 'png');
         $file_name = $_FILES['image']['name'];
         $file_size =$_FILES['image']['size'];
         $file_tmp =$_FILES['image']['tmp_name'];
         $file_type=$_FILES['image']['type'];
         $div = explode('.', $file_name);
         $file_ext = strtolower(end($div));
         $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
         $uploaded_image = "sliderimg/".$unique_image;


        
         $chquery = "SELECT * FROM tbl_slider WHERE title = '$title'";
         $getckpro = $this->db->select($chquery);
         if($getckpro){
            $msg = "This slider title already Added into website!!";
            return $msg;
         }
         if(empty($title)){
             $msg = "Title must not be empty!! ";
             return $msg;
         }
         if(move_uploaded_file($file_tmp, $uploaded_image)){
             if (in_array($file_ext, $permited) === false) {
                 echo "<span class='error'>You can upload only:-"
                 .implode(', ', $permited)."</span>";
             }
             elseif ($file_size >2097134) {
                 echo "<span class='error'>Image Size should be less then 2MB!
                 </span>";
             }
             else {
                 move_uploaded_file($file_tmp, $uploaded_image);
                 $query  = "INSERT INTO tbl_slider(title,image) VALUES('$title','$uploaded_image')";
     
                 $slideinsert = $this->db->inserted($query);
                 if ($slideinsert){
                    
                     $msg = "Slider insert succesfully";
                     return $msg;
                    
                 }else {
                     $msg = "Slider insert failed";
                     return $msg;
                 }
             }
         }
    }
}


?>