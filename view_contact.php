<?php 
    session_start();
    ob_start();
?>

<?php include ('general_admin_header.php'); ?>


<style type="text/css">
	table,th,td{
		
        color: black;

	}

</style>



<?php 
include 'db_connect.php';
		
	

?>

<div class="container-fluid" style="padding-bottom: 160px; padding-top: 20px">
		<div class="col-md-10 col-md-offset-1">
			<form class="form">
				<div class="row">
				 <p class="text-center" style="font-family: Gebriola; font-size: 30px; color: black"><b>CLIENTS CONTACT</b></p>

				 <div class="text-right">
		 		<td><a href="#" class='btn btn-primary' onclick="javascript:window.print()" /><i class='fa fa-print'></i> Print</a></td>
		 		</div>
		 		<p></p>

		 		<table class="table" style="font-size: 13px">

		 				<tr>
		 					<th style="font-size: 15px">S/N</th>
		 					<th style="font-size: 15px">First Name</th>
		 					<th style="font-size: 15px">Last Name</th>
		 					<th style="font-size: 15px">Email</th>
		 					<th style="font-size: 15px">Message</th>
		 					
		 				</tr>

		 				<?php
		 					$no = 1;

		 					
		 					$sql="SELECT * FROM contact";

		 				$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		 				while ($row = mysqli_fetch_assoc($query)) {
		 				

		 				?>
		 				<tr>
		 					<td><?php echo $row['id'] ; ?></td>
		 					<td><?php echo $row['firstName']; ?></td>
		 					<td><?php echo $row['lastName']; ?></td>
		 					<td><?php echo $row['email']; ?></td>
		 					<td><?php echo $row['message']; ?></td>

		 					<td><a href="reply_contact.php?id=<?php echo $row['id'];?>" class='btn btn-sm btn-info'><i class='fa fa-reply'></i></a></td>

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