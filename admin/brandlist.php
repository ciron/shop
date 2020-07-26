
<?php
 include_once 'include/header.php';
 include_once 'include/sidebar.php';
 include_once '../classes//brand.php';

?>
<?php
	$brand= new brand();
	if(isset($_GET['delbrand'])){
		$id= $_GET['delbrand'];
		$delbrand = $brand->delBrandById($id);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brand List</h2>
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
						$getBrand = $brand->getAllBrand();
						 if($getBrand){
							 $serial=0;
							 while($result=$getBrand->fetch_assoc()){
								$serial++;
						
					?>
						<tr class="odd gradeX">
							<td><?php echo $serial;?></td>
							<td><?php echo $result['brandname'];?></td>
							<td><a href="brandedit.php?brandid=<?php  echo $result['brandid']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to Delete It?')" href="?delbrand=<?php  echo $result['brandid']; ?>">Delete</a></td>
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

