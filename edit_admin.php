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
	$id = $_SESSION['id'];
    $sql = "SELECT * FROM admin WHERE admin.id = '".$id."'";

    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);


    if (isset($_POST['update'])) {
				$firstName = $_POST['firstName'];
				$lastName = $_POST['lastName'];
				$middleName = $_POST['middleName'];
				$gender = $_POST['gender'];
				$mobile = $_POST['mobile'];
				$email = $_POST['email'];
	
			
	$sql = "UPDATE admin SET firstName = '".$firstName."', lastName = '".$lastName."', middleName = '".$middleName."', gender = '".$gender."', mobile = '".$mobile."', email = '".$email."' WHERE id = '".$id."'";

			$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
			
			$_SESSION['message'] = "Record has been updated!";
            $_SESSION['msg_type'] = "warning";

            header('location: admin_profile.php');

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
						<label>Mobile<b style="color: red;">*</b></label>
						<input type="mobile" name="mobile" class="form-control" value="<?php echo $row['mobile']; ?>">
					</div>


				

					<div class="form-group">
						<label>Email<b style="color: red;">*</b></label>
						<input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>">
					</div>


					<div>
						
						<input type="submit" name="update" value="Update" class="btn btn-light btn-radius grd1 btn-block btn-brd" style="background-color: darkgreen">
						
					</div>

				</fieldset>
			</div>		
		</div>
	  </form>
	</div>
    </div>
    		<div class="col-md-2">
    			
    		</div>
  </div>
</div>

 

    <?php include 'footer.php'; ?>

</body>
</html>