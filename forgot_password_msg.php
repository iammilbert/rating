<?php
session_start();
session_regenerate_id();
?>
<?php include ('header.php'); ?>



<body>
<div class="container-fluid" style="padding-top: 90px; padding-bottom: 300px">
<div class="col-md-2">
	
</div>
	<div class="col-md-8">
		<form method="POST">
			<div class="form-group">

				<?php
				$_SESSION['message'] = "a link has been sent to your email for verification and resetting of password";
            $_SESSION['msg_type'] = "warning";

                 if (isset($_SESSION['message'])): ?> 
                <div style="font-size: 16px; font-style: inherit; color: green" class="aler alert-<?=$_SESSION['msg_type']?>" >
                <?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?><br>if you have not receive any mail,
                <a href="forgot_password.php" style="color: darkgreen;">Resend email</a>
                    </div>
                    
                <?php endif ?>

				
			</div>
		
		</form>
	</div>

	<div class="col-md-2">
		
	</div>
</div>




<?php include ('footer.php'); ?>
</body>
</html>