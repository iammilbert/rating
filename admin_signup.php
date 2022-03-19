<?php 
    session_start();
    ob_start();
?>

<?php include ('general_admin_header.php'); ?>

<style type="text/css">
    table,th,td{
        border:2px solid black;
        background-color: lightgreen;

    }
    .form-group label{
		color: black;
	}

	.form-group .form-control option{
		color: black;
	}

	.form-group .form-control{
		color: black;
	}

</style>

<body>

    
    

   <?php include ('db_connect.php'); ?>

<?php
$errors = array();

if (isset($_POST['confirm'])) {
		
			$school_id = $_POST['school_id'];
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			$middleName = $_POST['middleName'];
			$userName = $_POST['userName'];

			$email = $_POST['email'];
			$check_duplicate_email = "SELECT email FROM admin WHERE admin.email = '".$email."'";
			$query_email = mysqli_query($conn, $check_duplicate_email) or die(mysqli_error($conn));
			$email_count = mysqli_num_rows($query_email);
			if ($email_count > 0) {
				array_push($errors, "email already taken, Please use another email");
		
			}


			$gender = $_POST['gender'];


			$mobile = $_POST['mobile'];
			$check_duplicate_mobile = "SELECT mobile FROM admin WHERE admin.mobile = '".$mobile."'";
			$query_mobile = mysqli_query($conn, $check_duplicate_mobile) or die(mysqli_error($conn));
			$mobile_count = mysqli_num_rows($query_mobile);
			if ($mobile_count > 0) {
				array_push($errors, "Mobile number already taken, Please use another another number");
		
			}



			$password = $_POST['password'];


			
if (count($errors)==0) {
			$sql = "INSERT INTO admin(school_id, firstName, lastName, middleName, userName, email, gender, mobile, password) VALUES('".$school_id."', '".$firstName."', '".$lastName."', '".$middleName."', '".$userName."', '".$email."', '".$gender."', '".$mobile."', '".$password."')";

			$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

			$_SESSION['message'] = "Record has been Sucessfully Submitted!";
            $_SESSION['msg_type'] = "danger";

		}
	}

	?>

<div id="contact" class="section wb">
  			<div class="section-title text-center">
        		<h3><b>Adding Admin(s) to Manage its Institution</b></h3>
        		<p class="lead">Please fill out the form below.</p>
            
    		</div>

 <div class="col-md-8 col-md-offset-2">
  <div class="contact_form">
	<form class="form" name="contactform" method="POST">
		<div class="row">
						<?php
           		 			if (isset($_SESSION['message'])): ?> 
              		<div style="font-size: 20px;" class="aler alert-<?=$_SESSION['msg_type']?>" >

		        		<?php 
		           		 echo $_SESSION['message'];
		            	unset($_SESSION['message']);

		       			 ?>
		       			  <a href="general_admin_page.php">Home</a>
		           </div>
		            
		        <?php endif ?>

				<fieldset">
				<b><?php include ('signup_error.php'); ?></b>
				
					<div class="form-group">
						<label>First Name<b style="color: red;">*</b></label>
						<input type="text" name="firstName" class="form-control" required="firstName" style="border-width: 2px;">
					</div>

					<div class="form-group">
						<label>Last Name<b style="color: red;">*</b></label>
						<input type="text" name="lastName" class="form-control" required="lastName" style="border-width: 2px;" >
					</div>

					<div class="form-group">
						<label>Middle Name</label>
						<input type="text" name="middleName" class="form-control" style="border-width: 2px;">
					</div>

					<div class="form-group">
						<label>UserName<b style="color: red;">*</b></label>
						<input type="text" name="userName" class="form-control" required="userName" style="border-width: 2px;">
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
						<label>Institution<b style="color: red;">*</b></label>
							<select class="form-control" name="school_id">

						<?php 
							$sql = "SELECT * FROM schools";
							$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
						?>
						
								<option value=""> -select Institution-</option>
								<?php while($row = mysqli_fetch_assoc($query)): ?>
								<option value="<?php echo $row['id']; ?>"><?php echo $row['schoolNames']; ?></option>
							<?php endwhile; ?>
							</select>

					</div>

					

					<div class="form-group">
						<label>Email<b style="color: red;">*</b></label>
						<input type="email" name="email" class="form-control" required="email">
					</div>


					<div class="form-group">
						<label>mobile<b style="color: red;">*</b></label>
						<input type="mobile" name="mobile" class="form-control" required="staff_id">
					</div>

					<div class="form-group">
						<label>Password<b style="color: red;">*</b></label>
						<input type="password" name="password" class="form-control" required="password" placeholder="Default: KASU2004">
					</div>


					<div>
						<input type="submit" name="confirm" value="Register" class="btn btn-light btn-radius btn-brd">

						<a href="general_admin_page.php" class="btn btn-light btn-radius btn-brd">Home</a>
					</div>
				</fieldset>
			</div>		
	  </form>
    </div>
  </div>
</div>
 

    <?php include 'footer.php' ?>

</body>
</html>