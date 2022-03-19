<?php
session_start();

ob_start();
?>

<?php include ('header2.php'); ?>
    
    

<?php     
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM student_signup 

    		INNER JOIN faculties
    		ON student_signup.faculty_id = faculties.id

    		INNER JOIN departments
    		ON student_signup.department_id = departments.id

    		INNER JOIN courses
    		ON student_signup.course_id = courses.id

    		WHERE student_signup.id='".$id."'";

		    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		    $row = mysqli_fetch_assoc($query);
    
?>

<style type="text/css">
	table,th,td{
	
		font-size: 13px;
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


    <div id="contact" class="section wb" style="padding-bottom: 30px">
    	<div class="row">
    	

    		<div class="col-md-2">
    			
    		</div>
         <div class="col-md-8"  style="background-color: darkgrey" style="padding-bottom: 20px">
	<form class="form">
			<div class="text-right">
				<td><a class="btn btn-primary" href="change_password.php">Change Password</a></td>

			 	<td><a href="#" class='btn btn-primary' onclick="javascript:window.print()" /><i class='fa fa-print'></i> Print</a></td>
			 	</div>
			 <div class="section-title text-center">
			 	<img src="images/KASULogo.PNG"  style="width: 100px; height: 80px; padding-bottom: 10px">
			 	
        		<h3 style="font-size: 17px; font-family: Tahoma"><b style="font-size: 22px;">ONLINE RATING SYSTEM</b><br>Student Information System (SIF)</h3>
        			    
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
							<th>Reg. Number:</th>
							<td><?php echo $row['matric_Number']; ?></td>
						
							<th>Faculty:</th>
							<td><?php echo $row['faculties']; ?></td>
						</tr>

							<tr>
							<th>Department:</th>
							<td><?php echo $row['departments']; ?></td>
							<th>course Of Study:</th>
							<td><?php echo $row['courses']; ?></td>
							
						</tr>

	
					</table>


					<div>

						<a style="background-color: green" href="edit_student.php?id=<?php echo $row['id']; ?>" name="edit" class="btn btn-light btn-radius grd1 btn-block">Edit Profile</a>

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