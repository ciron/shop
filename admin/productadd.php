﻿
<?php 
    include_once 'include/header.php';
    include_once 'include/sidebar.php';
    include_once '../classes/brand.php';
    include_once '../classes/product.php';
    include_once '../classes/catagory.php';
?>
<?php 
      $pd= new product();
      if($_SERVER['REQUEST_METHOD']=='POST'){
                  
         $insertproduct = $pd->productinsert($_POST,$_FILES);
     }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">  
        <?php
          if(isset( $insertproduct)){
              echo  $insertproduct;
          }
        ?>             
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productname" placeholder="Enter Product Name..." class="medium" />
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
                            <option value="<?php echo $result['catid'];?>"><?php echo $result['catName'];?></option>
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
                            <option value="<?php echo $result['brandid'];?>"><?php echo $result['brandname'];?></option>
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
                        <textarea class="tinymce"name="body"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text"name="price" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
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
                            <option value="1">Featured</option>
                            <option value="2">Non-Featured</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
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


