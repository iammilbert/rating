<!DOCTYPE html>
<html lang="en">
<head>
		<!-- Basic Meta -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">   

		<!-- Mobile Meta -->
		<meta name="viewpoint" content="width=device-width, initial-scale = 1">

		<!-- Site Meta -->
		<title>KASU Rating System</title>
		<meta name="keywords" content="">
    	<meta name="description" content="">
    	<meta name="author" content="">

    	<!-- Bootstrap CSS -->
    	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
    	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
    	<link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
    	<link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.min">

    	<!-- Site CSS -->
    	<link rel="stylesheet" type="text/css" href="style.css">
    	
    	   <!-- ALL VERSION CSS -->
    	<link rel="stylesheet" href="css/versions.css">
    	<link rel="stylesheet" href="css1/versions.css">

    	 <!-- Modernizer for Portfolio -->
    	<script src="js/modernizer.js"></script>

      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

</head>
<body>

	<!-- LOADER -->
	<div id="preloader">
		<div class="loader-container">
			<div class="progress-br float shadow">
				<div class="progress__item"></div>
			</div>
		</div>
	</div>
	<!-- END LOADER -->	

	<?php
		include ('db_connect.php');
	?>

	<!-- Start header -->
	<header class="top-navbar header">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="index.html" style="color: orange">
					KASU LECTURERS RATING SYSTEM
				</a>
			<div class="container-fluid">		
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
						<li class="nav-item"><a class="nav-link" href="student_signup.php">Register</a></li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Login</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="login.php">Student Login</a>
								<a class="dropdown-item" href="lecturers_login.php">Lecturers Login</a>
								<a class="dropdown-item" href="admin_login.php">Admin Login</a>
							</div>
						</li>
						
						<li class="nav-item"><a class="nav-link" href="contact.php">Contact US</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->	  
</body>
</html>