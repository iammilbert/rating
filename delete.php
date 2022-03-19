
<?php

           include('db_connect.php');

            $sql1 = "DELETE FROM schools WHERE schools.id = '".$_GET['del_id']."'";
            $query1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

            	header("Location: registered_schools.php");

             $_SESSION['message'] = "Record has been deleted!";
            $_SESSION['msg_type'] = "danger";
         
	?>