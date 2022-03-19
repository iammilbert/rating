<!DOCTYPE html>
<html> 
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>GoodWEB Solutions - Responsive HTML5 Landing Page Template</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>

<style type="text/css">
    table,th,td{
        border:2px solid black;
        background-color: lightgreen;

    }

</style>

<body>


    <!-- LOADER --> <!-- loader before any page opens -->
    <div id="preloader">
        <div class="loader">
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__ball"></div>
        </div>
    </div><!-- end loader -->
    <!-- END LOADER -->

    
    <header class="header header_style_01" style="background-color: darkgreen">
        <nav class="megamenu navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                  
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="active" href="index.php">Home</a></li>
                        <li><a href="about-us.html">Logout</a></li>
                        <li><a href="registered_lecturers.php">Registered Lecturers</a></li>
                        <li><a href="registered_students.php">Registered Students</a></li>
                        <li><a href="view_complain.php">Complains</a></li>
                        <li><a href="contact.html">My Profile</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

<div class="container-fluid" style="padding-top: 20px;">
    <p style="font-size: 20px; text-align: center"><b><u>APPRAISAL RESULT</u></b></p>

    <div class="col-md-3">
        
    </div>

    <div class="col-md-6">
        <table class="table">
            <tr>
                <td><b>MANAGEMENT</b></td>
                <td><b>RATING</b></td>
            </tr>

            <tr>
                 <td><b>PUNTUALITY</b></td>
            </tr>

            <tr>
                <td><b>INSTRUCTION/CURRICULUM</b></td>
            </tr>

            <tr>
                 <td><b>MOTIVATION</b></td>
                <td><b>SUM(Rating)</b></td>
            </tr>
        </table>
    </div>

    <div class="col-md-3">
        
    </div>
</div>






<a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
    <script src="js/portfolio.js"></script>
    <script src="js/hoverdir.js"></script> 

   

</body>
<?php include ('footer.php'); ?>
</html>