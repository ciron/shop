
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
                  
         $insertconDescription= $pd->contactDescription($_POST);
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
            <form action="" method="post" >
                <table class="form">   
                    <tr>
                        <td>
                            <label>Heading</label>
                        </td>
                        <td>
                            <input type="text" name="title" placeholder="Enter  title" class="medium" />
                        </td>
                    </tr>  
                    <tr>
                        <td>
                            <label>Sub title</label>
                        </td>
                        <td>
                            <input type="text"name="subtitle" placeholder="Enter subtitle..." class="medium" />
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


