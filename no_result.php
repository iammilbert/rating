<?php
session_start();

ob_start();



?>
<?php include ('lecturers_header.php'); ?>



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

<div id="contact" class="container-fluid wb" style="padding-top: 100px; padding-bottom: 180px">
	<div class="row">
	<div class="col-md-3">
		
	</div>
    <div class="col-md-6">
		<form method="POST" class="form">
				
			<div class="form-group">
			
				<label style="font-size: 18px; color: blue">Sorry, your Performance result is yet to be release. kindly check back in few days time. Thank you.</label>
			</div>
			
			<div>

				<h3 style="padding-top: 30px; font-family: Monotype Corsiva; font-size: 23px; color: red">Signed<br> Management</h3>
			</div>

			
			<div class="form-group">
				<a href="lecturers_page.php" class="btn btn-light btn-radius grd1 btn-block" style="background-color: darkgreen">Continue</a>	
			</div>
		</div>
		</form>
</div>
		<div class="col-md-3">
		
		</div>
</div>
</div>


    <?php include 'footer.php' ?>
</body>
</html>