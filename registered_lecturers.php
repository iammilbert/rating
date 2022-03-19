<?php
session_start();

ob_start();
?>


<?php include ('admin_header.php'); ?>






<style type="text/css">
    table,th,td{
    
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
    }

</style>




<?php 


if (isset($_GET['delete'])) {
	$id = $_GET['delete'];

		$sql = "SELECT lecturers_data.id, lecturers_data.firstName, lecturers_data.lastName, lecturers_data.middleName, lecturers_data.staff_id, faculties.faculties, departments.departments, lecturers_data.gender, lecturers_data.mobile, lecturers_data.title FROM lecturers_data 

                            INNER JOIN faculties
                            ON lecturers_data.faculty_id = faculties.id

                            INNER JOIN departments
                            ON lecturers_data.department_id = departments.id
                            WHERE lecturers_data.id = '".$id."'";

		$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		 $row = mysqli_fetch_assoc($query);

		 if (mysqli_num_rows($query)>0) {

           
            $sql1 = "DELETE FROM lecturers_data WHERE lecturers_data.id = '".$id."'";
            $query1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

             $_SESSION['message'] = "Record has been deleted!";
            $_SESSION['msg_type'] = "danger";
         
		}
	}
           
     ?>




<div class="container-fluid" style="padding-bottom: 160px; padding-top: 20px">
	<div class="row">
		<div class="col-md-2">
			
		</div>
		<div class="col-md-8">
			<form class="form">
				 <p class="text-center" style="font-family: Gebriola; font-size: 30px; color: black"><b>REGISTERED LECTURERS</b></p>


				 
				 	 <?php
                 if (isset($_SESSION['message'])): ?> 
                <div style="font-size: 20px;" class="aler alert-<?=$_SESSION['msg_type']?>" >
                <?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>

               
                    </div>
                    
                <?php endif ?>

		 		<div class="text-right">
		 			<td><a href="#" class='btn btn-primary' onclick="javascript:window.print()" /><i class='fa fa-print'></i> Print</a></td>
		 		</div>

		 		<table class="table" style="font-size: 13px">

		 			<tr>
		 				<th>S/N</th>
		 				<th>Title</th>
		 				<th>First Name</th>
		 				<th>Last Name</th>
		 				<th>Middle Name</th>
		 				<th>Gender</th>
		 				<th>Staff ID</th>
		 				<th>Faculty</th>
		 				<th>Department</th>
		 				<th>Mobile</th>
		 					
		 			</tr>

		 			<?php
		 			$no=1;
		 		
		 				
		 			$sql="SELECT lecturers_data.id, lecturers_data.firstName, lecturers_data.lastName, lecturers_data.middleName, lecturers_data.staff_id, faculties.faculties, departments.departments, lecturers_data.gender, lecturers_data.mobile, lecturers_data.title 
 

		 				FROM lecturers_data 

                            INNER JOIN faculties
                            ON lecturers_data.faculty_id = faculties.id

                            INNER JOIN departments
                            ON lecturers_data.department_id = departments.id";

		 					$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		 		

		 		while ($row = mysqli_fetch_assoc($query)) {
		 				

		 			?>
		 			<tr>

		 				<td><?php echo $no ; ?></td>
		 				<td><?php echo $row['title']; ?></td>
		 				<td><?php echo $row['firstName']; ?></td>
		 				<td><?php echo $row['lastName']; ?></td>
		 				<td><?php echo $row['middleName']; ?></td>
		 				<td><?php echo $row['gender']; ?></td>	
		 				<td><?php echo $row['staff_id']; ?></td>
		 				<td><?php echo $row['faculties']; ?></td>
		 				<td><?php echo $row['departments']; ?></td>
		 				<td><?php echo $row['mobile']; ?></td>
		 			
		 				<td><a href="admin_edit_lecturer.php?id=<?php echo $row['id']; ?>" class='btn btn-sm btn-primary' name="edit" ><i class='fa fa-edit'></i></a></td>

		 				<td><a href="registered_lecturers.php?delete=<?php echo $row['id']; ?>" class='btn btn-sm btn-danger' name="delete" ><i class='fa fa-trash'></i></a></td>

		 			</tr>

		 		<?php
		 		$no++;
		 			
		 			}
		 
		 		?>
		
 			</table>
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