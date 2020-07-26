<?php include 'include/header.php';?>
<?php include 'include/sidebar.php';
 include_once '../classes/catagory.php';
?>
<?php
	$cat= new catagory();
	if(isset($_GET['delcat'])){
		$id= $_GET['delcat'];
		$delCat = $cat->delCatById($id);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
					<?php 
					 	if(isset($delCat)){
							 echo $delCat;
						 }
					?>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$getcat = $cat->getAllCat();
						 if($getcat){
							 $serial=0;
							 while($result=$getcat->fetch_assoc()){
								$serial++;
						
					?>
						<tr class="odd gradeX">
							<td><?php echo $serial;?></td>
							<td><?php echo $result['catName'];?></td>
							<td><a href="catedit.php?catid=<?php  echo $result['catid']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to Delete It?')" href="?delcat=<?php  echo $result['catid']; ?>">Delete</a></td>
						</tr>
						<?php 
							 }
							}
						?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'include/footer.php';?>

