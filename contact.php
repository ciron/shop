<?php  
	include_once 'inc/header.php';
	include_once 'classes/product.php';
	$pd = new product();
?>


 <div class="main">
    <div class="content">
    	<div class="support">
  			<div class="support_desc">
			  <?php 
				$getdes = $pd->getDescription($id);
					if($getdes){						
						while($result=$getdes->fetch_assoc()){
							
				?>
					<h3><?php echo $result['title'];?></h3>
					<p><span><?php echo $result['subtitle'];?></span></p>
					<p> <?php echo $result['body'];?></p>
				  <?php 
							 }
							}
						?>
  			</div>
  				
  			<div class="clear"></div>
		  </div>
		  <?php 
		 
		 if($_SERVER['REQUEST_METHOD']=='POST'){
			
				$customerCon = $cmr->customerContact($_POST,$_FILES);
			}	
		 
		 ?>
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
					  <?php
					 	 if(isset( $customerCon)){
							echo  $customerCon;
						}
						if(isset( $customCon)){
							echo  $customCon;
						}
					  ?>
				  	<h2 style="text-align:center;">Contact Us</h2>
					    <form action=" " method="POST" enctype="multipart/form-data" style="width: 70%;margin: 0 auto;">
					    	<div>
						    	<span><label>NAME</label></span>
						    	<span><input type="text" placeholder="Name"name="names"></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input type="email" placeholder="E-mail" name="email"></span>
						    </div>
						    <div>
						     	<span><label>MOBILE.NO</label></span>
						    	<span><input type="text" placeholder="Mobile Number..." name="mobile"></span>
						    </div>
						    <div>
						    	<span><label>Address</label></span>
						    	<span><input type="text" placeholder="Address...." name="address"></span>
						    </div>
							<div>
						    	<span><label>SUBJECT</label></span>
						    	<span><textarea name="body"> </textarea></span>
						    </div>
							<div>
								<h2>UpLoad your prescription here.If you have!!</h2>
								
								<span><label>Upload Prescription:</label></span>
								<input type="file" name="image" />
							</div>
						   <div>
						   		<input type="submit" value="SUBMIT" name="submit">
						  </div>
					    </form>
				  </div>
  				</div>
				<div class="col span_1_of_3">
      			<div class="company_address">
				     	<h2>Contact Address:</h2>
						    	<p>Mirpur 2</p>
						   		<p>Dhaka</p>
				   		<!-- <p>Phone:(+880) 1868 190622</p> -->
				   		
				 	 	<!-- <p>Email: <span>chiron.cse1998@gmail.com</span></p> -->
				   		
				   </div>
				 </div>
			  </div>    	
    </div>
 </div>
</div>
<?php  include_once 'inc/footer.php';?>