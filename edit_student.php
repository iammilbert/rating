<?php 

    session_start();
    ob_start();

include ('header2.php'); 

 
?>


<?php
		$id = $_SESSION['id'];
		$sql = "SELECT student_signup.id, student_signup.firstName, student_signup.lastName, student_signup.middleName, student_signup.matric_Number, faculties.faculties, student_signup.department_id, student_signup.course_id, student_signup.faculty_id, departments.departments, student_signup.gender, courses.courses 

			FROM student_signup

				INNER JOIN faculties
				ON student_signup.faculty_id = faculties.id

				INNER JOIN departments
				ON student_signup.department_id = departments.id

				INNER JOIN courses
				ON student_signup.course_id = courses.id

				WHERE student_signup.id = '".$id."'";

		$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		 $row = mysqli_fetch_assoc($query);


	if (isset($_POST['update'])) {
				$id = $_POST['id'];
				$firstName = $_POST['firstName'];
				$lastName = $_POST['lastName'];
				$middleName = $_POST['middleName'];
				$gender = $_POST['gender'];
				$faculty_id = $_POST['faculty_id'];
				$department_id = $_POST['department_id'];
				$course_id = $_POST['course_id'];
				$matric_Number = $_POST['matric_Number'];


		
$sql = "UPDATE student_signup SET firstName = '".$firstName."', lastName = '".$lastName."', middleName = '".$middleName."', gender = '".$gender."', faculty_id = '".$faculty_id."', student_signup.department_id = '".$department_id."', course_id = '".$course_id."', matric_Number = '".$matric_Number."' WHERE id = '".$id."'";

			$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            header('location: profile.php');

	}

	?>

<style type="text/css">
	form{	
		color: white;
	}

	.form-group .form-control{	
		color: black;
		border-color: orange;
	}

</style>

    <div id="contact" class="section wb">
    		<div class="section-title text-center">
        		<h3><b>Edit and Submit</b></h3>
    		</div>
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-md-2">
    				
    			</div>
        <div class="col-md-8">
           <div class="contact_form">
				<form class="form" method="POST">
		
				<fieldset">
					<legend><h2><b style="color: green;">Profile</b></h2></legend>
					<div class="form-group">
						<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
						<label>First Name<b style="color: red;">*</b></label>
						<input type="text" name="firstName" class="form-control" value="<?php echo $row['firstName']; ?>">
					</div>

					<div class="form-group">
						<label>Last Name<b style="color: red;">*</b></label>
						<input type="text" name="lastName" class="form-control" value="<?php echo $row['lastName']; ?>" >
					</div>

					<div class="form-group">
						<label>Middle Name</label>
						<input type="text" name="middleName" class="form-control" value="<?php echo $row['middleName']; ?>">
					</div>

					<div class="form-group">
							<label>Gender<b style="color: red;">*</b></label>
							<select class="form-control" name="gender">
								<option><?php echo $row['gender']; ?></option>
								<option>Male</option>
								<option>Female</option>
							</select>
					</div>


					<div class="form-group">
						<label>Faculty<b style="color: red;">*</b></label>
						<select class="form-control" name="faculty_id">
								<option value="<?php echo $row['faculty_id']; ?>"><?php echo $row['faculties']; ?></option>
					<?php 
							$sql3 = "SELECT * FROM faculties";
							$query3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
						?>
							
								<?php while($row3 = mysqli_fetch_assoc($query3)): ?>
								<option value="<?php echo $row3['id']; ?>"><?php echo $row3['faculties']; ?></option>
							<?php endwhile; ?>
							</select>
					</div>



					<div class="form-group">
						<label>Department<b style="color: red;">*</b></label>
						<select class="form-control" name="department_id">
								<option value="<?php echo $row['department_id']; ?>"><?php echo $row['departments']; ?></option>
					<?php 
							$sql4 = "SELECT * FROM departments";
						$query4 = mysqli_query($conn, $sql4) or die(mysqli_error($conn));
						?>
							
								<?php while($row4 = mysqli_fetch_assoc($query4)): ?>
								<option value="<?php echo $row4['id']; ?>"><?php echo $row4['departments']; ?></option>
							<?php endwhile; ?>
							</select>
					</div>


					
					<div class="form-group">
						<label>Course of Study<b style="color: red;">*</b></label>
						<select class="form-control" name="course_id">
								<option value="<?php echo $row['course_id']; ?>"><?php echo $row['courses']; ?></option>
					<?php 
							$sql5 = "SELECT * FROM courses";
						$query5 = mysqli_query($conn, $sql5) or die(mysqli_error($conn));
						?>
							
								<?php while($row5 = mysqli_fetch_assoc($query5)): ?>
								<option value="<?php echo $row5['id']; ?>"><?php echo $row5['courses']; ?></option>
							<?php endwhile; ?>
							</select>
					</div>



					<div class="form-group">
						<label>Matric. Number<b style="color: red;">*</b></label>
						<input type="text" name="matric_Number" class="form-control" value="<?php echo $row['matric_Number']; ?>">
					</div>

					<div>
						<input type="submit" name="update" value="Update" class="btn btn-light btn-radius btn-brd grd1 btn-block" style="background-color: darkgreen">
					</div>

				</fieldset>
	</form>
</div>
</div>
				<div class="col-md-2">
    				
    			</div>
	</div>
	</div>
	</div>


    <?php include 'footer.php' ?>
</body>
</html>