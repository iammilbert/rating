<?php
session_start();

ob_start();
?>

<?php include ('lecturers_header.php'); ?>
    
    

<?php       
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM lecturers_data 

    		INNER JOIN faculties
    		ON lecturers_data.faculty_id = faculties.id

    		INNER JOIN departments
    		ON lecturers_data.department_id = departments.id

    		WHERE lecturers_data.id='".$id."'";
		    $query = mysqli_query($conn, $sql);
		    $row = mysqli_fetch_assoc($query);
    
?>

<style type="text/css">
	table,th,td{

		
		color: black;

	}

</style>


    <div id="contact" class="section wb">
    	<div class="row">
    		<div class="col-md-2">
    			
    		</div>

         <div class="col-md-8"  style="background-color: darkgrey">
		<form class="form">
		
			<div class="text-right">
			 	<td><a href="#" class='btn btn-primary' onclick="javascript:window.print()" /><i class='fa fa-print'></i> Print</a></td>
			 	</div>
			 <div class="section-title text-center">
			 	<img src="images/KASULogo.PNG"  style="width: 90px; height: 80px; padding-bottom: 10px; padding-top: 10px">
			 	
        		<h3 style="font-size: 17px; font-family: Tahoma"><b style="font-size: 22px;">ONLINE LECTURERS RATING SYSTEM</b><br>Staff Information System (SIS)</h3>
        			    
    		</div>
				<fieldset">
					<table class="table">

						<tr>
							<th>Title:</th>
							<td><?php echo $row['title']; ?></td>
							<th>Gender:</th>
							<td><?php echo $row['gender']; ?></td>
							
						</tr>

						<tr>
							<th>First Name:</th>
							<td><?php echo $row['firstName']; ?></td>
							<th>Last Name:</th>
							<td><?php echo $row['lastName']; ?></td>			
						</tr>

						<tr>
							<th>Middle Name:</th>
							<td><?php echo $row['middleName']; ?></td>
							<th>Staff ID:</th>
							<td><?php echo $row['staff_id']; ?></td>
						</tr>

						<tr>
							<th>Faculty:</th>
							<td><?php echo $row['faculties']; ?></td>
							<th>Department:</th>
							<td><?php echo $row['departments']; ?></td>
							
						</tr>

					</table>


					<div>

						<a style="background-color: darkgreen" href="edit_lecturers.php?id=<?php echo $row['id']; ?>" name="edit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Edit Profile</a>

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