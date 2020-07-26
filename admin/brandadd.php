<?php  
    include_once '../classes/brand.php';
    include_once 'include/header.php';
    include_once 'include/sidebar.php';
?>
<?php 
     $brand= new brand();
     if($_SERVER['REQUEST_METHOD']=='POST'){
		$brandname=$_POST['brandname'];
		
		$insertbrand = $brand->brandinsert($brandname);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Brand</h2>
               <div class="block copyblock">
               <?php 
                if(isset($insertbrand)){
                    echo $insertbrand;
                }
            ?>
                    <form action="" method="post">
                        <table class="form">					
                            <tr>
                                <td>
                                    <input type="text" placeholder="Enter Brand Name..." class="medium"name="brandname" />
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