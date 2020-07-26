<?php  
   include_once '../classes/catagory.php';
    include_once 'include/header.php';
    include_once 'include/sidebar.php';
?>
<?php 
     $cat= new catagory();
     if($_SERVER['REQUEST_METHOD']=='POST'){
		$catName=$_POST['catName'];
		
		$insertcat = $cat->catinsert($catName);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
               <?php 
                if(isset($insertcat)){
                    echo $insertcat;
                }
            ?>
                    <form action="catadd.php" method="post">
                        <table class="form">					
                            <tr>
                                <td>
                                    <input type="text" placeholder="Enter Category Name..." class="medium"name="catName" />
                                </td>
                            </tr>
                            <tr> 
                                <td>
                                    <input type="submit" name="submit" Value="Save" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'include/footer.php';?>