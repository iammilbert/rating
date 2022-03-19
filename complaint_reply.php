<?php 
    session_start();

    ob_start();
?>

<?php include ('admin_header.php');
    
      include('db_connect.php');
?>


<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';

	$sql1 = "SELECT student_complain.student_sid, student_complain.course_title, student_complain.course_code, student_complain.complain_details, student_signup.matric_Number FROM student_complain 
            INNER JOIN student_signup
            ON student_signup.id = student_complain.student_sid

    WHERE student_complain.student_sid ='".$id."'";
    $query1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
    $row1 = mysqli_fetch_assoc($query1);




?>

<?php

        if (isset($_POST['confirm'])) {
            $student_sid = $_GET['student_sid'];
            $course_title = $_POST['course_title'];
            $course_code = $_POST['course_code'];
            $complain_details = $_POST['complain_details'];
            $reply_complain = $_POST['reply_complain'];

            $sql = "INSERT INTO student_complain_reply(student_sid, course_title, course_code, complain_details, reply_complain) VALUES('".$student_sid."', '".$course_title."', '".$course_code."', '".$complain_details."', '".$reply_complain."')" or die(mysqli_error($conn));

            $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

             $_SESSION['message'] = "Replied successful!" ;
            $_SESSION['msg_type'] = "danger";
        
    }


?>







<style type="text/css">
    .form-group label{
        color: black;
    }

    .form-group .form-control option{
        color: black;
    }

    .form-group .form-control{
        color: black;
        border-color : orange;
    }




</style>

<div id="contact" class="container-fluid wb" style="padding-top: 10px">
    <div class="section-title text-center">
        
    </div>
    <div class="col-md-8 col-md-offset-2">
        <div class="contact_form">
            <input type="text" name="student_sid" value="<?php echo $row1['student_sid']; ?>">
            <form class="form">
                <p class="lead" style="color: black">Replying complain....</p>


                 <?php
                 if (isset($_SESSION['message'])): ?> 
                <div style="font-size: 20px;" class="aler alert-<?=$_SESSION['msg_type']?>" >
                <?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>

                <a href="index.php" style="color: darkgreen;">Login here</a>
                    </div>
                    
                <?php endif ?>

        <div class="form-group">
            <label>Student Matric. Number:</label>
            <input type="text" class="form-control" name="matric_Number" value="<?php echo $row1['matric_Number']; ?>">
        </div>

        <div class="form-group">
            <label>Course Title</label>
            <input type="text" class="form-control" name="course_title" value="<?php echo $row1['course_title']; ?>">
        </div>

        <div class="form-group">
            <label>Course code</label>
            <input type="text" class="form-control" name="course_code" value="<?php echo $row1['course_code']; ?>">
        </div>

        <div class="form-group">
            <label style="font-size: 17px; color: black">Student Complain:</label>
            <textarea name="complain_details" rows="6" class="form-control" style="color: black; border-color: darkorange"><?php echo $row1['complain_details']; ?></textarea>
        </div>
        <div class="form-group">
            <label style="color: black; font-size: 17px">Comment</label>
            <textarea name="reply_complain" rows="6" class="form-control" style="color: black; border-color: darkorange" name="reply_complain"></textarea>
        </div>

        <div>
                        <input type="submit" name="confirm" value="Reply" class="btn btn-light btn-radius grd1 btn-block btn-brd">
        </div>


    </form>
</div>
</div>
</div>



 <?php include 'footer.php' ?>   

</body>
</html>