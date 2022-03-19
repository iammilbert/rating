<?php 
session_start();

ob_start();

?>

<style type="text/css">
	form{
		color: black;
		font-size: 13px;
	}
	.form-group option{
		color: black;
		font-size: 14px;

	}

	.form-group .form-control option{
		color: black;

</style>

<?php include ('header2.php'); ?>

  <?php 
include 'db_connect.php';
		
		$id = $_SESSION['id'];
		$sql = "SELECT * FROM student_signup
				INNER JOIN schools
				ON student_signup.school_id = schools.id

				INNER JOIN departments
				ON student_signup.department_id = departments.id

				WHERE student_signup.id = '".$id."'";
		$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		 $row2 = mysqli_fetch_assoc($query)


?> 
    

<?php 
if (isset($_POST['confirm'])) {

     		$student_sid = $_POST['student_sid'];
            $complain_type = $_POST['complain_type'];
            $lecturer_Name = $_POST['lecturer_Name'];
            $lecturer_department = $_POST['lecturer_department'];
            $course_title = $_POST['course_title'];
            $course_code = $_POST['course_code'];
            $complain_details = $_POST['complain_details'];
            

            $sql = "INSERT INTO student_complain(student_sid, complain_type, lecturer_Name, lecturer_department, course_title, course_code, complain_details) VALUES('".$student_sid ."', '".$complain_type."', '".$lecturer_Name."', '".$lecturer_department."', '".$course_title."', '".$course_code."', '".$complain_details."')";

            $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
           
            if($query){

            $_SESSION['message'] = "Your complain has been Sucessfully Submitted, we shall get back to you!" ;
            $_SESSION['msg_type'] = "danger";
    }
}

    ?>
    <div class="banner-area banner-bg-1">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="banner">
						<h2>Complain</h2>
						<ul class="page-title-link">
							<li><a href="index.php">Home</a></li>
							<li><a href="student_logout.php">Logout</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

    <div id="contact" class="section">
            <div class="section-title text-center">
                <h3>Get in touch</h3>
            </div>
                <div class="col-md-8 col-md-offset-2"  style="background-color: darkgrey">
                    <div class="contact_form">

	<form method="POST" class="form">
		<div class="row">
			<input type="hidden" name="student_sid" value="<?php echo $row2['id']; ?>">
			<input type="hidden" name="department_id" value="<?php echo $row2['department_id']; ?>">
			<input type="hidden" name="school_id" value="<?php echo $row2['school_id']; ?>">
			
			<div>
				<fieldset">
					<legend style="color: green;"><h2><b>Complaint Form</b></h2></legend>

                 <?php
                 if (isset($_SESSION['message'])): ?> 
                <div style="font-size: 20px;" class="aler alert-<?=$_SESSION['msg_type']?>" >
                <?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>

                <a href="student_page.php" style="color: darkgreen;">Go Back</a>
                    </div>
                   
                <?php endif ?>

					<div class="form-group">
						<label>Complaint type<b style="color: red;">*</b></label>
						<select style="color: black;  border-color: orange" name="complain_type" class="form-control">
							<option value="">-select complain type</option>
							<option>Lecturer Complain</option>
							<option>Result Complain</option>
							<option>C.A Complain</option>
							<option>Other</option>
						</select>
					</div>

					<div class="form-group">
					<label>Lecturer Name<b style="color: red;">*</b></label> 
                   
                   
                    <?php  
                        $sql = "SELECT CONCAT(UCASE(firstName), ' ', UCASE(lastName), ' ', UCASE(middleName)) AS name FROM lecturers_data

								WHERE lecturers_data.school_id = '".$row2['school_id']."' AND lecturers_data.department_id = '".$row2['department_id']."'";

                    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                     
                     ?>  
                     <select style="color: black; border-color: orange" name="lecturer_Name" class="form-control">
                     	 
                        <option value="">-select lecturers Name-</option>
                        <option value="NILL">Not Specified</option>
                        <?php while($row = mysqli_fetch_assoc($query)): ?>
                        <option><?php echo $row['name']; ?></option>
                        <?php endwhile; ?>
                     </select>
                    </div>

                 <div class="form-group">
					<label>Lecturer's Department<b style="color: red;">*</b></label>
                     <?php  
                        $sql = "SELECT * FROM departments";

                    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                     
                     ?>  
                     <select style="color: black; border-color: orange" name="lecturer_department" class="form-control">
                     	 
                        <option value="">-select lecturers Department-</option>
                        <option value="NILL">Not Specified</option>
                        <?php while($row = mysqli_fetch_assoc($query)): ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['departments']; ?></option>
                        <?php endwhile; ?>
                     </select>
                 </div>


                     <div class="form-group">

						<label>Course Title (if any)</label>
						<input type="text" name="course_title" class="form-control" style="border-color: orange; color: black">
					</div>


					<div class="form-group">
						<label>Course code (if any)</label>
						<input style="color: black; border-color: orange" type="text" name="course_code" class="form-control"" placeholder="-enter course code-">
					</div>

					<div class="form-group">
						 <label>Complain Details:<b style="color: red;">*</b></label>
   						 <textarea  style="color: black; border-color: orange" class="form-control" name="complain_details"></textarea>
					</div>


					<div class="form-group">
						<input type="submit" name="confirm" value="Submit Complain" class="btn btn-light btn-radius grd1 btn-block">
					</div>

				</fieldset>
			</div>
				
		</div>
	</form>

</div>
</div>
</div>


 

    <?php include 'footer.php' ?> 

</body>
</html>
