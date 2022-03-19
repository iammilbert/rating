<?php 
    session_start();

    ob_start();
?>

<?php include ('admin_header.php'); ?>
   
	<div class="container-fluid"  data-stellar-background-ratio="0.9">
        <div class="container">
            <div class="row text-center stat-wrap" style="padding-top: 200px; padding-bottom: 152px">

                <div class="col-md-4 col-sm-4 col-xs-4">
                    <a href="lecturers_data.php" class="btn btn-light btn-brd" style="background-color: darkgreen">Register <br>Lecturers</a>                
                </div><!-- end col -->
                

              <div class="col-md-4 col-sm-4 col-xs-4">
                    <a href="appraisal_summary_page.php" class="btn btn-light btn-brd" style="background-color: darkgreen">Process <br> Result</a>                 
                </div><!-- end col -->

                <div class="col-md-4 col-sm-4 col-xs-4">
                    <a href="processed_result.php" class="btn btn-light btn-brd" style="background-color: darkgreen">Processed <br>Result</a>                 
                </div><!-- end col -->          
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->




 
    <?php include 'footer.php' ?>   

</body>
</html>