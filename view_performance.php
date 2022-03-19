<?php
session_start();

ob_start();
?>

<?php include ('lecturers_header.php'); ?>

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

<?php       
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM lecturers_data 
    				INNER JOIN final_result
    				ON lecturers_data.id = final_result.staff_sid
    				WHERE lecturers_data.id='".$id."'";
    $query = mysqli_query($conn, $sql);
   
    if (mysqli_num_rows($query)==1) {

		$row = mysqli_fetch_assoc($query);

		}else{
			header('Location: no_result.php');
		
		}
    
?>


<div class="container-fluid" style="padding-top: 100px; padding-bottom: 90px">
	<div class="row">
		<div class="col-md-2">
			
		</div>

   <div class="col-md-8"  style="background-color: darkgrey">
      	<form class="form">
				<input type="hidden" name="staff_sid" value="<?php echo $_SESSION['id']; ?>">
				<div class="section-title text-center">
			 		<img src="images/KASULogo.PNG"  style="width: 90px; height: 80px; padding-bottom: 10px; padding-top: 10px">
			 	
        			<h3 style="font-size: 17px; font-family: Tahoma"><b style="font-size: 22px;">ONLINE LECTURERS RATING SYSTEM</b><br>Staff Performance Result Sheet (SPRS)</h3>
        		</div>
				
				<fieldset">
					<table class="table">	 
						<tr>
							<th>Motivation:</th>
							<td><?php echo $row['motivation']; ?>%</td>
							<th>Management:</th>
							<td><?php echo $row['management']; ?>%</td>
							
						</tr>

						<tr>
							<th>Puntuality:</th>
							<td><?php echo $row['puntuality']; ?>%</td>
							<th>Instruction/Curriculum:</th>
							<td><?php echo $row['instruction_curriculum']; ?>%</td>			
						</tr>
					
					</table>

					
					<div class="form-group">
						<label style="color: black"><u>REMARK:</u></label><br>
						<label style="color: black"><?php echo  $row['remark']; ?></label>
					</div>


					<div class="text-right">
			 		<a href="#" class='btn btn-primary' onclick="javascript:window.print()" /><i class='fa fa-print'></i> Print</a>
			 		</div>


				</fieldset>
		
	</form>

</div>
		<div class="col-md-2">
			
		</div>
</div>
</div>


    <?php include 'footer.php' ?>
</body>
</html>