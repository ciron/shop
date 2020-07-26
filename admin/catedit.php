<?php  
    include_once 'include/header.php';
    include_once 'include/sidebar.php';
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/catagory.php');
?>
<?php 
    if(!isset($_GET['catid']) || ($_GET['catid'])== NULL){
       echo "<script>window.location='catlist.php';</script>";
    }else {
        $id = $_GET['catid'];
    }
     $cat= new catagory();
     if($_SERVER['REQUEST_METHOD']=='POST'){
		$catName=$_POST['catName'];
		
		$updatecat = $cat->catupdate($catName,$id);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Category</h2>
               <div class="block copyblock"> 
               <?php 
                if(isset($updatecat)){
                    echo $updatecat;
                }
                ?>
                <?php
                $getcat = $cat->getCatById($id);

                if($getcat){
                  while ($result = $getcat->fetch_assoc()){
               
            ?>
            
                    <form action="" method="post">
                        <table class="form">					
                            <tr>
                                <td>
                                    <input type="text" value="<?php echo $result['catName'];?>"class="medium"name="catName" />
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