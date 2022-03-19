<?php
session_start();
session_regenerate_id();
?>
<?php include ('header.php'); ?>


<body>
<div class="container-fluid" style="padding-top: 150px; padding-bottom: 190px">
	<div class="col-md-4">
		
	</div>

	<div class="col-md-4">
		<form method="POST">
			<div class="form-group">
				<label style="color: black">Enter your registered email address</label>
				<input type="email" name="email" class="form-control" style="border-color: darkgreen" placeholder="e.g. kin@gmail.com">
				
			</div>
			<div class="form-group">
				<input type="submit" name="forgot_password" value="submit" class="btn btn-light btn-radius btn-brd">

				<a href="login.php" name="cancel" class="btn btn-light btn-radius btn-brd">Cancel</a>
			</div>
		</form>
	</div>

	<div class="col-md-4">
		
	</div>
</div>




<?php include ('footer.php'); ?>
</body>
</html>