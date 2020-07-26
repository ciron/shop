<?php include 'include/header.php';?>
<?php 
include 'include/sidebar.php';

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/customer.php');

?>
<?php
 $cmr= new Customer();
 if(isset($_GET['delmsg'])){
	$id=$_GET['delmsg'];
	
	$delOrder = $cmr->delCusMsg($id);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial</th>
							<th>Name</th>
							<th>Email</th>
							<th>Mobile</th>							
							<th>Address</th>
							<th>Message</th>
							<th>Prescription</th>
							<th>Date & Time</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					   $cmr= new Customer();
						$getmsg =$cmr->getAllMessage();
						if ($getmsg){
							$serial=0;
							while($result=$getmsg->fetch_assoc()){
								$serial++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $serial;?></td>
							<td><?php echo $result['names'];?></td>
							<td><?php echo $result['email'];?></td>
							<td class="center"> <?php echo $result['mobile'];?></td>
							<td ><?php echo $result['address'];?></td>
							
							<td><?php echo $fmt->textShorten($result['body'],10);?></td>
							
							<td><img src="../<?php echo $result['image'];?>" alt="" height="40px"width="40px"></td>
							<td ><?php echo $fmt->formatDate($result['Date']);?></td>
							<td><a href="contact.php?msgid=<?php echo $result['conid'];?>">View Details</a> || <a onclick="return confirm('Are you sure to Delete It?')" href="?delmsg=<?php  echo $result['conid']; ?>">Delete</a></td>
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
