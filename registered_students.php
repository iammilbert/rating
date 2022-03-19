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

		$sql = "SELECT student_signup.id, student_signup.firstName, student_signup.lastName, student_signup.middleName, student_signup.matric_Number, faculties.faculties, departments.departments, student_signup.gender, courses.courses, student_signup.password FROM student_signup

				INNER JOIN faculties
				ON student_signup.faculty_id = faculties.id

				INNER JOIN departments
				ON student_signup.department_id = departments.id

				INNER JOIN courses
				ON student_signup.course_id = courses.id

				WHERE student_signup.id = '".$id."'";

		$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		 $row = mysqli_fetch_assoc($query);

		 if (mysqli_num_rows($query)>0) {

            $id = $_GET['delete'];
            $sql1 = "DELETE FROM student_signup WHERE id = '".$id."'";
            $query1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

             $_SESSION['message'] = "Record has been deleted!";
            $_SESSION['msg_type'] = "danger";
         
		}
	}
           
     ?>


    
<div class="container-fluid" style="padding-bottom: 160px">
		<div class="row">
		<div class="col-md-2">
			
		</div>
		<div class="col-md-8">
			<form class="form">

				 <p class="text-center" style="font-family: Gebriola; font-size: 30px; color: black"><b>REGISTERED STUDENTS</b></p>

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
		 				<td><b>S/N</b></td>
		 				<td><b>First Name</b></td>
		 				<td><b>Last Name</b></td>
		 				<td><b>Middle Name</b></td>
		 				<td><b>Gender</b></td>
		 				<td><b>Matric. Number</b></td>
		 				<td><b>Faculty</b></td>
		 				<td><b>Department</b></td>
		 				<td><b>Course</b></td>
		 				<td><b>password</b></td>	
		 			</tr>

		 			<?php
		 				$no=1;
		 				
		 				$sql="SELECT student_signup.id, student_signup.firstName, student_signup.lastName, student_signup.middleName, student_signup.matric_Number, faculties.faculties, departments.departments, student_signup.gender, courses.courses, student_signup.password
		 					FROM student_signup 

                            INNER JOIN departments
                            ON student_signup.department_id = departments.id

                            INNER JOIN faculties
                            ON student_signup.faculty_id = faculties.id

                            INNER JOIN courses
                            ON student_signup.course_id = courses.id";

		 					$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		 		

		 		while ($row = mysqli_fetch_assoc($query)) {
		 			?>
		 			<tr>
		 				<td><?php echo $no ; ?></td>
		 				<td><?php echo $row['firstName']; ?></td>
		 				<td><?php echo $row['lastName']; ?></td>
		 				<td><?php echo $row['middleName']; ?></td>
		 				<td><?php echo $row['gender']; ?></td>
		 				<td><?php echo $row['matric_Number']; ?></td>
		 				<td><?php echo $row['faculties']; ?></td>
		 				<td><?php echo $row['departments']; ?></td>
		 				<td><?php echo $row['courses']; ?></td>
		 				<td><?php echo $row['password']; ?></td>
		 				
		 				<td><a href="admin_edit_student.php?id=<?php echo $row['id']; ?>" class='btn btn-sm btn-primary' name="edit" ><i class='fa fa-edit'></i></a></td>

		 				<td><a href="registered_students.php?delete=<?php echo $row['id']; ?>" class='btn btn-sm btn-danger' name="delete" ><i class='fa fa-trash'></i></a></td>

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