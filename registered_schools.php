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



<?php 


if (isset($_GET['delete'])) {
	$id = $_GET['delete'];

		$sql = "SELECT * FROM schools WHERE schools.id = '".$id."'";

		$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		 $row = mysqli_fetch_assoc($query);
	}
           
     ?>




<div class="container-fluid" style="padding-bottom: 160px; padding-top: 20px">
		<div class="col-md-10 col-md-offset-1">
			<form class="form">
				<div class="row">
				 <p class="text-center" style="font-family: Gebriola; font-size: 30px; color: black"><b>REGISTERED SCHOOLS</b></p>

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
		 		<p></p>
		 		<table class="table" style="font-size: 13px">

		 			<tr>
		 				<th style="font-size: 15px">S/N</th>
		 				<th style="font-size: 15px">school Name</th>
		 				<th style="font-size: 15px">Mobile</th>	
		 				<th style="font-size: 15px">Email</th>	
		 			</tr>

		 			<?php
		 			$no=1;
		 		
		 				
		 			$sql="SELECT * FROM schools";

		 			$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		 		

		 		while ($row = mysqli_fetch_assoc($query)) {
		 				

		 			?>
		 			<tr>

		 				<td><?php echo $no ; ?></td>
		 				<td><?php echo $row['schoolNames']; ?></td>
		 				<td><?php echo $row['tel']; ?></td>
		 				<td><?php echo $row['email_Address']; ?></td>

		 			
		 				<td><a href="edit_school.php?id=<?php echo $row['id']; ?>" class='btn btn-sm btn-primary' name="edit" ><i class='fa fa-edit'></i></a></td>

		 				<td><a onclick="deleteme(<?php echo $row['id']; ?>)" class='btn btn-sm btn-danger' name="Delete" ><i class='fa fa-trash'></i></a></td>

		 			</tr>



		 			


		 			<script language="javascript">
		 				function deleteme(delid){
		 					if (confirm("Do you want to Delete!")) {
		 						window.location.href='delete.php?del_id=' +delid+'';
		 						return true;
		 					}
		 				}
		 			</script>

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