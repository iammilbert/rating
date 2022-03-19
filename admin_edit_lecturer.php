<?php 
    session_start();
    ob_start();


?>

<?php include('admin_header.php'); ?>


<style type="text/css">
    .form-group label{
		color: white;
	}

	.form-group .form-control option{
		color: black;
	}

	form{	
		color: black;
	}

	.form-group .form-control{	
		color: black;
		border-color: orange;
	}

</style>

<body>




<?php

	$id = isset($_GET['id']) ? $_GET['id'] : '';
    $sql = "SELECT * FROM lecturers_data
				INNER JOIN faculties
				ON lecturers_data.faculty_id = faculties.id

				INNER JOIN departments
				ON lecturers_data.department_id = departments.id

				WHERE lecturers_data.id = '".$id."'";

    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);


		if (isset($_POST['update'])) {
				$title = $_POST['title'];
				$staff_id = $_POST['staff_id'];
				$firstName = $_POST['firstName'];
				$lastName = $_POST['lastName'];
				$middleName = $_POST['middleName'];
				$gender = $_POST['gender'];
				$faculty_id = $_POST['faculty_id'];
				$department_id = $_POST['department_id'];
				$mobile = $_POST['mobile'];
	
			
	$sql = "UPDATE lecturers_data SET title = '".$title."', firstName = '".$firstName."', lastName = '".$lastName."', middleName = '".$middleName."', gender = '".$gender."', faculty_id = '".$faculty_id."', department_id = '".$department_id."', staff_id = '".$staff_id."', mobile = '".$mobile."' WHERE id = '".$id."'";

			$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
			
			$_SESSION['message'] = "Record has been updated!";
            $_SESSION['msg_type'] = "warning";

            header('location: registered_lecturers.php');

		}

	?>


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
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-2">
    			
    		</div>
 <div class="col-md-8">
  <div class="contact_form">
	<form class="form" name="contactform" method="post">
		<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
				<fieldset">
					<div class="form-group">
						<label>Title<b style="color: red;">*</b></label>
						<select class="form-control" name="title">
						<option ><?php echo $row['title']; ?></option>
								<option>Mr.</option>
								<option>Mrs</option>
								<option>Miss</option>
								<option>Dr.</option>
								<option>Prof.</option>
							</select>
					</div>


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
						<label>Faculty<b style="color: red;">*</b></label>
						<select class="form-control" name="faculty_id">
								<option value="<?php echo $row['faculty_id']; ?>"><?php echo $row['faculties']; ?></option>
					<?php 
							$sql3 = "SELECT * FROM faculties";
							$query3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
						?>
							
								<?php while($row3 = mysqli_fetch_assoc($query3)): ?>
								<option><?php echo $row3['faculties']; ?></option>
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
								<option><?php echo $row4['departments']; ?></option>
							<?php endwhile; ?>
							</select>
					</div>


					<div class="form-group">
						<label>Staff ID<b style="color: red;">*</b></label>
						<input type="staff_id" name="staff_id" class="form-control" value="<?php echo $row['staff_id']; ?>">
					</div>


					<div>
						
						<input type="submit" name="update" value="Update" class="btn btn-light btn-radius grd1 btn-block btn-brd" style="background-color: darkgreen">
						
					</div>

				</fieldset>
			</div>		
		</div>
	  </form>
    </div>
</div">
    		<div class="col-md-2">
    			
    		</div>
  </div>
</div>
</div>

 

    <?php include 'footer.php' ?>

</body>
</html>