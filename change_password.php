<?php
session_start();

ob_start();

include ('header2.php');

?>


<?php 

$id = $_SESSION['id'];

if (isset($_POST['submit'])) {

		$id = $_SESSION['id'];
		$password = $_POST['password'];


		$sql = "SELECT * FROM student_signup WHERE id = '".$id."' AND password = '".$password."'";

		$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

		if (mysqli_num_rows($query)==1) {

		$row = mysqli_fetch_assoc($query);

		header('Location: enterNew_password.php');

		}else{
			$_SESSION['message'] = "Password incorrect!";
            $_SESSION['msg_type'] = "warning";
		}
	}


?>

<div class="container-fluid" style="padding-top: 150px; padding-bottom: 190px">
	<div class="row">
	<div class="col-md-4">
		
	</div>

	<div class="col-md-4">
		<form method="POST">
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
				<label style="color: black">Enter your current password</label>
				<input type="password" name="password" class="form-control" style="border-color: darkgreen">
				
			</div>

			<div class="form-group">
				<input type="submit" name="submit" value="submit" class="btn btn-light btn-radius btn-brd" style="background-color: darkgreen">
	
			</div>
		</form>
	</div>

	<div class="col-md-4">
		
	</div>
</div>
</div>




<?php include ('footer.php'); ?>
</body>
</html>