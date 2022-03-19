<?php 
	session_start();

	ob_start();
?>

<?php include ('admin_header.php'); ?>
 

<style type="text/css">
	table,th,td{
		border:2px solid black;
		color: black;
		background-color: lightgreen;

	}

	form{
		color: black;
	}
</style>



		<div class="container-fluid" >
			<div class="row">
			<div class="col-md-3" style="padding-bottom: 200px; padding-top: 40px;">
				<form method="POST">
					<div class="form-group">
						<label style="font-size: 15px; color: solid black;">Select Lecturer faculty and department for analysis and process their result.</label>
					</div>
			
					<div class="form-group">

						<?php 
							$sql = "SELECT * FROM faculties";
							$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
						?>
						<label>Faculty<b style="color: red;">*</b></label>
							<select class="form-control" name="faculty_id">
								<option value=""> -select faculty-</option>
								<?php while($row = mysqli_fetch_assoc($query)): ?>
								<option value="<?php echo $row['id']; ?>"><?php echo $row['faculties']; ?></option>
							<?php endwhile; ?>
							</select>

					</div>

					<div class="form-group">

						<?php 
							$sql = "SELECT * FROM departments";
							$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
						?>
						<label>Department<b style="color: red;">*</b></label>
							<select class="form-control" name="department_id">
								<option value=""> -select Department-</option>
								<?php while($row = mysqli_fetch_assoc($query)): ?>
								<option value="<?php echo $row['id']; ?>"><?php echo $row['departments']; ?></option>
							<?php endwhile; ?>
							</select>

					</div>

					<div class="form-group">
						<input type="submit" name="view" value="View" class="btn btn-light btn-radius grd1 btn-block btn-brd" style="background-color: darkgreen">
					</div>
				</form>
			</div>

			<div class="col-md-9" style="padding-top: 40px;">
				<table class="table" style="font-size: 13px">
				 	<tr>
				 		<th>S/No.</th>
				 		<th>Staff ID</th>
				 		<th>Title</th>
				 		<th>First Name</th>
				 		<th>Last Name</th>
				 		<th>Middle Name</th>
				 		<th>Faculty</th>
				 		<th>Department</th>
				 		<th>Mobile</th>	
				 	</tr>

				<?php
				$no = 1;
				 
			if (isset($_POST['view'])) {
				$faculty_id = $_POST['faculty_id'];
				$department_id = $_POST['department_id'];

		 		$sql = "SELECT lecturers_data.id, lecturers_data.staff_id, lecturers_data.firstName, lecturers_data.lastName, lecturers_data.middleName, lecturers_data.title, faculties.faculties, departments.departments, lecturers_data.department_id  FROM lecturers_data 


			    		INNER JOIN faculties
			    		ON lecturers_data.faculty_id = faculties.id

			    		INNER JOIN departments
			    		ON lecturers_data.department_id = departments.id 

			    		WHERE lecturers_data.department_id = '".$department_id."' AND lecturers_data.faculty_id = '".$faculty_id."'";
					    $query = mysqli_query($conn, $sql);

		 			while($row = mysqli_fetch_assoc($query)) {

		 		
		 		?>
		 			<tr>
		 				<td><?php echo $no; ?></td>
		 				<td><?php echo $row['staff_id']; ?></td>
		 				<td><?php echo $row['title']; ?></td>
		 				<td><?php echo $row['firstName']; ?></td>
		 				<td><?php echo $row['lastName']; ?></td>
		 				<td><?php echo $row['middleName']; ?></td>
		 				<td><?php echo $row['faculties']; ?></td>
		 				<td><?php echo $row['departments']; ?></td>
		 				
		 			<td><a href="admin_result_page.php?id=<?php echo $row['id']; ?>" class='btn btn-sm btn-danger'><i class='fa fa-unchecked'></i>Process</a></td>

		 			</tr>

		 		<?php
		 		$no++;
		 				}
		 		}
		 		?>
				 </table>

			</div>
		</div>
	</div>


 

<?php include 'footer.php' ?>