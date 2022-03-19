<?php 
    session_start();
    ob_start();

include ('general_admin_header.php'); 

 
?>


<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
	include('db_connect.php');
		$sql = "SELECT * FROM admin 

			INNER JOIN schools
				ON admin.school_id = schools.id 
		WHERE admin.id = '".$id."'";

		$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		 $row = mysqli_fetch_assoc($query);


		if (isset($_POST['update'])) {
				$firstName = $_POST['firstName'];
				$lastName = $_POST['lastName'];
				$middleName = $_POST['middleName'];
				$gender = $_POST['gender'];
				$school_id = $_POST['school_id'];
				$mobile = $_POST['mobile'];
				$email = $_POST['email'];
				

		
$sql = "UPDATE admin SET firstName = '".$firstName."', lastName = '".$lastName."', middleName = '".$middleName."', gender = '".$gender."', school_id = '".$school_id."', mobile = '".$mobile."', email = '".$email."' WHERE id = '".$id."'";

			$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
			
			$_SESSION['message'] = "Record has been updated!";
            $_SESSION['msg_type'] = "warning";

            header('location: schools_admin.php');
	}

	?>

<style type="text/css">
	form{	
		color: black;
	}

	.form-group .form-control{	
		color: black;
		border-color: orange;
	}

</style>

<div class="banner-area banner-bg-1">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="banner">
						<h2>My Profile</h2>
						<ul class="page-title-link">
							<li><a href="student_page.php">Home</a></li>
							<li><a href="student_logout.php">Logout</a></li>
							<li><a href="#">Change Password</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

    <div id="contact" class="section wb">
    	<div class="section-title text-center">
        		<h3><b>Edit and Submit</b></h3>

        			<?php
           		 if (isset($_SESSION['message'])): ?> 
              	<div style="font-size: 20px;" class="aler alert-<?=$_SESSION['msg_type']?>" >

		        <?php 
		            echo $_SESSION['message'];
		            unset($_SESSION['message']);
		        ?>
		            </div>
		            
		        <?php endif ?>
    		</div>
        <div class="col-md-8 col-md-offset-2"  style="background-color: darkgrey">
           <div class="contact_form">
	<form class="form" method="POST" ">
		<div class="row">
			<div>
				<fieldset">


					<div class="form-group">
						<label>First Name<b style="color: red;">*</b></label>
						<input type="text" name="firstName" class="form-control" style="border-width: 2px;" value="<?php echo $row['firstName']; ?>">
					</div>

					<div class="form-group">
						<label>Last Name<b style="color: red;">*</b></label>
						<input type="text" name="lastName" class="form-control" style="border-width: 2px;" value="<?php echo $row['lastName']; ?>">
					</div>

					<div class="form-group">
						<label>Middle Name</label>
						<input type="text" name="middleName" class="form-control" style="border-width: 2px;" value="<?php echo $row['middleName']; ?>">
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
						<label>Institution<b style="color: red;">*</b></label>
						<select class="form-control" name="school_id">
								<option value="<?php echo $row['school_id']; ?>"><?php echo $row['schoolNames']; ?></option>
					<?php 
							$sql2 = "SELECT * FROM schools";
						$query2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));

						?>
							
								<?php while($row2 = mysqli_fetch_assoc($query2)): ?>
								<option><?php echo $row2['schoolNames']; ?></option>
							<?php endwhile; ?>
							</select>
					</div>

					<div class="form-group">
						<label>Mobile<b style="color: red;">*</b></label>
						<input type="mobile" name="mobile" class="form-control" value="<?php echo $row['mobile']; ?>">
					</div>


				

					<div class="form-group">
						<label>Email<b style="color: red;">*</b></label>
						<input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>">
					</div>


					


					<div>
						
						<input type="submit" name="update" value="Update" class="btn btn-light btn-radius grd1 btn-block btn-brd">
						
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