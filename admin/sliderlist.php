<?php 
    include_once 'include/header.php';
    include_once 'include/sidebar.php';
    
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/product.php');
	$pd= new product();
?>
<?php
	if(isset($_GET['delslide'])){
		$id= $_GET['delslide'];
		$deletslide = $pd->delslideById($id);
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Slider List</h2>
		<?php 
			if(isset($delslide)){
				echo $delslide;
			}
		?>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>No.</th>
					<th>Slider Title</th>
					<th>Slider Image</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
				 
				$getslider =$pd->getAllSlider();
				if ($getslider){
					$serial=0;
					while($result=$getslider->fetch_assoc()){
						$serial++;
			?>
				<tr class="odd gradeX">
					<td><?php echo $serial;?></td>
					<td><?php  echo $result['title']?></td>
					<td><img src="<?php echo $result['image'];?>" height="40px" width="60px"/></td>				
					<td><a onclick="return confirm('Are you sure to Delete It?')" href="?delslide=<?php  echo $result['id']; ?>">Delete</a></td>
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
