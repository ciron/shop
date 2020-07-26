<?php  include_once '../classes/adminlogin.php';?>
<?php  
	
	$al = new adminlogin();
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$ausername=$_POST['ausername'];
		$apass = ($_POST['apass']);

		$loginchk = $al->adminlogin($ausername,$apass);
	}
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<span style="color:red;">
			<?php 
				if(isset($loginchk)){
					echo $loginchk;
				}
			?>
			</span>
			<div>
				<input type="text" placeholder="Username"  name="ausername"/>
			</div>
			<div>
				<input type="password" placeholder="Password"  name="apass"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">BUBT TEAM</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>