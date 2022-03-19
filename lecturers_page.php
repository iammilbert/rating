<?php
session_start();

ob_start();
?>
<?php include ('lecturers_header.php');?>

    <?php 
      
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM lecturers_data 

            INNER JOIN faculties
            ON lecturers_data.faculty_id = faculties.id

            INNER JOIN departments
            ON lecturers_data.department_id = departments.id

            WHERE lecturers_data.id='".$id."'";
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
                                        <h2 data-animation="animated zoomInRight" style="font-size: 60px; font-family: Gebriola"><strong>Welcome,</strong><b style="text-transform: lowercase;"> </b><?php echo $row['title']; ?>. <?php echo $row['firstName']; ?> <strong><?php echo $row['lastName']; ?></strong></h2>
                                        <p class="lead" data-animation="animated fadeInLeft">Please kindly click on the check result button below to check your<br> peroformance appraisal result. </p>
                                            <a href="student_logout.php" class="hover-btn-new"><span>Logout</span></a>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="view_performance.php" class="hover-btn-new"><span>Check Result</span></a>
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