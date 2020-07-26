<?php 
	include_once 'inc/header.php';
	include_once 'inc/slider.php';

?>
		
        <div class="main">   
			<div class="content">
				<div class="content_top">
					<div class="heading">
					   <h3>Feature Products</h3>
					</div>
					<div class="clear"></div>
				</div>
				<div class="section group">
				<?php 
					$getfpd= $pd->getFeturedProduct();
					if($getfpd){
						while($result = $getfpd->fetch_assoc()){
							
				?>
					<div class="grid_1_of_4 images_1_of_4">
							<a href="preview.php?proid=<?php  echo $result['productid'];  ?>"><img src="admin/<?php echo $result['image']; ?>" style="width:150px;height:160px;" alt="" /></a>
							<h2><?php echo $result['productname']; ?></h2>
							<p><?php echo $fm->textShorten($result['body'],20); ?></p>
							<p><span class="price">‎৳<?php echo $result['price']; ?> ‎BDT </span></p>
							<div class="button"><span><a href="preview.php?proid=<?php  echo $result['productid'];  ?>" class="details">Details</a></span></div>
					</div>
					<?php 
									
								}
							}
					?>
				
				</div>
				<div class="content_bottom">
					<div class="heading">
					   <h3>New Products</h3>
					</div>
					<div class="clear"></div>
				</div>
				<div class="section group">
				<?php 
					$getnpd= $pd->getNewProduct();
					if($getnpd){
						while($result = $getnpd->fetch_assoc()){
							
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
							}
					?>	
				</div>
			</div>
		</div>
    </div>
<?php  include_once 'inc/footer.php';?>