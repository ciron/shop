<?php 
	include_once 'inc/header.php';
	include_once 'lib/database.php';
	

	$login =  Session::get("customerLogin");
	if($login==true){
		header("Location:index.php");
	}
?>

 <div class="main">
    <div class="content">
	<?php 
			if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
				$email=$_POST['email'];
				$pass = md5($_POST['pass']);
				$customerLgin = $cmr->customerLogin($email,$pass);
			}
			
		?> 
    	<div class="login_panel">
		<?php 
				if(isset($customerLgin)){
					echo $customerLgin;
				}
			?>
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form  action="" method="post" id="member">
				<input name="email" type="text" Placeholder="Email"class="field">
				<input name="pass" type="password" Placeholder="Password" class="field" >
            
			<p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a>
			</p>
			<div class="buttons">
				<div><button class="grey" name="login" >Sign In</button>
				</div>
			</div>
			</form>
		</div>
		<?php 
			if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])){
						
				$customerReg = $cmr->customerRegistration($_POST);
			}
		?>
    	<div class="register_account">
			<?php 
				if(isset($customerReg)){
					echo $customerReg;
				}
			?>
    		<h3>Register New Account</h3>
    		<form action="" method="post">
		   		<table>
		   			<tbody>
						<tr>
						    <td>
								<div>
									<input type="text" name="names" placeholder="Name:" class="reg-details">
								</div>
														
								<div>
									<input type="email" placeholder="E-Mail" name="email"class="reg-details">
								</div>
								<div>
									<input type="text" name="address" placeholder="Address:" class="reg-details">
								</div>
		    			    </td>
		    			    <td>
								
							    <div>
									<select id="city" name="city" onchange="change_country(this.value)" class="frm-field required">
										<option value="null">Select your Division</option>         
										<option value="Khulna">Khulna</option>
										<option value="Chittagong">Chittagong</option>
										<option value="Barishal">Barishal</option>
										<option value="Dhaka">Dhaka</option>									
										<option value="Mymensingh">Mymensingh</option>
										<option value="Rajshahi">Rajshahi</option>
										<option value="Rangpur">Rangpur</option>
										<option value="Sylhet">Sylhet</option>

									</select>
							    </div>		        
								<div>
									<input type="text"name="phone" placeholder="Phone:" class="reg-details">
								</div>
									
								<div>
										<input type="password" name="pass" placeholder="Password:" class="reg-details">
								</div>
							</td>
		                </tr> 
			        </tbody>
		        </table> 
				<div class="search">
					<div><button class="grey" name="register">Create Account</button>
					</div>
				</div>
				<p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
				<div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
<?php  include_once 'inc/footer.php';?>