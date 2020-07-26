<?php  include_once 'inc/header.php';?>
<?php 
 include_once 'classes/catagory.php';
?>
<?php 
    if(!isset($_GET['proid']) || ($_GET['proid'])== NULL){
       echo "<script>window.location='404.php';</script>";
    }else {
        $id = $_GET['proid'];
    }
    
     if($_SERVER['REQUEST_METHOD']=='POST'){
		$quantity=$_POST['quantity'];
		
		$addcart = $ct->addToCart($quantity,$id);
	}
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
			<div class="cont-desc span_1_of_2">	
			<?php 
				$getpd=$pd->getSingleProduct($id);
				if($getpd){
					while($result = $getpd->fetch_assoc()){
						
			?>			
				<div class="grid images_3_of_2">
					<img src="admin/<?php echo $result['image']; ?>" alt="" />
				</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['productname']; ?></h2>
									
					<div class="price">
						<p>Price: <span>৳<?php echo $result['price']; ?> ‎BDT </span></p>
						<p>Category: <span><?php echo $result['catName']; ?></span></p>
						<p>Brand:<span><?php echo $result['Brandname']; ?></span></p>
					</div>
					<div class="add-cart">
						<form action="" method="post">
							<input type="number" class="buyfield" name="quantity" value="1"/>
							<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
						</form>				
					</div>
					<span style="color:red;font-size:20px;">
					<?php 
					 if(isset($addcart)){
						 echo $addcart;
					 }
					?></span>
				</div>
				<div class="product-desc">
					<h2>Product Details</h2>
					<p><?php echo $result['body']; ?></p>
				</div>
				<?php 
					}
				}
				?>	
			</div>
			<div class="rightsidebar span_3_of_1">
				<h2>CATEGORIES</h2>
				<?php 
                           
                            $getcat = $cat->getAllCat();
                            if ($getcat){
                                while($result = $getcat->fetch_assoc()){
                          
                         ?>          
				<ul>
					<li><a href="productbycat.php?catId=<?php echo $result['catid'];?>"><?php echo $result['catName'];?></a></li>
					
				</ul>
				<?php 
                                }
                            }
                           ?>
			</div>
 		</div>
 	</div>
	</div>
	<?php  include_once 'inc/footer.php';?>