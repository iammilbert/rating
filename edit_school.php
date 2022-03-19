<?php 
    session_start();
    ob_start();

include ('general_admin_header.php'); 

 
?>


<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
	include('db_connect.php');
		$sql = "SELECT * FROM schools WHERE schools.id = '".$id."'";

		$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		 $row = mysqli_fetch_assoc($query);


		if (isset($_POST['update'])) {
				$id = $_GET['id'];
				$schoolNames = $_POST['schoolNames'];
				$email = $_POST['email'];
				$mobile = $_POST['mobile'];
				

		
$sql = "UPDATE schools SET schoolNames = '".$schoolNames."', email = '".$email."', mobile = '".$mobile."' WHERE id = '".$id."'";

			$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
			
			$_SESSION['message'] = "Record has been updated!";
            $_SESSION['msg_type'] = "warning";

            header('location: registered_schools.php');
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
					<legend style="color: green;"><h2><b>Profile</b></h2></legend>
					<div class="form-group">
						<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
						<label>School Name<b style="color: red;">*</b></label>
						<input type="text" name="schoolNames" class="form-control" value="<?php echo $row['schoolNames']; ?>">
					</div>

					<div class="form-group">
						<label>Mobile<b style="color: red;">*</b></label>
						<input type="text" name="mobile" class="form-control" value="<?php echo $row['mobile']; ?>">
					</div>

					<div class="form-group">
						<label>Email<b style="color: red;">*</b></label>
						<input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>">
					</div>


					<div>
						<input type="submit" name="update" value="Update" class="btn btn-light btn-radius btn-brd grd1 btn-block">
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