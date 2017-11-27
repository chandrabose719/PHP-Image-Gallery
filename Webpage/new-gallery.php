<!-- PHP Part -->
<?php
	session_start();
	include_once('gallerydb.php');
	$user_id = $_SESSION['user_id'];
	if ($user_id=='') {	
		header('location:index.php');
		exit;    
	}
	else{
		$response = mysql_query("SELECT * FROM user_details WHERE user_id='$user_id'");
		$result = mysql_fetch_array($response);
		$user_name = $result['user_name'];
		if (isset($_POST['gallery_submit'])) {		
			$gallery_name = mysql_real_escape_string($_POST['gallery_name']);
			$check_gallery_name = mysql_query("SELECT gallery_name FROM gallery_details WHERE gallery_name='$gallery_name'");
			$count = mysql_num_rows($check_gallery_name);
			if ($count==0) {
				print_r($user_id);
				print_r($gallery_name);
				$response = mysql_query("INSERT INTO gallery_name_details VALUES('$user_id','$gallery_name')");
				if ($response) {
					mkdir("images/galleries/".$gallery_name, 0755);
					header('location:home.php');
					exit;	
				}
				else{
					header('location:logout.php');
					exit;
				}
			}
			else{	
				$msg = "<div style='color:#d9534f;'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry, Gallery Name Already Exists.</div>";
			}
		}
		if (isset($_POST['image_submit'])) {		
			$gallery_name = mysql_real_escape_string($_POST['gallery_name']);
			$image_category = mysql_real_escape_string($_POST['image_category']);
			$image_file = $_FILES['image_file']['tmp_name'];
			$image_name = $_FILES['image_file']['name'];
			$ext = pathinfo($image_name, PATHINFO_EXTENSION);
			if($ext == "jpg" || $ext == "png" || $ext == "jpeg") {
			    $img_dest_file = "images/galleries/".$gallery_name."/".$image_name;
				move_uploaded_file($image_file, $img_dest_file);			
				$img_query = mysql_query("INSERT INTO gallery_details VALUES (NULL, '$user_id', '$gallery_name', '$image_category', '$img_dest_file')");
				if ($img_query) {
					header('location:home.php');
					exit;	
				} 
				else {
					$img_msg = "<div style='color:#d9534f;'><span class='glyphicon glyphicon-info-sign'></span> &nbsp;Sorry, Error While Storing.</div>";
				}
			}
			else{
				$img_msg = "<div style='color:#d9534f;'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry, only JPG, JPEG & PNG files are allowed.</div>";
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
						<li><a href="profile.php">Hi! <?php echo $user_name; ?></a></li>	
						<li><a href="logout.php">LOGOUT </a></li>	
			      	</ul>
	            </div>
	        </div>
	    </nav>
	</div>
	<!-- Gallery Part -->
	<div id="new-gallery-part">
		<div class="container">
			<br/><div class="row">  
		        <div class="col-md-12">
		        	<div class="well well-sm">
		        		<a href="home.php"><span class="fa fa-arrow-left"></span>&nbsp;Back to Previous</a>
		        	</div>
		        </div>
		    </div><br/>    	
			<div class="row">  
		        <div class="col-md-6">
		            <div class="new-gallery-content"> 
						<h3>New Gallery Details</h3>
						<div class="divider"></div><br/>	 
						<?php
							if(isset($msg)){
								echo $msg;
							}
						?>
						<form method="post">
							<div class="form-group col-xs-8">
								<label>Gallery Name:</label>
								<input class="form-control" type="text" name="gallery_name" placeholder="Gallery Name" required>
							</div><br/>
							<div class="form-group col-xs-8 btn-submission">
								<input class="form-control btn btn-success" type="submit" name="gallery_submit" value="Submit">
							</div>
						</form>
					</div>	
				</div>
				<div class="col-md-6">
		            <div class="new-gallery-content"> 
						<h3>New Image Details</h3>
						<div class="divider"></div><br/>	 
						<?php
							if(isset($img_msg)){
								echo $img_msg;
							}
						?>
						<form method="post" enctype="multipart/form-data">
							<div class="form-group col-xs-8">
								<?php
									$resp = mysql_query("SELECT gallery_name FROM gallery_name_details WHERE user_id='$user_id'");
								?>
								<label>Gallery Name:</label>
								<select class="form-control" name="gallery_name" required>
								<?php
									while($row = mysql_fetch_array($resp)){
								?>
									<option> <?php echo $row['gallery_name']; ?></option>
		                    	<?php	
									}
								?>
								</select>
							</div><br/>
							<div class="form-group col-xs-8">
								<label>Image Category:</label>
								<select class="form-control" name="image_category" required>
									<option>Family</option>
									<option>Tour</option>
									<option>Party</option>
									<option>Office</option>
								</select>
							</div><br/>
							<div class="form-group col-xs-8">
								<label>Image File:</label>
								<input class="form-file" type="file" name="image_file" required>
							</div><br/>
							<div class="form-group col-xs-8 btn-submission">
								<input class="form-control btn btn-success" type="submit" name="image_submit" value="Upload">
							</div>
						</form>
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