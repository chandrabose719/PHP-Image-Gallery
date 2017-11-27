<?php
	session_start();
	include_once('gallerydb.php');
	if (isset($_POST['register-submit'])) {
		$user_name = mysql_real_escape_string($_POST['user_name']);
		$user_email = mysql_real_escape_string($_POST['user_email']);
		$user_mobile = mysql_real_escape_string($_POST['user_mobile']);
		$user_password = mysql_real_escape_string($_POST['user_password']);
		$confirm_password = mysql_real_escape_string($_POST['confirm_password']);
		if ($user_password == $confirm_password) {
			if (preg_match('/^\d{10}$/', $user_mobile) ) {
				$query = "SELECT user_email FROM user_details WHERE user_email = '$user_email'";
				$res = mysql_query($query);
				$count = mysql_num_rows($res);
				if ($count==0){
					$query = "INSERT INTO user_details VALUES(NULL, '$user_name','$user_email','$user_password','$user_mobile')";
					if (mysql_query($query)) {
						header('location:index.php');	
						exit;
					} 
					else {
						$msg = "<div style='color:#d9534f;'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error While Registering.</div>";
					}
				}
				else{	
					$msg = "<div style='color:#d9534f;'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; User Email Already Exist </div>";
				}
			}	
			else{
				$msg = "<div style='color:#d9534f;'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; Enter Valid Mobile Number. </div>";
			}		
		}
		else{	
			$msg = "<div style='color:#d9534f;'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; Passwords are Incorrect </div>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Short Description About The Image Gallery.">
    <meta name="keyword" content="Online Image Gallery related Keywords">
    <meta name="copyright" content="Company Name">
	<link href="images/title.png" rel="shortcut icon" type="image/x-icon">
	<title> Register || Online Image Gallery </title>
	<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/animate.min.css" rel="stylesheet" type="text/css">
	<link href="css/maincss.css" rel="stylesheet" type="text/css">
</head>
<body>
	<!-- Header Part -->
	<div id="header-part">
	    <nav class="navbar navbar-custom navbar-fixed-top">
	        <div class="container">
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                	<span class="sr-only">Toggle navigation</span>
	                	<span class="icon-bar"></span>
	                	<span class="icon-bar"></span>
	                	<span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand" href="index.php">COMPANY LOGO</a>
	            </div>
	            <div class="collapse navbar-collapse navbar-right">
			      	<ul class="nav navbar-nav">
			        	<li class=""><a href="index.php" class="">LOGIN</a></li>		
			      	</ul>
	            </div>
	        </div>
	    </nav>
	</div>
	<!-- Index Part -->
	<div id="register-part">
		<div class="container">
			<div class="row">	
				<div class="col-md-8">
					<div class="form-content">
						<h4>User Registeration</h4>
						<div class="divider"></div>
						<?php
							if (isset($msg)) {
								echo $msg;
							}
						?>
						<form method="post">
							<div class="form-group col-xs-8">
								<label>User Name:</label>
								<input type="text" class="form-control" name="user_name" placeholder="Full Name" required>
							</div><br/>
							<div class="form-group col-xs-8">
								<label>User Mobile:</label>
								<input type="text" class="form-control" name="user_mobile" placeholder="10 Digit Number" required>
							</div><br/>
							<div class="form-group col-xs-8">
								<label>user Email:</label>
								<input type="email" class="form-control" name="user_email" placeholder="Valid Email" required>
							</div><br/>
							<div class="form-group col-xs-8">
								<label>Password:</label>
								<input type="password" class="form-control" name="user_password" placeholder="More than 5 Digit" required>
							</div><br/>
							<div class="form-group col-xs-8">
								<label>Confirm Password:</label>
								<input type="password" class="form-control" name="confirm_password" placeholder="Retype Password" required>
							</div><br/>
							<div class="form-group col-xs-8 btn-submission">
								<input class="form-control btn btn-success" type="submit" name="register-submit" value="Submit">
							</div><br/>
							<div class="form-group col-xs-8">
								<p>You have an Account, Click Here to  <a href="index.php"><u>LOGIN</u></a></p>	
							</div>
						</form>
					</div>
				</div>		
			</div>		
		</div>
	</div>
	<!-- Footer Part -->
	<div id="footer-part">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="copyright"> <strong> Image Gallery</strong> - 2017 &copy; All Rights Reserved.</div>
				</div>
			</div>
		</div>
	</div>
	<!-- JavaScript Part -->
 	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/jquery.wow.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/custom.js"></script>
</body>
</html>