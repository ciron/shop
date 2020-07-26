<?php 
    include_once 'include/header.php';
    include_once 'include/sidebar.php';
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/brand.php');
   
?>
<?php 
    if(!isset($_GET['brandid']) || ($_GET['brandid'])== NULL){
       echo "<script>window.location='brandlist.php';</script>";
    }else {
        $id = $_GET['brandid'];
    }
     $brand= new brand();
     if($_SERVER['REQUEST_METHOD']=='POST'){
		$brandname=$_POST['brandname'];
		
		$updatebrand = $brand->brandupdate($brandname,$id);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Brand Name</h2>
               <div class="block copyblock"> 
               <?php 
                if(isset($updatebrand)){
                    echo $updatebrand;
                }
                ?>
                <?php
                $getbrand = $brand->getBrandById($id);

                if($getbrand)
                {
                  while ($result = $getbrand->fetch_assoc())
                  {
               
            ?>
            
                    <form action="" method="post">
                        <table class="form">					
                            <tr>
                                <td>
                                    <input type="text" value="<?php echo $result['brandname'];?>"class="medium"name="brandname" />
                                </td>
                            </tr>
                            <tr> 
                                <td>
                                    <input type="submit" name="submit" Value="Save" />
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