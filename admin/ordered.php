<?php 
include 'include/header.php';
include 'include/sidebar.php';
$filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/cart.php');
    $ct = new cart();
	$fm = new Format(); 
?>
<?php 
	if(isset($_GET['shiftid'])){
		$id=$_GET['shiftid'];
		$price=$_GET['price'];
		$time=$_GET['time'];
		$shift = $ct->productShifted($id,$price,$time);
	}
	if(isset($_GET['delorder'])){
		$id=$_GET['delorder'];
		$price=$_GET['price'];
		$time=$_GET['time'];
		$delOrder = $ct->delOrder($id,$price,$time);
	}
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Place Order By Customers</h2>
				<?php 
				 if(isset($shift)){
					 echo $shift;
				 }
				 if(isset($delOrder)){
					echo $delOrder;
				}
				?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID </th>
							<th>Date & Time</th>
							<th>Name</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Cus.ID</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                        <?php 
                           
                            $getOrder = $ct->getAllProduct();
                            if($getOrder){
                                while($result=$getOrder->fetch_assoc()){
                        
                        ?>
						<tr class="odd gradeX">
							<td><?php echo $result['productid'];?></td>
							<td><?php echo $fm->formatDate($result['date']);?></td>
							<td><?php echo $result['productname'];?></td>
							<td><?php echo $result['quantity'];?></td>
							<td><?php echo $result['price'];?></td>
							<td><?php echo $result['cmrid'];?></td>
							<td><a href="customer.php?cusid=<?php echo $result['cmrid'];?>">View details</a></td>				
							<?php if($result['status']=='0'){ ?>				
								<td><a href="?shiftid=<?php echo $result['cmrid'];?>& price=<?php echo $result['price'];?>& time=<?php echo $result['date']; ?>">Shifted</a>||<a onclick="return confirm('Are you sure to Remove It?')" href="?delorder=<?php echo $result['cmrid'];?>& price=<?php echo $result['price'];?>& time=<?php echo $result['date']; ?>" >Remove</a></td>
							<?php }else{ ?>
								<td><a onclick="return confirm('Are you sure to Delete It?')" href="?delorder=<?php echo $result['cmrid'];?>& price=<?php echo $result['price'];?>& time=<?php echo $result['date']; ?>">Delete</a></td>
							<?php } ?>
						</tr>
						<?php             
                                }
                            }?>
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
