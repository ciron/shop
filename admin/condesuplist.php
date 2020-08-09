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
					<th>Title</th>
					<th>Sub Title</th>					
					<th>Description</th>					
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
            <?php 
				$getdes = $pd->getDescription();
					if($getdes){	
                        $serial=0;					
						while($result=$getdes->fetch_assoc()){
                            $serial++;
							
				?> <td><?php echo $serial;?></td>
					<td><?php echo $result['title'];?></td>
					<td><?php echo $result['subtitle'];?></td>
					<td><?php echo $fmt->textShorten($result['body'],60);?></td>
					<td><a href="condescupdate.php?descripid=<?php  echo $result['desid']; ?>">Edit</a> </td>
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
