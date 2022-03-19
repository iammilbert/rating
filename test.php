<?php 
    session_start();

    ob_start();
?>

<?php include ('header.php'); ?>
   
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

 
<?php 

$errors = array();

if (isset($_POST['confirm'])) {
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
		

			
	
			$sql = "INSERT INTO test(firstName, lastName) VALUES('".$firstName."', '".$lastName."')";

			$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

			 $_SESSION['message'] = "Record has been Sucessfully Submitted!" ;
    		$_SESSION['msg_type'] = "danger";

					
			}
		

	?>


	


<div id="contact" class="container-fluid wb" style="padding-top: 10px">
    <div class="section-title text-center">
        <h3><b>CREATING ACCOUNT</b></h3>
        <p class="lead">Please fill out the form below.</p>
            
    </div>
    <div class="col-md-8 col-md-offset-2">
        <div class="contact_form">

	<form class="form" name="contactform" method="post">
		<div class="row">				
				 <?php
                 if (isset($_SESSION['message'])): ?> 
                <div style="font-size: 20px;" class="aler alert-<?=$_SESSION['msg_type']?>" >
                <?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>

                <a href="login.php" style="color: darkgreen;">Login here</a>
                    </div>
                    
                <?php endif ?>

				<fieldset">
					<b><?php include ('signup_error.php'); ?></b>
					<div class="form-group">
						<label>First Name<b style="color: red;">*</b></label>
						<input type="text" name="firstName" class="form-control" required="firstName">
					</div>

					<div class="form-group">
						<label>Last Name<b style="color: red;">*</b></label>
						<input type="text" name="lastName" class="form-control" required="lastName">
					</div>

				
					<div>
						<input type="submit" name="confirm" value="Register" class="btn btn-light btn-radius grd1 btn-block btn-brd">
					</div>

					<div class="form-group" style="padding-top: 10px; color: black"><b>Already Registered? <a href="login.php" style="color: darkgreen;">Login here</a> instead</b>
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