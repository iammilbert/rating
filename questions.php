<?php 
    session_start();

    ob_start();
?>

<?php include ('admin_header.php'); ?>
   
 

 
   
    <?php 

            if (isset($_POST['submit'])) {

              $cat_id = $_POST['cat_id'];
              $name = $_POST['name'];
             

              $sql = "INSERT INTO questionaire(cat_id, name) VALUES('".$cat_id."', '".$name."')";

              $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            }

            ?>



    <div class="container-fluid" style="padding-top: 200px; padding-bottom: 200px">
      <div class="row">
        <div class="col-md-2">       
        </div>

                <div class="col-md-2 col-sm-6 col-xs-12">                 
                     <a href="motivation_questions.php" class="btn btn-light btn-brd" style="background-color: darkgreen">MOTIVATION <br>QUESTION</a> 
                </div><!-- end col -->

                <div class="col-md-2 col-sm-6 col-xs-12">                 
                   <a href="management_questions.php" class="btn btn-light btn-brd" style="background-color: darkgreen">MANAGEMENT <br>QUESTION</a> 
                </div><!-- end col -->

                <div class="col-md-2 col-sm-6 col-xs-12">               
                     <a href="puntuality_questions.php" class="btn btn-light btn-brd" style="background-color: darkgreen">PUNTUALITY <br>QUESTION</a> 
                </div><!-- end col -->
                
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <a href="puntuality_questions.php" class="btn btn-light btn-brd" style="background-color: darkgreen">INSTRUCTION/CURRICULUM <br>QUESTION</a> 
                </div><!-- end col -->
  
            <div class="col-md-2">
        
            </div>
</div>
</div>




     

        

<?php include 'footer.php' ?>
</body>
</html>
