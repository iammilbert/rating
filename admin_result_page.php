<?php 
    session_start();
    ob_start();
?>
<?php include ('admin_header.php'); ?>

<body style="background-color: grey">

	

    <style type="text/css">
	table,th,td{
		border:2px solid black;
		background-color: lightgreen;
        color: black;

	}

    .col-md-8 label{
        color: black;
    }

    form{
        color: black;
    }
</style>

<div class="container-fluid" style="padding-top: 20px">
    <div class="row">
        <div class="col-md-2">
            
        </div>
<?php 

 $errors = array();
?>

    <div class="col-md-8">
         <div class="text left">
    <a href="appraisal_summary_page.php"><input type="submit" name="back" style="background-color: darkorange" value="Go Back" class="btn btn-primary"></a>


    </div>

        <label style="font-family: new time roman; font-size: 23px"><b>MANAGEMENT RESULT</b></label>
        <table class="table">
            <tr>
                <th>S/NO.</th>
                <th>STUD. MATRIC. NO.</th>
                <th>Q1 ANSWERS</th>
                <th>Q2 ANSWERS</th>
                <th>Q3 ANSWERS</th>
                <th>Q4 ANSWERS</th>
            </tr>
            <?php
            $no = 1;

                $id = $_GET['id'];
                $sql = "SELECT 
                           *
                        FROM lecturers_data
                        INNER JOIN mgt_answer
                            ON lecturers_data.id = mgt_answer.staff_id
                        INNER JOIN student_signup
                            ON student_signup.id = mgt_answer.student_id
                        WHERE lecturers_data.id = '".$id."'";
                $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                while ($row=mysqli_fetch_assoc($query)) {
             ?>
                <tr>
                    <td><?php echo $no ;?></td>
                    <th><?php echo $row['matric_Number']; ?></th>
                    <th><?php echo $row['question1_choice']; ?></th>
                    <th><?php echo $row['question2_choice']; ?></th>
                    <th><?php echo $row['question3_choice']; ?></th>
                    <th><?php echo $row['question4_choice']; ?></th>
                </tr>

            <?php
            $no++;
             }
           ?>
            <?php
                $sql = "SELECT 
                            SUM(question1_choice) AS sum1,
                            SUM(question2_choice) AS sum2,
                            SUM(question3_choice) AS sum3,
                            SUM(question4_choice) AS sum4,
                            SUM(question1_choice + question2_choice + question3_choice + question4_choice)/(COUNT(question1_choice) + COUNT(question2_choice) + COUNT(question3_choice) + COUNT(question4_choice)) AS avg1
                    
                     
                        FROM lecturers_data
                        INNER JOIN mgt_answer
                            ON lecturers_data.id = mgt_answer.staff_id
                        INNER JOIN student_signup
                            ON student_signup.id = mgt_answer.student_id
                        WHERE lecturers_data.id = '".$id."'";
                
                $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                
             ?>
             <?php while($sum_row = mysqli_fetch_assoc($query)): ?>
            <tr>
                <th>SUM</th>
                <th></th>
                <th><?php echo $sum_row['sum1']; ?></th>
                <th><?php echo $sum_row['sum2']; ?></th>
                <th><?php echo $sum_row['sum3']; ?></th>
                <th><?php echo $sum_row['sum4']; ?></th>
            </tr>
            
            <tr>
                <th>AVERAGE</th>
                <th><?php echo $sum_row['avg1']; ?></th>
                
                
                
            </tr>
            <?php endwhile; ?>
        </table>
        
    </div>


    <div class="col-md-2">
        
    </div>
</div>
</div>






<div class="container-fluid" style="padding-top: 20px">
    <div class="row">
        <div class="col-md-2">
            
        </div>


    <div class="col-md-8">
        <label style="font-family: new time roman; font-size: 23px"><b>MOTIVATION RESULT</b></label>
        <table class="table">
            <tr>
                <th>S/NO.</th>
                <th>STUD. MATRIC. NO.</th>
                <th>Q1 ANSWERS</th>
                <th>Q2 ANSWERS</th>
                <th>Q3 ANSWERS</th>
                <th>Q4 ANSWERS</th>
                <th>Q5 ANSWERS</th>
                <th>Q6 ANSWERS</th>
                <th>Q7 ANSWERS</th>
            </tr>

            <?php
            $no = 1;

                $id = $_GET['id'];

                $sql = "SELECT *
                        FROM lecturers_data
                        INNER JOIN motivation_answer
                                ON lecturers_data.id = motivation_answer.staff_id
                        INNER JOIN student_signup 
                                ON student_signup.id = motivation_answer.student_id

                        WHERE lecturers_data.id = '".$id."'";

                        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                        while ($row=mysqli_fetch_assoc($query)) {
             ?>
                <tr>
                    <td><?php echo $no ;?></td>
                    <th><?php echo $row['matric_Number']; ?></th>
                    <th><?php echo $row['question1_choice']; ?></th>
                    <th><?php echo $row['question2_choice']; ?></th>
                    <th><?php echo $row['question3_choice']; ?></th>
                    <th><?php echo $row['question4_choice']; ?></th>
                    <th><?php echo $row['question5_choice']; ?></th>
                    <th><?php echo $row['question6_choice']; ?></th>
                    <th><?php echo $row['question7_choice']; ?></th>
                </tr>

            <?php
            $no++;
             }
           ?>

            <?php 

                $sql = "SELECT
                            SUM(question1_choice) AS sum1,
                            SUM(question2_choice) AS sum2,
                            SUM(question3_choice) AS sum3,
                            SUM(question4_choice) AS sum4,
                            SUM(question5_choice) AS sum5,
                            SUM(question6_choice) AS sum6,
                            SUM(question7_choice) AS sum7,

                            SUM(question1_choice + question2_choice + question3_choice + question4_choice + question5_choice + question6_choice + question7_choice) / (COUNT(question1_choice) + COUNT(question2_choice) + COUNT(question3_choice) + COUNT(question4_choice) + COUNT(question5_choice) + COUNT(question6_choice) + COUNT(question7_choice)) AS avg1

                            FROM lecturers_data
                            INNER JOIN motivation_answer
                                ON lecturers_data.id = motivation_answer.staff_id
                            INNER JOIN student_signup
                                ON student_signup.id = motivation_answer.student_id
                            WHERE lecturers_data.id = '".$id."'";

               $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));      
             ?>

        <?php while($sum_row = mysqli_fetch_assoc($query)): ?>
            <tr>
                <th>SUM</th>
                <th></th>
                <th><?php echo $sum_row['sum1']; ?></th>
                <th><?php echo $sum_row['sum2']; ?></th>
                <th><?php echo $sum_row['sum3']; ?></th>
                <th><?php echo $sum_row['sum4']; ?></th>
                <th><?php echo $sum_row['sum5']; ?></th>
                <th><?php echo $sum_row['sum6']; ?></th>
                <th><?php echo $sum_row['sum7']; ?></th>
            </tr>
            
            <tr>
                <th>AVERAGE</th>
                <th><?php echo $sum_row['avg1']; ?></th>    
            </tr>

        <?php endwhile; ?>
        </table>
        
    </div>


    <div class="col-md-2">
        
    </div>
</div>
</div>









<div class="container-fluid" style="padding-top: 20px">
    <div class="row">
        <div class="col-md-2">
            
        </div>


    <div class="col-md-8">
        <label style="font-family: new time roman; font-size: 23px"><b>INSTRUCTION/CURRICULUM RESULT</b></label>
        <table class="table">
            <tr>
                <th>S/NO.</th>
                <th>STUD. MATRIC. NO.</th>
                <th>Q1 ANSWERS</th>
                <th>Q2 ANSWERS</th>
                <th>Q3 ANSWERS</th>
                <th>Q4 ANSWERS</th>
                <th>Q5 ANSWERS</th>
                <th>Q6 ANSWERS</th>
                <th>Q7 ANSWERS</th>
                <th>Q8 ANSWERS</th>
            </tr>
           

    <?php
        $no = 1;

        $id = $_GET['id'];

        $sql = "SELECT *
            FROM lecturers_data
            INNER JOIN instruction_curriculum_answer
                ON lecturers_data.id = instruction_curriculum_answer.staff_id
            INNER JOIN student_signup 
                ON student_signup.id = instruction_curriculum_answer.student_id
            WHERE lecturers_data.id = '".$id."'";

            $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            while ($row=mysqli_fetch_assoc($query)) {
             ?>
                <tr>
                    <td><?php echo $no ;?></td>
                    <th><?php echo $row['matric_Number']; ?></th>
                    <th><?php echo $row['question1_choice']; ?></th>
                    <th><?php echo $row['question2_choice']; ?></th>
                    <th><?php echo $row['question3_choice']; ?></th>
                    <th><?php echo $row['question4_choice']; ?></th>
                    <th><?php echo $row['question5_choice']; ?></th>
                    <th><?php echo $row['question6_choice']; ?></th>
                    <th><?php echo $row['question7_choice']; ?></th>
                    <th><?php echo $row['question8_choice']; ?></th>
                </tr>

            <?php
            $no++;
             }
           ?>

            <?php 

                $sql = "SELECT
                            SUM(question1_choice) AS sum1,
                            SUM(question2_choice) AS sum2,
                            SUM(question3_choice) AS sum3,
                            SUM(question4_choice) AS sum4,
                            SUM(question5_choice) AS sum5,
                            SUM(question6_choice) AS sum6,
                            SUM(question7_choice) AS sum7,
                            SUM(question8_choice) AS sum8,

                    SUM(question1_choice + question2_choice + question3_choice + question4_choice + question5_choice + question6_choice + question7_choice) / (COUNT(question1_choice) + COUNT(question2_choice) + COUNT(question3_choice) + COUNT(question4_choice) + COUNT(question5_choice) + COUNT(question6_choice) + COUNT(question7_choice) + COUNT(question8_choice)) AS avg1

                FROM lecturers_data
                INNER JOIN instruction_curriculum_answer
                    ON lecturers_data.id = instruction_curriculum_answer.staff_id
                INNER JOIN student_signup
                    ON student_signup.id = instruction_curriculum_answer.student_id
                WHERE lecturers_data.id = '".$id."'";

               $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));      
             ?>

        <?php while($sum_row = mysqli_fetch_assoc($query)): ?>
            <tr>
                <th>SUM</th>
                <th></th>
                <th><?php echo $sum_row['sum1']; ?></th>
                <th><?php echo $sum_row['sum2']; ?></th>
                <th><?php echo $sum_row['sum3']; ?></th>
                <th><?php echo $sum_row['sum4']; ?></th>
                <th><?php echo $sum_row['sum5']; ?></th>
                <th><?php echo $sum_row['sum6']; ?></th>
                <th><?php echo $sum_row['sum7']; ?></th>
                <th><?php echo $sum_row['sum8']; ?></th>
            </tr>
            
            <tr>
                <th>AVERAGE</th>
                <th><?php echo $sum_row['avg1']; ?></th>    
            </tr>

        <?php endwhile; ?>
        </table>
        
    </div>


    <div class="col-md-2">
        
    </div>
</div>
</div>









<div class="container-fluid" style="padding-top: 20px">
    <div class="row">
        <div class="col-md-2">
            
        </div>


    <div class="col-md-8">
        <label style="font-family: new time roman; font-size: 23px"><b>PUNTUALITY RESULT</b></label>
        <table class="table">
            <tr>
                <th>S/NO.</th>
                <th>STUD. MATRIC. NO.</th>
                <th>Q1 ANSWERS</th>
            </tr>

            <?php
            $no = 1;

                $id = $_GET['id'];
                $sql = "SELECT 
                           *
                        FROM lecturers_data
                        INNER JOIN puntuality_answer
                            ON lecturers_data.id = puntuality_answer.staff_id
                        INNER JOIN student_signup
                            ON student_signup.id = puntuality_answer.student_id
                        WHERE lecturers_data.id = '".$id."'";
                $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                while ($row=mysqli_fetch_assoc($query)) {
             ?>
                <tr>
                    <td><?php echo $no ;?></td>
                    <th><?php echo $row['matric_Number']; ?></th>
                    <th><?php echo $row['question1_choice']; ?></th>
                </tr>

            <?php
            $no++;
             }
           ?>
            <?php
                $sql = "SELECT 
                            SUM(question1_choice) AS sum1,
                            SUM(question1_choice )/(COUNT(question1_choice)) AS avg1
                    
                        FROM lecturers_data
                        INNER JOIN puntuality_answer
                            ON lecturers_data.id = puntuality_answer.staff_id
                        INNER JOIN student_signup
                            ON student_signup.id = puntuality_answer.student_id
                        WHERE lecturers_data.id = '".$id."'";
                
                $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                
             ?>
             <?php while($sum_row = mysqli_fetch_assoc($query)): ?>
            <tr>
                <th>SUM</th>
                <th></th>
                <th><?php echo $sum_row['sum1']; ?></th>
            </tr>
            
            <tr>
                <th>AVERAGE</th>
                <th><?php echo $sum_row['avg1']; ?></th>
                
                
                
            </tr>
            <?php endwhile; ?>
        </table>
        
    </div>


    <div class="col-md-2">
        
    </div>
</div>
</div>







<style type="text/css">
    .form-group .form-control{
        color: black;
    }
</style>
            


<?php 
        
    $id = $_GET['id'];
    $sql = "SELECT * FROM lecturers_data WHERE id='".$id."'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
?>


<?php 

    if (isset($_POST['confirm'])) {
       $staff_sid = $_GET['id'];

        $check_duplicate_id = "SELECT staff_sid FROM final_result WHERE staff_sid = '".$staff_sid."'";
            $query_id = mysqli_query($conn, $check_duplicate_id) or die(mysqli_error($conn));
            $id_count = mysqli_num_rows($query_id);
            if ($id_count > 0) {
                array_push($errors, "Staff result has already been submitted");
        
            }

       $puntuality = $_POST['puntuality'];
       $motivation = $_POST['motivation'];
       $instruction_curriculum = $_POST['instruction_curriculum'];
       $management = $_POST['management'];
       $remark = $_POST['remark'];


       if (count($errors)==0) {
    
       $sql = "INSERT INTO final_result(staff_sid, puntuality, motivation, instruction_curriculum, management, remark) VALUES('".$staff_sid."', '".$puntuality."', '".$motivation."', '".$instruction_curriculum."', '".$management."', '".$remark."')";

       $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

       $_SESSION['message'] = "Result Sucessfully Submitted!" ;
            $_SESSION['msg_type'] = "danger";
    }

}

?>


<form method="POST" style="padding-bottom: 20px;">
		<div class="container-fluid">
            <div class="row">
			<div class="col-md-2">
               
				<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
			</div>


			<div class="col-md-4">
                <?php
                 if (isset($_SESSION['message'])): ?> 
                <div style="font-size: 20px;" class="aler alert-<?=$_SESSION['msg_type']?>" >
                <?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>
                    </div>
                    
                <?php endif ?>
                 <b><?php include ('signup_error.php'); ?></b>
					
					<div class="form-group">
						<label>STAFF ID<b style="color: red;">*</b></label>
                        <input type="text" name="staff_id" class="form-control" value="<?php echo $row['staff_id']; ?>">
					</div>

					<div class="form-group">
						<label>PUNTUALITY<b style="color: red;">*</b></label>
						<input type="text" name="puntuality" class="form-control" required="lastName" style="border-width: 2px;" required="puntuality">
					</div>

					<div class="form-group">
						<label>MANAGEMENT<b style="color: red;">*</b></label>
						<input type="text" name="management" class="form-control" style="border-width: 2px;" required="management">
					</div>

			</div>


				<div class="col-md-4">
					<div class="form-group">
						<label>MOTIVATION<b style="color: red;">*</b></label>
						<input type="text" name="motivation" class="form-control" style="border-width: 2px;" required="motivation">
					</div>

					<div class="form-group">
						<label>INSTRUCTION/CURRICULUM<b style="color: red;">*</b></label>
						<input type="text" name="instruction_curriculum" class="form-control" style="border-width: 2px;" required="instruction_curriculum">
					</div>

					<div class="form-group">
						<label>REMARK<b style="color: red;">*</b></label>
						<textarea name="remark" class="form-control"></textarea>
					</div>

                    <div>
                        <input type="submit" name="confirm" value="Submit" class="btn btn-light btn-radius gr1 btn-block btn-brd" style="background-color: darkgreen">
                    </div>
                    
				</div>

				<div class="col-md-2">
					
				</div>
		</div>
    </div>
	</form>

    
<?php include 'footer.php' ?>

</body>
</html>