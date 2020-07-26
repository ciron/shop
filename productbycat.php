<?php  include_once 'inc/header.php';?>
<?php 
  if(!isset($_GET['catId']) || ($_GET['catId'])== NULL){
	echo "<script>window.location='404.php';</script>";
 }else {
	 $id = $_GET['catId'];
 }

?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest from Selected Catagory</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	        <div class="section group">
			<?php 
				$getPdByCat=$pd->getProductByCat($id);
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
						header("Location:404.php");
					}
				?>
			</div>
		</div>
	 </div>
</div>
<?php  include_once 'inc/footer.php';?>