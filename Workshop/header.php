<?php
session_start();
require 'connection.php';

$id=$_SESSION['id'];
$sql="select * from workshop where id=$id";
$result=$con->query($sql);
$row=$result->fetch_assoc();

?>				
				
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title><?php echo $row['workshop_name'];?></title>
		
		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Titillium+Web:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>


	<body>
		
		<div id="site-content">
			
			<header class="site-header">
				<div class="container">
					<a id="branding" href="index.php">
						<img src="images/logo.png" alt="Company Logo" class="logo">
						<h1 class="site-title"><?php echo $row['workshop_name'];?></h1>
					</a>

					<nav class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item"><a href="index.php">Home</a></li>
							<!-- <li class="menu-item current-menu-item"><a href="about.php">About</a></li> -->
							<li class="menu-item"><a href="services.php">Services</a></li>
							<li class="menu-item"><a href="view_request.php">Request&nbsp;<?php
								$sql="select * from request where status=0 and workshop_id=$id";
								$result=$con->query($sql);
								$count=$result->num_rows;
								echo '<sup><span class="badge badge-light" style="height:20px;width:20px;padding:2px;font-size:14px;color:red;"><b>
								
								'.$count.'</b>
								
							</span></sup>';?></a></li>
							<!-- <li class="menu-item"><a href="gallery.php">Gallery</a></li> -->
							<li class="menu-item"><a href="rating.php">Rating</a></li>
							<li class="menu-item"><a href="logout.php">Logout</a></li>
							<!-- <li class="menu-item"><a href="contact.php">Contact</a></li> -->
						</ul>
					</nav>
					<nav class="mobile-navigation"></nav>
				</div>
			</header> <!-- .site-header -->