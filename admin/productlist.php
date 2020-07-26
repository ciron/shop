<?php
 include_once 'include/header.php';
 include_once 'include/sidebar.php';
 include_once '../classes/product.php';
 include_once '../helpers/format.php';
 include_once '../lib//session.php';
?>
<?php
	$pd= new product();
	$fmt= new Format();
	
	if(isset($_GET['delpro'])){
		$id= $_GET['delpro'];
		$delpro = $pd->delProById($id);
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
		<?php 
			if(isset($delpro)){
					echo $delpro;
				}
		?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Serial</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Price</th>
					<th>image</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$getpd =$pd->getAllProduct();
				if ($getpd){
					$serial=0;
					while($result=$getpd->fetch_assoc()){
						$serial++;
			?>
				<tr class="odd gradeX">
					<td><?php echo $serial;?></td>
					<td><?php echo $result['productname'];?></td>
					<td><?php echo $result['catName'];?></td>
					<td class="center"> <?php echo $result['Brandname'];?></td>
					<td><?php echo $fmt->textShorten($result['body'],10);?></td>
					<td>৳ <?php echo $result['price'];?>‎ BDT</td>
					<td><img src="<?php echo $result['image'];?>" alt="" height="40px"width="40px"></td>
					<td>
					 <?php
					if( $result['types']==1){
						echo 'Fetured';
					}else{
						echo 'Generel';
					}
					?>
					</td>
					<td><a href="productedit.php?productid=<?php  echo $result['productid']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to Delete It?')" href="?delpro=<?php  echo $result['productid']; ?>">Delete</a></td>
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
