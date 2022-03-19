<?php 
    session_start();
    ob_start();
?>
<?php include ('admin_header.php'); ?>
<style type="text/css">
	table,th,td{
	
        color: black;

	}

</style>


    
<div class="container-fluid" style="padding-bottom: 160px">
	<div class="row">
		<div class="col-md-1">
			
		</div>
		<div class="col-md-10">
			<form class="form">
				 <p class="text-center" style="font-family: Gebriola; font-size: 30px; color: black"><b><td>Kaduna State University</td>  2019 Performance Appraisal Result</b></p>

		 		<div class="text-right">
		 				 	<td><a href="#" class='btn btn-primary' onclick="javascript:window.print()" /><i class='fa fa-print'></i> Print</a></td>
		 		</div>

		 		<table class="table" style="font-size: 13px">

		 			<tr>
		 				<th>S/N</th>
		 				<th>Staff ID</th>
		 				<th>Faculty</th>
		 				<th>Department</th>
		 				<th>Motivation</th>
		 				<th>Management</th>
		 				<th>Puntuality</th>	
		 				<th>Instruction/Curriculum</th>
		 				<th>Remark</th>
		 			</tr>

		 			<?php
		 				$no=1;
		 				
		 				$sql="SELECT lecturers_data.id, lecturers_data.staff_id, faculties.faculties, departments.departments, final_result.motivation, final_result.puntuality, final_result.management, final_result.remark, final_result.instruction_curriculum
		 					FROM final_result 

		 					INNER JOIN lecturers_data
                            ON lecturers_data.id = final_result.staff_sid

                            INNER JOIN faculties
                            ON lecturers_data.faculty_id = faculties.id

                            INNER JOIN departments
                            ON lecturers_data.department_id = departments.id";


		 					$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		 		

		 		while ($row = mysqli_fetch_assoc($query)) {
		 			?>
		 			<tr>
		 				<td><?php echo $no ; ?></td>
		 				<td><?php echo $row['staff_id']; ?></td>
		 				<td><?php echo $row['faculties']; ?></td>
		 				<td><?php echo $row['departments']; ?></td>
		 				<td><?php echo $row['motivation']; ?>%</td>
		 				<td><?php echo $row['management']; ?>%</td>
		 				<td><?php echo $row['puntuality']; ?>%</td>
		 				<td><?php echo $row['instruction_curriculum']; ?>%</td>
		 				<td><?php echo $row['remark']; ?></td>

		 			</tr>

		 		<?php
		 			$no++;
		 			}
		 			

		 		?>
		 	
		 </table>
		 
	  </form>
	  </div>
	  <div class="col-md-1">
			
	  </div>
 	</div>
</div>


	
  

<?php include 'footer.php' ?>   

</body>
</html>