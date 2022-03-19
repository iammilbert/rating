<?php 
    session_start();
    ob_start();
?>

<?php include ('admin_header.php'); ?>

<style type="text/css">
   
    .form-group label{
		color: white;
	}

	.form-group .form-control option{
		color: black;
	}

	.form-group .form-control{
		color: black;
		border-color : orange;
	}

</style>

<body>

    

<?php
$errors = array();

	$sql1 = "SELECT * FROM lecturers_data";

		    $query1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
		    $row1 = mysqli_fetch_assoc($query1);

if (isset($_POST['confirm'])) {
			$title = $_POST['title'];
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			$middleName = $_POST['middleName'];
			$gender = $_POST['gender'];
			$faculty_id = $_POST['faculty_id'];
			$department_id = $_POST['department_id'];

		
			$staff_id = $_POST['staff_id'];
			$check_duplicate_staff_id = "SELECT staff_id FROM lecturers_data WHERE staff_id = '".$staff_id."'";
			$query_staff_id = mysqli_query($conn, $check_duplicate_staff_id) or die(mysqli_error($conn));
			$staff_id_count = mysqli_num_rows($query_staff_id);
			if ($staff_id_count > 0) {
				array_push($errors, "Registration number already exist, please use another Registration number");
			}


				$mobile = $_POST['mobile'];
			$check_duplicate_mobile = "SELECT mobile FROM lecturers_data WHERE mobile = '".$mobile."'";
			$query_mobile = mysqli_query($conn, $check_duplicate_mobile) or die(mysqli_error($conn));
			$mobile_count = mysqli_num_rows($query_mobile);
			if ($mobile_count > 0) {
				array_push($errors, "Mobile number already taken, Please use another another number");
		
			}

			$password = $_POST['password'];

			
if (count($errors)==0) {
			$sql = "INSERT INTO lecturers_data(title, firstName, lastName, middleName, gender, faculty_id, department_id, staff_id, mobile, password) VALUES('".$title."', '".$firstName."', '".$lastName."', '".$middleName."', '".$gender."', '".$faculty_id."', '".$department_id."', '".$staff_id."', '".$mobile."', '".$password."')";

			$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

			$_SESSION['message'] = "Record has been Sucessfully Submitted!";
            $_SESSION['msg_type'] = "danger";

		}
	}

	?>

<div class="container-fluid wb" style="padding-bottom: 20px">
  			<div class="section-title text-center">
        		<h3><b>Adding Lecturer(s) to the Appraisal List</b></h3>
        		<p class="lead">Please fill out the form below.</p>
            
    		</div>
    <div class="row">

    	<div class="col-md-2">
    		
    	</div>
 <div class="col-md-8" id="contact" >
  <div class="contact_form">
	<form class="form" name="contactform" method="post">
						<?php
           		 			if (isset($_SESSION['message'])): ?> 
              		<div style="font-size: 20px;" class="aler alert-<?=$_SESSION['msg_type']?>" >

		        		<?php 
		           		 echo $_SESSION['message'];
		            	unset($_SESSION['message']);

		       			 ?>
		       			  <a href="admin_page.php">Home</a>
		           </div>
		            
		        <?php endif ?>

				<fieldset">
				<b><?php include ('signup_error.php'); ?></b>
					<div class="form-group">
						<label>Title<b style="color: red;">*</b></label>
						<select class="form-control" name="title" required="title">
						<option> -select title-</option>
								<option>Mr.</option>
								<option>Mrs</option>
								<option>Miss</option>
								<option>Dr.</option>
								<option>Prof.</option>
							</select>
					</div>


					<div class="form-group">
						<label>First Name<b style="color: red;">*</b></label>
						<input type="text" name="firstName" class="form-control" required="firstName" style="border-width: 2px;">
					</div>

					<div class="form-group">
						<label>Last Name<b style="color: red;">*</b></label>
						<input type="text" name="lastName" class="form-control" required="lastName">
					</div>

					<div class="form-group">
						<label>Middle Name</label>
						<input type="text" name="middleName" class="form-control" required="middleName">
					</div>

						<div class="form-group">
						<label>Gender<b style="color: red;">*</b></label>
							<select class="form-control" name="gender" required="gender">
						<option value=""> -select gender-</option>
								<option>Male</option>
								<option>Female</option>
							</select>
					</div>


					<div class="form-group">

						<?php 
							$sql = "SELECT * FROM faculties";
							$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
						?>
						<label>Faculty<b style="color: red;">*</b></label>
							<select class="form-control" name="faculty_id" required="school_id">
								<option value=""> -select faculty-</option>
								<?php while($row = mysqli_fetch_assoc($query)): ?>
								<option value="<?php echo $row['id']; ?>"><?php echo $row['faculties']; ?></option>
							<?php endwhile; ?>
							</select>

					</div>


				<div class="form-group">

						<?php 
							$sql = "SELECT * FROM departments";
							$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
						?>
						<label>Department<b style="color: red;">*</b></label>
							<select class="form-control" name="department_id" required="department_id">
								<option value=""> -select faculty-</option>
								<?php while($row = mysqli_fetch_assoc($query)): ?>
								<option value="<?php echo $row['id']; ?>"><?php echo $row['departments']; ?></option>
							<?php endwhile; ?>
							</select>

					</div>


					<div class="form-group">
						<label>Mobile<b style="color: red;">*</b></label>
						<input type="mobile" name="mobile" class="form-control" required="mobile">
					</div>


					<div class="form-group">
						<label>Staff ID<b style="color: red;">*</b></label>
						<input type="staff_id" name="staff_id" class="form-control" required="staff_id">
					</div>

					<div class="form-group">
						<label>Password<b style="color: red;">*</b></label>
						<input type="password" name="password" class="form-control" required="password" placeholder="Default: kasu">
					</div>


					<div>
						<input type="submit" name="confirm" value="Register" class="btn btn-light btn-radius btn-brd" style="background-color: green">

					</div>
				</fieldset>
			</div>		
	  </form>
    </div>
  </div>

  		<div class="col-md-2">
    		
    	</div>
    </div>
</div>
 

    <?php include 'footer.php' ?>

</body>
</html>