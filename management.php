
<style type="text/css">
form{
    color: black;
}

</style>


<?php 

if (isset($_POST['mgt_submit'])) {

     $staff_id = $_GET['id'];

     $student_id = $_POST['student_id'];
            $check_duplicate_mgt = "SELECT student_id AND staff_id FROM mgt_answer WHERE student_id = '".$student_id."' AND staff_id = '".$staff_id."'";

            $query_mgt = mysqli_query($conn, $check_duplicate_mgt) or die(mysqli_error($conn));
            $mgt_count = mysqli_num_rows($query_mgt);
            if ($mgt_count > 0) {
                array_push($errors, "management answer already submitted, Please move to the next category");
            }


     $question1_choice = $_POST['question1_choice'];
     $question2_choice = $_POST['question2_choice'];
     $question3_choice = $_POST['question3_choice'];
     $question4_choice = $_POST['question4_choice'];

if (count($errors)==0) {

    $sql = "INSERT INTO mgt_answer(student_id, staff_id, question1_choice, question2_choice, question3_choice, question4_choice) VALUES('".$student_id."', '".$staff_id."', '".$question1_choice."', '".$question2_choice."', '".$question3_choice."', '".$question4_choice."')";
    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

  
    $_SESSION['message'] = "Record has been Sucessfully Submitted!" ;
    $_SESSION['msg_type'] = "danger";
         
     } 
    }
?>    
   

<div class="container-fluid" style="padding-bottom: 30px; font-family: time new roman; padding-top: 20px">
    <div class="row">
        <div class="col-md-10">
         <form method="POST" style="text-align: justify; border-right: dashed;">
            <input type="hidden" name="student_id" value="<?php echo $_SESSION['id']; ?>">
            
            <label style="font-size: 20px; color: red"><u>MANAGEMENT</u></label>
            
                <b><?php include ('signup_error.php'); ?></b>  

            <?php
                 if (isset($_SESSION['message'])): ?> 
                <div style="font-size: 20px;" class="aler alert-<?=$_SESSION['msg_type']?>" >

                <?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>

                    </div>
                    
                <?php endif ?>

            <div class="form-group">
                 <?php
                
                    $sql = "SELECT * FROM mgt_questions WHERE id = 1";
                    $query = mysqli_query($conn, $sql);
                ?>

                <?php while($row=mysqli_fetch_assoc($query)): ?>
                <label style="font-size: 17px"><?php echo $row['questions']; ?></label>
                <?php endwhile; ?><br>
                <input type="radio" name="question1_choice"  value="100" required="question1_choice">  Strongly Agree
                <input type="radio" name="question1_choice"  value="70" required="question1_choice">  Agree
                <input type="radio" name="question1_choice"  value="45" required="question1_choice">  Somewhat Disagree
                <input type="radio" name="question1_choice"  value="60" required="question1_choice">  Somewhat Agree
                <input type="radio" name="question1_choice"  value="0" required="question1_choice">  Strongly Disagree
                <input type="radio" name="question1_choice"  value="10" required="question1_choice">  Disagree
            </div>

<hr>
            <div class="form-group">
                 <?php
                
                    $sql = "SELECT * FROM mgt_questions WHERE id = 2";
                    $query = mysqli_query($conn, $sql);
                ?>

                 <?php while($row=mysqli_fetch_assoc($query)): ?>
               <label style="font-size: 17px"><?php echo $row['questions']; ?></label>
                <?php endwhile; ?><br>
                <input type="radio" name="question2_choice"  value="100" required="question2_choice"> Strong Agree
                <input type="radio" name="question2_choice"  value="70" required="question2_choice"> Agree
                <input type="radio" name="question2_choice"  value="45" required="question2_choice"> Somewhat Disagree
                <input type="radio" name="question2_choice"  value="60" required="question2_choice"> Somewhat Agree
                <input type="radio" name="question2_choice"  value="0" required="question2_choice"> Strongly Disagree
                <input type="radio" name="question2_choice"  value="10" required="question2_choice"> Disagree
            </div>

<hr>
            <div class="form-group">
                 <?php
                
                    $sql = "SELECT * FROM mgt_questions WHERE id = 3";
                    $query = mysqli_query($conn, $sql);
                ?>

                <?php while($row=mysqli_fetch_assoc($query)): ?>
                  <label style="font-size: 17px"><?php echo $row['questions']; ?></label>
                <?php endwhile; ?><br>
                <input type="radio" name="question3_choice"  value="100" required="question3_choice"> Strong Agree
                <input type="radio" name="question3_choice"  value="70" required="question3_choice"> Agree
                <input type="radio" name="question3_choice"  value="45" required="question3_choice"> Somewhat Disagree
                <input type="radio" name="question3_choice"  value="60" required="question3_choice"> Somewhat Agree
                <input type="radio" name="question3_choice"  value="0" required="question3_choice"> Strongly Disagree
                <input type="radio" name="question3_choice"  value="10" required="question3_choice"> Disagree
            </div>
<hr>

            <div class="form-group">
                 <?php
                
                    $sql = "SELECT * FROM mgt_questions WHERE id = 4";
                    $query = mysqli_query($conn, $sql);
                ?>

                 <?php while($row=mysqli_fetch_assoc($query)): ?>
                  <label style="font-size: 17px"><?php echo $row['questions']; ?></label>
                <?php endwhile; ?><br>
                <input type="radio" name="question4_choice"  value="100" required="question4_choice"> Strong Agree
                <input type="radio" name="question4_choice"  value="70" required="question4_choice"> Agree
                <input type="radio" name="question4_choice"  value="45" required="question4_choice"> Somewhat Disagree
                <input type="radio" name="question4_choice"  value="60" required="question4_choice"> Somewhat Agree
                <input type="radio" name="question4_choice"  value="0" required="question4_choice"> Strongly Disagree
                <input type="radio" name="question4_choice"  value="10" required="question4_choice"> Disagree
            </div>


            <div style="padding-bottom: 20px; padding-top: 20px">
                <input type="submit" name="mgt_submit" value="Submit" class="btn btn-primary" style="background-color: darkorange; border-color: darkorange; font-size: 17px">

               
                <a href="listed_lecturers.php?id=<?php echo $_GET['id']; ?>" class="btn btn-primary" style="background-color: darkorange; border-color: darkorange; font-size: 17px">Back</a> 

                <a href="view_questionaire_motivation.php?id=<?php echo $_GET['id']; ?>" class="btn btn-primary" style="background-color: darkorange; border-color: darkorange; font-size: 17px">Next Category</a>   
            </div>
                    
        </form>
        </div>

        <div class="col-md-2" style="color: black">
           <h3 style="color: red"><b>Instruction</b><b style="color: red">*</b></h3>
            <p style="font-family: Monotype Corsiva; font-size: 18px; color: black; text-align: justify;"> Please ensure you have answer all categories of questions provided before login out. Thanks!</p>
            
        </div>
    </div>
</div>


</body>
</html>