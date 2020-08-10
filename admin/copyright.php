<?php 
include_once 'include/header.php';
include_once 'include/sidebar.php';
include_once '../classes/product.php';
?>
<?php 
      $pd= new product();       
      if($_SERVER['REQUEST_METHOD']=='POST'){
        $id =(isset($_GET['copyid']));
       
         $updatecopyright = $pd->getCopydata($_POST);
     }

?>
<div class="grid_10">
    <div class="box round first grid">

        <h2>Update Copyright Text</h2>
        <div class="block copyblock"> 
        <?php 
         if(isset( $updatecopyright)){
            echo  $updatecopyright;
        }
          $getcopy= $pd->getCopy();
          if($getcopy){
            while($value =  $getcopy->fetch_assoc()){

       
        ?>      
         <form action="" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <input type="text" value="<?php echo $value['copytext'];?>" name="copytext" class="large" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" value="<?php echo $value['cpylink'];?>" name="cpylink" class="large" />
                    </td>
                </tr>
				 <tr> 
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
<?php include 'include/footer.php';?>