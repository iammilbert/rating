<?php 
    session_start();

    ob_start();
?>

<?php include ('general_admin_header.php'); 
    
      include('db_connect.php');
?>

     
            
<?php      
    $id = $_GET['id'];
    $sql = "SELECT * FROM contact WHERE contact.id='".$id."'";
    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($query);
?>


<?php

if (isset($_POST['confirm'])) {
    $id = $_GET['id'];
	$course_title = $_POST['course_title'];
	$course_code = $_POST['course_code'];
	$reply_complain = $_POST['reply_complain'];

$sql1 = "INSERT INTO student_complain_reply(student_sid, course_title, course_code, reply_complain) VALUES('".$id."', '".$course_title."', '".$course_code."','".$reply_complain."')";

		$query1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

			 $_SESSION['message'] = "Replied successful!" ;
    		$_SESSION['msg_type'] = "danger";

					
}


?>

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

<div id="contact" class="container-fluid wb" style="padding-top: 10px">
	<div class="section-title text-center">
        
    </div>
    <div class="col-md-8 col-md-offset-2">
        <div class="contact_form">
        	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
			<form class="form">
				<p class="lead" style="color: black">Replying <?php echo $row['email']; ?></p>


				 <?php
                 if (isset($_SESSION['message'])): ?> 
                <div style="font-size: 20px;" class="aler alert-<?=$_SESSION['msg_type']?>" >
                <?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>

                <a href="index.php" style="color: darkgreen;">Login here</a>
                    </div>
                    
                <?php endif ?>

		<div class="form-group">
			<label>Contact email:</label>
			<input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>">

		</div>

	

		<div class="form-group">
			<label style="font-size: 17px; color: black">Contact message:</label>
			<textarea name="message" rows="6" class="form-control" style="color: black; border-color: darkorange"><?php echo $row['message']; ?></textarea>
		</div>
		<div class="form-group">
			<label style="color: black; font-size: 17px">message</label>
			<textarea name="reply_message" rows="6" class="form-control" style="color: black; border-color: darkorange"></textarea>
		</div>

		<div>
						<input type="submit" name="send" value="Send Message" class="btn btn-light btn-radius grd1 btn-block btn-brd">
		</div>


	</form>
</div>
</div>
</div>




 <?php include 'footer.php' ?>   

</body>
</html>