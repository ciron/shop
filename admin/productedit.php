<?php 
    include_once 'include/header.php';
    include_once 'include/sidebar.php';
    
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/brand.php');
    include_once ($filepath.'/../classes/product.php');
    include_once ($filepath.'/../classes/catagory.php');
?>
<?php 
      if(!isset($_GET['productid']) || ($_GET['productid'])== NULL){
        echo "<script>window.location='productlist.php';</script>";
     }else {
         $id = $_GET['productid'];
     }
      $pd= new product();
      if($_SERVER['REQUEST_METHOD']=='POST'){
        $productname=$_POST['productname'];
         $updateproduct = $pd->productupdate($_POST,$_FILES,$id);
     }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Product</h2>
        <div class="block">  
        <?php
          if(isset( $updateproduct)){
              echo  $updateproduct;
          }
        ?>  
        <?php 
          $getproduct = $pd->getProductById($id);
          if($getproduct){
            while($value =  $getproduct->fetch_assoc()){

       
        ?>           
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productname" value="<?php echo $value['productname'];?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catid">
                            <option>Select Category</option>
                         <?php 
                            $cat = new catagory();
                            $getcat = $cat->getAllCat();
                            if ($getcat){
                                while($result = $getcat->fetch_assoc()){
                          
                         ?>  
                         <option 
                         <?php 
                            if($value['catid']== $result['catid'] ){?>
                                selected = "select";
                                <?php   }
                         ?>
                             value="<?php echo $result['catid'];?>"><?php echo $result['catName'];?></option>
                           <?php 
                                }
                            }
                           ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandid">
                            <option>Select Brand</option>
                            <?php 
                            $brand = new brand();
                            $getBrand = $brand->getAllBrand();
                            if ($getBrand){
                                while($result = $getBrand->fetch_assoc()){
                          
                         ?>   
                            <option 
                         <?php 
                            if($value['brandid']== $result['brandid'] ){?>
                                selected = "select";
                                <?php   }
                         ?>
                             value="<?php echo $result['brandid'];?>"><?php echo $result['brandname'];?></option>
                           <?php 
                                }
                            }
                           ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce"name="body">
                        <?php echo $value['body'];?>
                        </textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text"name="price"value="<?php echo $value['price'];?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                    <img src="<?php echo $value['image'];?>" alt="" height="80px"width="80px"><br>
                        <input type="file" name="image" />
                    </td>
                   
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="types">
                            <option>Select Type</option>
                            <?php if($value['types']==1){ ?>
                            <option selected = "select" value="1">Featured</option>
                            <option value="2">Non-Featured</option>
                            <?php }else { ?>
                                <option value="1">Featured</option>
                            <option  selected = "select" value="2">Non-Featured</option>
                            <?php }?>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
        </form>
        <?php 
             }
            }
        ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'include/footer.php';?>


