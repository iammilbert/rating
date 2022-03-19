<?php
session_start();

ob_start();
?>
<?php include ('header2.php');?>

   
   <?php      
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM student_signup WHERE student_signup.id='".$id."'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($query);
    
?>
   
    <div class="slide bs-slider box-slider" style="height: 530px">
            <div class="carousel-item active">
                <div id="home" class="first-section">
                    <div class="dtab">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 text-center">
                                    <div class="big-tagline">
                                        <h2 data-animation="animated zoomInRight" style="font-size: 60px; font-family: Gebriola"><strong>Welcome,</strong><b style="text-transform: lowercase;"> </b><?php echo $row['firstName']; ?> <strong><?php echo $row['lastName']; ?></strong></h2>
                                        <p class="lead" data-animation="animated fadeInLeft">Please ensure that all the information that would be provided by you are corect, to<br> enable us process a genue result. </p>
                                            <a href="student_logout.php" class="hover-btn-new"><span>Logout</span></a>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="listed_lecturers.php" class="hover-btn-new"><span>Proceed to Listed Lecturers</span></a>
                                    </div>
                                </div>
                            </div><!-- end row -->            
                        </div><!-- end container -->
                    </div>
                </div><!-- end section -->
            </div>
        </div>


  
    <?php include 'footer.php' ?>    

    </body>
</html>