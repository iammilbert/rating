<?php
session_start();

ob_start();
?>

<?php include ('header2.php'); ?>



<style type="text/css">

    .form-group label{
        color: black;
    }

    .form-group .form-control{
        color: black;
        border: 2px solid green;
        
    }
</style>

     
            
<?php 
$errors = array();   
    $id = $_GET['id'];
    $sql = "SELECT * FROM lecturers_data 
                            INNER JOIN faculties
                             ON lecturers_data.faculty_id = faculties.id

                             INNER JOIN departments
                             ON lecturers_data.department_id = departments.id

                            WHERE lecturers_data.id='".$id."'";
    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($query);
?>



   <div id="contact" class="container-fluid" style="background-color: darkgrey" >  
         <h3 style="color:darkgreen; text-align: center; font-size: 30px;"><u><b>STUDENT QUESTIONAIRE</b></u></h3>
                                   
            <form class="form" method="POST">
                 <p style="font-size: 17px; color: black"><b><u>LECTURER DETAILS:</u></b></p>
                    <div class="row">
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                  
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Name</label>

                         <?php  
                             $sql = "SELECT  CONCAT(UCASE(title), ' ', UCASE(firstName), ' ', UCASE(lastName), ' ', UCASE(middleName)) AS name 

                                FROM lecturers_data WHERE id='".$id."'";

                            $query = mysqli_query($conn, $sql) or die(mysqli_error($conn2));
                     
                        ?>  
                        <?php while($sum_row = mysqli_fetch_assoc($query)): ?>

                            <input type="text" name="name" class="form-control" value="<?php echo $sum_row['name']; ?>">

                        <?php endwhile ?>
                  </div>
               </div>


                <div class="col-md-4">
                  <div class="form-group">
                     <label>Faculty</label>
                            <input type="text" name="faculty_id" class="form-control" value="<?php echo $row['faculties']; ?>">
                  </div>
                </div>
        
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Department</label>
                        <input type="text" name="department" class="form-control" value="<?php echo $row['departments']; ?>">
                    </div>
                </div>
                <b><?php include ('signup_error.php'); ?></b>
            </div>
           </form>
        </div>



     <?php 
            include ('puntuality.php'); 
            
    ?>


    <?php include 'footer.php' ?>   
   

</body>
</html>