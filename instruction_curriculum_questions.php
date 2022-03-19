<?php 
    session_start();

    ob_start();
?>

<?php include ('admin_header.php'); ?>
   



<?php
include ('db_connect.php');

  if(isset($_POST['submit'])){

    $instruction = $_POST['questions'];

    $sql = "INSERT INTO instruction_curriculum_questions(questions) VALUES('".$instruction."')";

    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

  }

?>


<style type="text/css">
  form{
    color: white;
    font-size: 25px;
  }
  .form-group .form-control{
    color: black;
    font-size: 20px;
  }
</style>

<div data-stellar-background-ratio="0.9" style="background-image:url('uploads/parallax_04.jpg');" >
  <div class="container-fluid" style="padding-top: 150px; padding-bottom: 150px">
    <div class="col-md-6 col-md-offset-3">
        <form class="form" method="POST">
            <div class="form-group">
                 <label>Question (Instruction/Curriculum)</label>
                 <textarea name="questions" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" value="Submit" class="btn btn-light btn-radius btn-brd">

                <a href="questions.php" name="back" class="btn btn-light btn-radius btn-brd">Back</a>
                
            </div>
        </form>
    </div>
  </div>
</div>


        

<?php include 'footer.php' ?>
</body>
</html>
