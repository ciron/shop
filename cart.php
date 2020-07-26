<?php  include_once 'inc/header.php';?>
<?php 
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$cartid=$_POST['cartid'];
		$quantity=$_POST['quantity'];
		
		$updatecart = $ct->updateCartquantity($cartid,$quantity);
		if($quantity<=0){
			$delproduct = $ct->delProductByCart($cartid);
		}
	}
	if(isset($_GET['delpro'])){
		$delid = $_GET['delpro'];
		$delproduct = $ct->delProductByCart($delid);
	}
	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;URL=?id=update'/>";
	}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
					<?php 
						if(isset($updatecart)){
							echo $updatecart;
						}
						if(isset($delproduct)){
							echo $delproduct;
						}
					?>
						<table class="tblone">
							<tr>
								<th width="5%">Serial</th>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="15%">Quantity</th>
								<th width="15%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php 
								$getcartpd = $ct->getCartProduct();
								if($getcartpd){
									$i=0;
									$sum=0;
									while($result =$getcartpd->fetch_assoc()){
										$i++;
							
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productname'];?></td>
								<td><img src="admin/<?php echo $result['image'];?>" alt=""/></td>
								<td>৳<?php echo $result['price']; ?> ‎BDT </td>
								<td>
									<form action="" method="post">
									<input type="hidden" name="cartid" value="<?php echo $result['cartid']; ?>"/>
										<input type="number" name="quantity" value="<?php echo $result['quantity']; ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>৳
								<?php 
									$total = $result['price']* $result['quantity'];
									echo $total;
								?>
								</td>
								<td><a onclick="return confirm('Are you Sure To cancel?')" href="?delpro=<?php echo $result['cartid'];?>">X</a></td>
							</tr>
							<?php 
								$sum = $sum+$total;
								Session::set("sum",$sum);
									}
								}
							?>
						</table>
						<?php 
							$getData = $ct->checkcart();
							if($getData){
						?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>TK : <?php echo $sum;?> BDT</td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>TK.
								<?php 
									$vat = $sum*0.1;
									$grandtotal = $sum +$vat;
									echo $grandtotal;
								?> BDT
								</td>
							</tr>
					   </table>
							<?php }else{
								echo "Cart empty.Please Shop now!!";
							}?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php">Continue Shopping</a>
						</div>
						<div class="shopright">
							<a href="payment.php"> Cheakout</a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
<?php  include_once 'inc/footer.php';?>