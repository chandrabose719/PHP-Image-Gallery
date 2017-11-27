<?php
	session_start();
	include_once('gallerydb.php');
	if (isset($_POST['login-submit'])) {
		$user_email = mysql_real_escape_string($_POST['user_email']);
		$user_password = mysql_real_escape_string($_POST['user_password']);
		if ($user_email!='' && $user_password!='') {
			$query = "SELECT user_id,user_email, user_password FROM user_details WHERE user_email = '$user_email' && user_password = '$user_password'";
			$res = mysql_query($query);
			$row = mysql_fetch_array($res);
			$count = mysql_num_rows($res);
			if ($count==1) {
				$_SESSION['user_id']=$row['user_id'];
				header('location:home.php');
				exit;
			}
			else{	
				$msg = "<div style='color:#d9534f;'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; Wrong Username or Password.</div>";
			}	
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
	<title> Login || Online Image Gallery </title>
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
			        	<li class=""><a href="index.php" class="">HOME</a></li>	
						<li><a href="registeration.php">User Registeration</a></li>	
			      	</ul>
	            </div>
	        </div>
	    </nav>
	</div>
	<!-- Index Part -->
	<div id="index-part">
		<div class="container">
			<div class="row">	
				<div class="col-md-8">
					<div class="login-part">
						<h4>Login</h4>
						<div class="divider"></div><br/>
						<?php
							if (isset($msg)) {
								echo $msg;
							}
						?>
						<form method="post">
							<div class="form-group col-xs-8">
								<label>user Email:</label>
								<input type="email" class="form-control" name="user_email" placeholder="Valid Email" required>
							</div><br/>
							<div class="form-group col-xs-8">
								<label>Password:</label>
								<input type="password" class="form-control" name="user_password" placeholder="User Password" required>
							</div><br/>
							<div class="form-group col-xs-8 btn-submission">
								<input class="form-control btn btn-success" type="submit" name="login-submit" value="Login">
							</div><br/>
							<div class="form-group col-xs-8 btn-submission">
								<p>If You are New, Click Here to  <a href="registeration.php"><u>REGISTER</u></a></p>	
							</div>
						</form>
					</div>
				</div>		
			</div>		
		</div>
	</div>
	<!-- Content Part -->
	<div id="content-part">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="index-content">
						<h2>Header Name</h2>
						<p>&emsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</p>
						<p>&emsp;Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> 
						<p>&emsp;Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p> 
						<p>&emsp;Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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



