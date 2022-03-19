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

<?php 
include 'db_connect.php';
	

?>

    
<div class="container-fluid" style="padding-bottom: 160px">
		<div class="col-md-10 col-md-offset-1">
			<form class="form">
				<div class="row">

				 <p class="text-center" style="font-family: Gebriola; font-size: 30px; color: black"><b>REGISTERED STUDENTS</b></p>

		 		<div class="text-right">
		 			<td><a href="#" class='btn btn-light btn-radius btn-brd'><i class='fa fa-print'></i></a></td>
		 		</div>

		 		<table class="table" style="font-size: 13px">

		 			<tr>
		 				<td><b>S/N</b></td>
		 				<td><b>First Name</b></td>
		 				<td><b>Last Name</b></td>
		 					
		 			</tr>

		 			<?php
		 				$no=1;
		 				
		 				$sql="SELECT * FROM test";

		 					$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		 		

		 		while ($row = mysqli_fetch_assoc($query)) {
		 			?>
		 			<tr>
		 				<td><?php echo $no ; ?></td>
		 				<td><?php echo $row['firstName']; ?></td>
		 				<td><?php echo $row['lastName']; ?></td>
		 				<td><a href="#" class='btn btn-sm btn-info'><i class='fa fa-edit'></i></a></td>
		 				<td><a href="#" class='btn btn-sm btn-danger'><i class='fa fa-trash'></i></a></td>

		 			</tr>

		 		<?php
		 			$no++;
		 			}
		 			

		 		?>
		 	
		 </table>
		 </div>
	  </form>
 	</div>
</div>


	
  

<?php include 'footer.php' ?>   

</body>
</html>