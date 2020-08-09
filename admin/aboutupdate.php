
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
        $id =(isset($_GET['abuid']));
       
         $updateabout = $pd->geaboutdata($_POST);
     }

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">  
        <?php
          if(isset( $insertconDescription)){
              echo  $insertconDescription;
          }
        ?>     
         <?php 
          $getAbout= $pd->getAbout();
          if($getAbout){
            while($value =  $getAbout->fetch_assoc()){

       
        ?>             
            <form action="" method="post" >
                <table class="form">   
                    <tr>
                        <td>
                            <label>Heading</label>
                        </td>
                        <td>
                            <input type="text" name="title" value="<?php echo $value['title'];?>" class="medium" />
                        </td>
                    </tr>  
                   
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Description</label>
                        </td>
                        <td>
                            <textarea class="tinymce"name="body"><?php echo $value['body'];?></textarea>
                        </td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="UPDATE" />
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


