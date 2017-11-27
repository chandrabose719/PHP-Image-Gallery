<?php
	session_start();
	include_once('gallerydb.php');
	$user_id = $_SESSION['user_id'];
	if ($user_id =='') {
		header('location:index.php');
		exit;
	}
	else{
		$response = mysql_query("SELECT * FROM user_details WHERE user_id='$user_id'");
		while ($row = mysql_fetch_array($response)) {
			$username = $row['user_name'];
			$useremail = $row['user_email'];
			$userpassword = $row['user_password'];
			$usermobile = $row['user_mobile'];
		}
		if (isset($_POST['edit-submit'])) {
			$user_name = $username;
			$user_email = mysql_real_escape_string($_POST['user_email']);
			$user_mobile = mysql_real_escape_string($_POST['user_mobile']);
			$user_password = mysql_real_escape_string($_POST['user_password']);
			
			if (preg_match('/^\d{10}$/', $user_mobile) ){
				$query = "UPDATE user_details SET user_email='$user_email', user_mobile='$user_mobile', user_password='$user_password' WHERE user_name = '$user_name'";
				$res = mysql_query($query);
				if ($res) {
					header('location:profile.php');
					exit;
				}else{
					$msg = "<div style='color:#d9534f;'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error While Updating.</div>";
				}
			}	
			else{

				$msg = "<div style='color:#d9534f;'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; Enter Valid Mobile Number.</div>";
			}	
		}
	}		
?>

<!-- HTML Part -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Short Description About The Image Gallery.">
    <meta name="keyword" content="Online Image Gallery related Keywords">
    <meta name="copyright" content="Company Name">
	<link href="images/title.png" rel="shortcut icon" type="image/x-icon">
	<title> Home || Online Image Gallery </title>
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
	                <a class="navbar-brand" href="home.php">COMPANY LOGO</a>
	            </div>
	            <div class="collapse navbar-collapse navbar-right">
			      	<ul class="nav navbar-nav">
			        	<li class=""><a href="home.php" class="">HOME</a></li>	
						<li><a href="profile.php">Hi! <?php echo $username; ?></a></li>	
						<li><a href="logout.php">LOGOUT </a></li>	
			      	</ul>
	            </div>
	        </div>
	    </nav>
	</div>
	
	<div id="edit-part">
		<div class="container">
			<br/><div class="row">  
		        <div class="col-md-12">
		        	<div class="well well-sm">
		        		<a href="profile.php"><span class="fa fa-arrow-left"></span>&nbsp;Back to Previous</a>
		        	</div>
		        </div>
		    </div><br/>
			<div class="row">
				<div class="col-md-12">
					<div class="edit-content">
						<h1>User Particuler Updation </h1><br/>
						<?php
							if (isset($msg)) {
								echo $msg;
							}
						?>
						<div class='view-table'>
							<form method="post">
								<table class='table table-striped table-bordered table-hover'>
									<tr>
										<th colspan='2' style="text-align:center;">User details </th>
									</tr>
									<tr>
										<td>User Email :</td><td><input class="form-control" type="email" name="user_email" value="<?php echo $useremail;?>" required></td>
									</tr>
									<tr>
										<td>Password :</td><td><input class="form-control" type="text" name="user_password" value="<?php echo $userpassword;?>" required></td>
									</tr>
									<tr>
										<td>Mobile Number :</td><td><input class="form-control" type="number" name="user_mobile" value="<?php echo $usermobile;?>" required></td>
									</tr>
									<tr>
										<td colspan='2'><input class="btn btn-success" type="submit" name="edit-submit" value="Edit Details"></td>
									</tr>
								</table>
							</form>	
						</div>
					</div>
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
