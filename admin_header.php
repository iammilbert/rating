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
                        <li class="nav-item active"><a class="nav-link" href="admin_page.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="student_logout.php">Logout</a></li>
                        <li class="nav-item"><a class="nav-link" href="registered_lecturers.php">Registered Lecturers</a></li>
                         <li class="nav-item"><a class="nav-link" href="registered_students.php">Registered Students</a></li>
                          <li class="nav-item"><a class="nav-link" href="admin_profile.php">My Profile</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->








      
</body>
</html>