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
		$query = mysql_query("SELECT gallery_name FROM gallery_details WHERE user_id = '$user_id'");
		$row = mysql_num_rows($query);
		if ($row ==0) {
			header('location:new-gallery.php');
			exit;
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
			        	<li class=""><a href="new-gallery.php" class="">NEW GALLERY</a></li>	
						<li><a href="profile.php">Hi! <?php echo $user_name; ?></a></li>	
						<li><a href="logout.php">LOGOUT </a></li>	
			      	</ul>
	            </div>
	        </div>
	    </nav>
	</div>
	<!-- Home Part -->
	<div id="home-part">
		<div class="container">
			<div class="row">
				<h2>Hi! <?php echo $user_name; ?></h2>
				<h4>Welcome To Dashboard</h4>
				<div class="divider"></div>
			</div><br/><br/>
			<?php
				$numOfCols = 4;
				$rowCount = 0;
				$bootstrapColWidth = 12 / $numOfCols;
			?>
			<div class="row">
				<?php
					$query = mysql_query("SELECT gallery_name FROM gallery_name_details WHERE user_id = '$user_id'");
					while ($row = mysql_fetch_array($query)){
				?>  
		        <div class="col-md-<?php echo $bootstrapColWidth; ?>">
		            <div class="home-content"> 
						<h3><?php echo $row['gallery_name']; ?></h3>
						<div class="divider"></div><br/>
						<div class="view-btn"><button class="btn btn-success" onclick="window.location.href='view-gallery.php?name=<?php echo $row["gallery_name"]; ?>'">View Images</button></div>
					</div>
		        </div>
				<?php
				    $rowCount++;
				    if($rowCount % $numOfCols == 0) echo '</div><br/><br/><div class="row">';
					}
				?>
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