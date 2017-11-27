<!-- PHP Part -->
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
		$result = mysql_fetch_array($response);
		$user_name = $result['user_name'];
		$res = $result;
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
						<li><a href="profile.php">Hi! <?php echo $user_name; ?> </a></li>	
						<li><a href="logout.php">LOGOUT </a></li>	
			      	</ul>
	            </div>
	        </div>
	    </nav>
	</div>
	<!-- Profile Part -->
	<div id="profile-part">
		<div class="container">
			<br/><div class="row">  
		        <div class="col-md-12">
		        	<div class="well well-sm">
		        		<a href="home.php"><span class="fa fa-arrow-left"></span>&nbsp;Back to Previous</a>
		        	</div>
		        </div>
		    </div><br/>
		    <div class="row">
		    	<div class="col-md-12">
					<div class="profile-content">
						<h1>User Profile </h1>
						<?php
							echo "<div class='view-table'><table class='table table-striped table-bordered table-hover'>";
							echo "<tr><th colspan='2' style='text-align:center;'>User Details </th></tr>";
							$response = mysql_query("SELECT * FROM user_details WHERE user_id='$user_id'");
							while ($row = mysql_fetch_array($response)) {
								echo "<tr><td>User Name :</td><td>" .$row['user_name']. "</td></tr>";
								echo "<tr><td>User Email :</td><td>" .$row['user_email']. "</td></tr>";
								echo "<tr><td>Mobile Number :</td><td>" .$row['user_mobile']. "</td></tr>";
								echo "<tr><td>User Password :</td><td>" .$row['user_password']. "</td></tr>";
							}
							echo"</table></div>";
						?>
						<div class="well well-sm">
							If You want to change the details <a href="profile-edit.php">Edit</a> Here!!.
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