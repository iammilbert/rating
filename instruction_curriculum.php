<style type="text/css">
form{
    color: black;
}

</style>
<?php 
if (isset($_POST['submit'])) {

     $staff_id = $_GET['id'];
     $student_id = $_POST['student_id'];
             $check_duplicate_instruction = "SELECT student_id AND staff_id FROM instruction_curriculum_answer WHERE student_id = '".$student_id."' AND staff_id = '".$staff_id."'";

            $query_instruction = mysqli_query($conn, $check_duplicate_instruction) or die(mysqli_error($conn));
            $instruction_count = mysqli_num_rows($query_instruction);
            if ($instruction_count > 0) {
                array_push($errors, "Instruction/curriculum answer already submitted, Please move to the next question type!");
            }


     $question1_choice = $_POST['question1_choice'];
     $question2_choice = $_POST['question2_choice'];
     $question3_choice = $_POST['question3_choice'];
     $question4_choice = $_POST['question4_choice'];
     $question5_choice = $_POST['question5_choice'];
     $question6_choice = $_POST['question6_choice'];
     $question7_choice = $_POST['question7_choice'];
     $question8_choice = $_POST['question8_choice'];

if (count($errors)==0) {
    $sql = "INSERT INTO instruction_curriculum_answer(student_id, staff_id, question1_choice, question2_choice, question3_choice, question4_choice, question5_choice, question6_choice, question7_choice, question8_choice) VALUES('".$student_id."', '".$staff_id."', '".$question1_choice."', '".$question2_choice."', '".$question3_choice."', '".$question4_choice."', '".$question5_choice."', '".$question6_choice."', '".$question7_choice."', '".$question8_choice."')";
    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $_SESSION['message'] = "Record has been Sucessfully Submitted!";
    $_SESSION['msg_type'] = "danger";
         
     } 
 }
?>  


<div class="container-fluid" style="padding-bottom: 30px; font-family: time new roman;">
    <div class="row">
        <div class="col-md-10">
         <form method="POST" style="text-align: justify; border-right: dashed;">
           <input type="hidden" name="student_id" value="<?php echo $_SESSION['id']; ?>">

            <label style="font-size: 20px; color: red"><u>INSTRUCTION/CURRICULUM</u></label>
             <div class="text-left" style="padding-bottom: 20px">
            
                <b><?php include ('signup_error.php'); ?></b>
            </div>

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
                
                    $sql = "SELECT * FROM instruction_curriculum_questions WHERE id = 1";
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
                
                    $sql = "SELECT * FROM instruction_curriculum_questions WHERE id = 2";
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
                
                    $sql = "SELECT * FROM instruction_curriculum_questions WHERE id = 3";
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
                
                    $sql = "SELECT * FROM instruction_curriculum_questions WHERE id = 4";
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

<hr>
             <div class="form-group">
                 <?php
                
                    $sql = "SELECT * FROM instruction_curriculum_questions WHERE id = 5";
                    $query = mysqli_query($conn, $sql);
                ?>

                 <?php while($row=mysqli_fetch_assoc($query)): ?>
                  <label style="font-size: 17px"><?php echo $row['questions']; ?></label>
                <?php endwhile; ?><br>
                <input type="radio" name="question5_choice"  value="100" required="question5_choice"> Strong Agree
                <input type="radio" name="question5_choice"  value="70" required="question5_choice"> Agree
                <input type="radio" name="question5_choice"  value="45" required="question5_choice"> Somewhat Disagree
                <input type="radio" name="question5_choice"  value="60" required="question5_choice"> Somewhat Agree
                <input type="radio" name="question5_choice"  value="0" required="question5_choice"> Strongly Disagree
                <input type="radio" name="question5_choice"  value="10" required="question5_choice"> Disagree
            </div>


             <div class="form-group">
                 <?php
                
                    $sql = "SELECT * FROM instruction_curriculum_questions WHERE id = 6";
                    $query = mysqli_query($conn, $sql);
                ?>

                 <?php while($row=mysqli_fetch_assoc($query)): ?>
                  <label style="font-size: 17px"><?php echo $row['questions']; ?></label>
                <?php endwhile; ?><br>
                <input type="radio" name="question6_choice"  value="100" required="question6_choice"> Strong Agree
                <input type="radio" name="question6_choice"  value="70" required="question6_choice"> Agree
                <input type="radio" name="question6_choice"  value="45" required="question6_choice"> Somewhat Disagree
                <input type="radio" name="question6_choice"  value="60" required="question6_choice"> Somewhat Agree
                <input type="radio" name="question6_choice"  value="0" required="question6_choice"> Strongly Disagree
                <input type="radio" name="question6_choice"  value="10" required="question6_choice"> Disagree
            </div>

<hr>
             <div class="form-group">
                 <?php
                
                    $sql = "SELECT * FROM instruction_curriculum_questions WHERE id = 7";
                    $query = mysqli_query($conn, $sql);
                ?>

                 <?php while($row=mysqli_fetch_assoc($query)): ?>
                  <label style="font-size: 17px"><?php echo $row['questions']; ?></label>
                <?php endwhile; ?><br>
                <input type="radio" name="question7_choice"  value="100" required="question7_choice"> Strong Agree
                <input type="radio" name="question7_choice"  value="70" required="question7_choice"> Agree
                <input type="radio" name="question7_choice"  value="45" required="question7_choice"> Somewhat Disagree
                <input type="radio" name="question7_choice"  value="60" required="question7_choice"> Somewhat Agree
                <input type="radio" name="question7_choice"  value="0" required="question7_choice"> Strongly Disagree
                <input type="radio" name="question7_choice"  value="10" required="question7_choice"> Disagree
            </div>
<hr>

             <div class="form-group">
                 <?php
                
                    $sql = "SELECT * FROM instruction_curriculum_questions WHERE id = 8";
                    $query = mysqli_query($conn, $sql);
                ?>

                 <?php while($row=mysqli_fetch_assoc($query)): ?>
                  <label style="font-size: 17px"><?php echo $row['questions']; ?></label>
                <?php endwhile; ?><br>
                <input type="radio" name="question8_choice"  value="100" required="question8_choice"> Strong Agree
                <input type="radio" name="question8_choice"  value="70" required="question8_choice"> Agree
                <input type="radio" name="question8_choice"  value="45" required="question8_choice"> Somewhat Disagree
                <input type="radio" name="question8_choice"  value="60" required="question8_choice"> Somewhat Agree
                <input type="radio" name="question8_choice"  value="0" required="question8_choice"> Strongly Disagree
                <input type="radio" name="question8_choice"  value="10" required="question8_choice"> Disagree
            </div>


            <div style="padding-bottom: 20px; padding-top: 20px">
                <input type="submit" name="submit" value="Submit" class="btn btn-primary" style="background-color: darkorange; border-color: darkorange; font-size: 17px">

               
                <a href="view_questionaire_motivation.php?id=<?php echo $_GET['id']; ?>" class="btn btn-primary" style="background-color: darkorange; border-color: darkorange; font-size: 17px">Back</a> 

                <a href="view_questionaire_puntuality.php?id=<?php echo $_GET['id']; ?>" class="btn btn-primary" style="background-color: darkorange; border-color: darkorange; font-size: 17px">Next category</a>
            </div>

        </form>
        </div>

        <div class="col-md-2" style="color: black">
           <h3 style="color: red"><b>Instruction</b><b style="color: red">*</b></h3>
<p style="font-family: Monotype Corsiva; font-size: 18px; color: black; text-align: justify;"> Please ensure you have answer all categories of questions provided before login out. Thanks!</p>
            
        </div>
    </div>
</div>
 <!-- End of INstruction/curriculum -->