<?php
session_start();

ob_start();



?>
<?php include ('header2.php'); ?>



<?php 

$errors = array();
$id = $_SESSION['id'];

?>


<style type="text/css">
	ul li{
		color: black;
	}

	form{
		color: black;
	}
</style>

<div id="contact" class="container-fluid wb" style="padding-top: 180px; padding-bottom: 180px">
	<div class="row">
		<div class="col-md-4">
			
		</div>
    <div class="col-md-4">
		<form method="POST" class="form">
			<div class="form-group">
			
				<label>Your password has been reset successfully.</label>
			</div>
			
			<div class="form-group">
				<a href="student_page.php" class="btn btn-light btn-radius grd1 btn-block" style="background-color: darkgreen">Continue</a>

				
			</div>
		</div>
		</form>
	</div>

			<div class="col-md-4">
			
			</div>
</div>
</div>


    <?php include 'footer.php' ?>
</body>
</html>