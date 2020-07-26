<?php include 'include/header.php';?>
<?php 
include 'include/sidebar.php';

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/customer.php');

?>
<?php
 $cmr= new Customer();
 if(isset($_GET['delcus'])){
	$id=$_GET['delcus'];
	
	$delcustom = $cmr->delCustomer($id);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">  
                    <?php 
                     if(isset($delcustom)){
                         echo $delcustom;
                     }
                    ?>      
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial</th>
							<th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Division</th>
							<th>Mobile</th>															
							<th>Date & Time</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					   $cmr= new Customer();
						$getuser =$cmr->getAllUsers();
						if ($getuser){
							$serial=0;
							while($result=$getuser->fetch_assoc()){
								$serial++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $serial;?></td>
							<td><?php echo $result['names'];?></td>
                            <td><?php echo $result['email'];?></td>
                            <td ><?php echo $result['address'];?></td>
							<td class="center"> <?php echo $result['city'];?></td>
							<td class="center"> <?php echo $result['phone'];?></td>						
							<td ><?php echo $fmt->formatDate($result['date']);?></td>
							<td><a onclick="return confirm('Are you sure to Delete It?')" href="?delcus=<?php  echo $result['id']; ?>">Delete</a></td>
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
