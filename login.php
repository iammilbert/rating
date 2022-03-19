<?php 
session_start();
ob_start();

?>





<?php include 'header.php' ?>

<div class="container-fluid" style="padding-top: 130px; padding-bottom: 70px">
	<div class="row">
		<div class="col-md-4">
		</div>


		<div class="col-md-4">
		

<?php 
		if (isset($_POST['login'])) {

		$matric_Number = $_POST['matric_Number'];
		$password = $_POST['password'];


		$sql = "SELECT * FROM student_signup WHERE matric_Number = '".$matric_Number."' AND password = '".$password."'";

		$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

	if (mysqli_num_rows($query)==1) {

		$row = mysqli_fetch_assoc($query);

		$_SESSION['id'] = $row['id'];

		header('Location: student_page.php');

		}else{
			$_SESSION['message'] = "Incorrect Login details!";
            $_SESSION['msg_type'] = "warning";
		}
	}

	?>			

      	<form method="POST">
 
				<fieldset>

					<legend style="color: darkgreen;"><b>Sign-in to your account (Student)</b></legend>

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
								<i class="fa fa-user" aria-hidden="true" style="color: black"></i>
									<label style="color: black">Matric. Number<b style="color: red">*</b></label>
									<input type="text" name="matric_Number" class="form-control" required="matric_Number" placeholder="e.g. KASU/" style="border-color: darkgreen; background: none; color: black">
							</div>
						
							<div class="form-group">
								<i class="fa fa-lock" aria-hidden="true" style="color: black"></i>
								<label style="color: black">Password<b style="color: red">*</b></label>
								<input type="password" name="password" class="form-control" required="password" placeholder="e.g. *******" style="border-color: darkgreen; background: none; color: black">
							</div>
							
							<div class="form-group">
							
               			<input name="login" type="submit" value="Login" class="btn btn-light btn-radius btn-brd" style="background-color: green">

               				<b style="color: black">Forgot password?<a href="forgot_password.php" style="color: green"> click here</a>
								</b>
						</div>

               				<div class="form-group">

								<button class="form-control">New to us? <a href="student_signup.php" style="color: green; background : none">Sign Up</a>
								</button>
							</div>

							<div class="form-group" style="padding-bottom: 20px; padding-top: 15px; text-align: center">
								
								
								
							</div>
	
				</fieldset>

		</form>
	</div>

		<div class="col-md-4">
		</div>
</div><!-- end section -->
</div>

              

  
<?php include 'footer.php' ?>
</body>
</html>
