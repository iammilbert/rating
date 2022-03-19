<?php
session_start();

ob_start();
?>

<?php include ('admin_header.php'); ?>
    

    <?php 

					$id = $_SESSION['id'];

					$sql = "SELECT * FROM admin WHERE admin.id='".$id."'";

					$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
					$row = mysqli_fetch_assoc($query);
						    
	?>
    



<style type="text/css">
	table,th,td{
		border:1px solid black;
		
		color: black;

	}

	@media print{
    	.btn-sm{
    		display: none;
    	}

    	.footer{
    		display: none;
    	}

    	.btn-primary{
    		display: none;
    	}

    	.copyrights{
    		display: none;
    	}

</style>


    <div id="contact" class="section wb">
    	<div class="row">
    		<div class="col-md-2">
    			
    		</div>
         <div class="col-md-8" style="background-color: darkgrey">

			<form class="form">
		
			<div class="text-right">
			 	<td><a href="#" class='btn btn-primary' onclick="javascript:window.print()" /><i class='fa fa-print'></i> Print</a></td>
			 	</div>
			 <div class="section-title text-center">
			 	<img src="images/KASULogo.PNG"  style="width: 90px; height: 80px">
			 	
        		<h3 style="font-size: 17px; font-family: Tahoma"><b style="font-size: 22px;">KASU LECTURERS RATING SYSTEM</b><br>Admin Information System (AIF)</h3>
        			    
    		</div>
				<fieldset">
					<table class="table">
						<tr>
							<th>First Name:</th>
							<td><?php echo $row['firstName']; ?></td>
							<th>Last Name:</th>
							<td><?php echo $row['lastName']; ?></td>
						</tr>

						<tr>
							<th>Middle Name:</th>
							<td><?php echo $row['middleName']; ?></td>
							<th>Gender:</th>
							<td><?php echo $row['gender']; ?></td>
						</tr>

						<tr>
							
							<th>Email:</th>
							<td><?php echo $row['email']; ?></td>
							<th>Mobile:</th>
							<td><?php echo  $row['mobile']; ?></td>

						<tr>
							
							<th>Appointment:</th>
							<td>Admin</td>
						</tr>
					</table>

					<input type="hidden" name="id" value="<?php echo  $row['id']; ?>">
					<div>

						<a style="background-color: darkgreen" href="edit_admin.php?id=<?php echo $row['id']; ?>" name="edit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Edit Profile</a>

					</div>

				</fieldset>
			</div>
				
		</div>
	</form>

</div>
			<div class="col-md-2">
    			
    		</div>
</div>
</div>


 

    <?php include 'footer.php' ?>
</body>
</html>