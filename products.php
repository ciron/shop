<?php  include_once 'inc/header.php';?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    			<h3>Latest from Tablet</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
		<div class="section group">
			<?php 
			$getPdByCat=$pd->getProductByTablet();
				if($getPdByCat){
					while($result = $getPdByCat->fetch_assoc()){

			
			?>
			<div class="grid_1_of_4 images_1_of_4">
					<a href="preview.php?proid=<?php  echo $result['productid'];  ?>"><img src="admin/<?php echo $result['image']; ?>" style="width:150px;height:160px;" alt="" /></a>
					<h2><?php echo $result['productname']; ?> </h2>
					<p><?php echo $fm->textShorten($result['body'],20); ?></p>
					<p><span class="price">৳<?php echo $result['price']; ?> ‎BDT </span></p>
					<div class="button"><span><a href="preview.php?proid=<?php  echo $result['productid'];  ?>" class="details">Details</a></span></div>
			</div>
			<?php 
					}
				}else{
					echo "<span style='color:red;font-size:25px;text-align:center;display: block;'>No Product avialable this Catagory!!</span>";
				}
			?>
		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>Latest from Syrup</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php 
			$getPdByCat=$pd->getProductBySyrup();
				if($getPdByCat){
					while($result = $getPdByCat->fetch_assoc()){

			
			?>
			<div class="grid_1_of_4 images_1_of_4">
					<a href="preview.php?proid=<?php  echo $result['productid'];  ?>"><img src="admin/<?php echo $result['image']; ?>" style="width:150px;height:160px;" alt="" /></a>
					<h2><?php echo $result['productname']; ?> </h2>
					<p><?php echo $fm->textShorten($result['body'],40); ?></p>
					<p><span class="price">৳<?php echo $result['price']; ?> ‎BDT </span></p>
					<div class="button"><span><a href="preview.php?proid=<?php  echo $result['productid'];  ?>" class="details">Details</a></span></div>
			</div>
			<?php 
					}
				}else{
					echo "<span style='color:red;font-size:25px;text-align:center;display: block;'>No Product avialable this Catagory!!</span>";
				}
			?>
		</div>
		<div class="content_top">
    		<div class="heading">
    			<h3>Latest from injection</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
		<div class="section group">
			<?php 
			$getPdByCat=$pd->getProductByInjecttion();
				if($getPdByCat){
					while($result = $getPdByCat->fetch_assoc()){

			
			?>
			<div class="grid_1_of_4 images_1_of_4">
					<a href="preview.php?proid=<?php  echo $result['productid'];  ?>"><img src="admin/<?php echo $result['image']; ?>" style="width:150px;height:160px;" alt="" /></a>
					<h2><?php echo $result['productname']; ?> </h2>
					<p><?php echo $fm->textShorten($result['body'],40); ?></p>
					<p><span class="price">৳<?php echo $result['price']; ?> ‎BDT </span></p>
					<div class="button"><span><a href="preview.php?proid=<?php  echo $result['productid'];  ?>" class="details">Details</a></span></div>
			</div>
			<?php 
					}
				}else{
					echo "<span style='color:red;font-size:25px;text-align:center;display: block;'>No Product avialable this Catagory!!</span>";
				}
			?>
		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>Latest from Capsules</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php 
			$getPdByCat=$pd->getProductByCapsules();
				if($getPdByCat){
					while($result = $getPdByCat->fetch_assoc()){

			
			?>
			<div class="grid_1_of_4 images_1_of_4">
					<a href="preview.php?proid=<?php  echo $result['productid'];  ?>"><img src="admin/<?php echo $result['image']; ?>" style="width:150px;height:160px;" alt="" /></a>
					<h2><?php echo $result['productname']; ?> </h2>
					<p><?php echo $fm->textShorten($result['body'],40); ?></p>
					<p><span class="price">৳<?php echo $result['price']; ?> ‎BDT </span></p>
					<div class="button"><span><a href="preview.php?proid=<?php  echo $result['productid'];  ?>" class="details">Details</a></span></div>
			</div>
			<?php 
					}
				}else{
					echo "<span style='color:red;font-size:25px;text-align:center;display: block;'>No Product avialable this Catagory!!</span>";
				}
			?>
		</div>
		<div class="content_top">
    		<div class="heading">
    			<h3>Latest from Drop</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
		<div class="section group">
			<?php 
			$getPdByCat=$pd->getProductByDrop();
				if($getPdByCat){
					while($result = $getPdByCat->fetch_assoc()){

			
			?>
			<div class="grid_1_of_4 images_1_of_4">
					<a href="preview.php?proid=<?php  echo $result['productid'];  ?>"><img src="admin/<?php echo $result['image']; ?>" style="width:150px;height:160px;" alt="" /></a>
					<h2><?php echo $result['productname']; ?> </h2>
					<p><?php echo $fm->textShorten($result['body'],40); ?></p>
					<p><span class="price">৳<?php echo $result['price']; ?> ‎BDT </span></p>
					<div class="button"><span><a href="preview.php?proid=<?php  echo $result['productid'];  ?>" class="details">Details</a></span></div>
			</div>
			<?php 
					}
				}else{
					echo "<span style='color:red;font-size:25px;text-align:center;display: block;'>No Product avialable this Catagory!!</span>";
				}
			?>
		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>Latest from Medicine</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php 
			$getPdByCat=$pd->getProductByMedicine();
				if($getPdByCat){
					while($result = $getPdByCat->fetch_assoc()){

			
			?>
			<div class="grid_1_of_4 images_1_of_4">
					<a href="preview.php?proid=<?php  echo $result['productid'];  ?>"><img src="admin/<?php echo $result['image']; ?>" style="width:150px;height:160px;" alt="" /></a>
					<h2><?php echo $result['productname']; ?> </h2>
					<p><?php echo $fm->textShorten($result['body'],40); ?></p>
					<p><span class="price">৳<?php echo $result['price']; ?> ‎BDT </span></p>
					<div class="button"><span><a href="preview.php?proid=<?php  echo $result['productid'];  ?>" class="details">Details</a></span></div>
			</div>
			<?php 
					}
				}else{
					echo "<span style='color:red;font-size:25px;text-align:center;display: block;'>No Product avialable this Catagory!!</span>";
				}
			?>
		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>Latest from Liquid</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php 
			$getPdByCat=$pd->getProductByLiquid();
				if($getPdByCat){
					while($result = $getPdByCat->fetch_assoc()){

			
			?>
			<div class="grid_1_of_4 images_1_of_4">
					<a href="preview.php?proid=<?php  echo $result['productid'];  ?>"><img src="admin/<?php echo $result['image']; ?>" style="width:150px;height:160px;" alt="" /></a>
					<h2><?php echo $result['productname']; ?> </h2>
					<p><?php echo $fm->textShorten($result['body'],40); ?></p>
					<p><span class="price">৳<?php echo $result['price']; ?> ‎BDT </span></p>
					<div class="button"><span><a href="preview.php?proid=<?php  echo $result['productid'];  ?>" class="details">Details</a></span></div>
			</div>
			<?php 
					}
				}else{
					echo "<span style='color:red;font-size:25px;text-align:center;display: block;'</span>";
				}
			?>
		</div>
    </div>
 </div>
</div>
<?php  include_once 'inc/footer.php';?>