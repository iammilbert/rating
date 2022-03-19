<?php 
    session_start();

    ob_start();
?>

<?php include ('general_admin_header.php');
    
      include('db_connect.php');
?>

    
   
	<div class="container-fluid"  data-stellar-background-ratio="0.9" style="background-image:url('uploads/parallax_04.jpg')">
        <div class="container">
            <div class="row text-center stat-wrap" style="padding-top: 200px; padding-bottom: 152px">


               <div class="col-md-4 col-sm-6 col-xs-12">
                   <a href="schools.php"> <span data-scroll class="global-radius icon_wrap effect-1"><i class="flaticon-idea"></i></span></a>
                   <?php 
                   
                        $sql = "SELECT COUNT(schools.id) AS sum FROM schools";

                        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                   ?>

                   <?php while ($id_row = mysqli_fetch_assoc($query)): ?> 
                      
                  
                    <p class="stat_count"><?php echo  $id_row['sum']; ?></p>
                    <?php endwhile ?>
                    <h3>Add School</h3>
                </div><!-- end col -->

               <div class="col-md-4 col-sm-6 col-xs-12">

                    <a href="admin_signup.php"> <span data-scroll class="global-radius icon_wrap effect-1"><i class="flaticon-briefcase"></i></span></a>

                    <?php 
                        $sql = "SELECT COUNT(admin.id)-1 AS sum FROM admin";

                        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                   ?>

                   <?php while ($id_row = mysqli_fetch_assoc($query)): ?> 
                      
                  
                    <p class="stat_count"><?php echo  $id_row['sum']; ?></p>
                    <?php endwhile ?>
                    <h3>Add Admin</h3>
                </div><!-- end col -->
                
               <div class="col-md-4 col-sm-6 col-xs-12">
                       <a href="subscribers.php"> <span data-scroll class="global-radius icon_wrap effect-1"><i class="flaticon-customer-service"></i></span></a>
                         <?php 
                   
                        $sql = "SELECT COUNT(subscribers.id) AS sum FROM subscribers";

                        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                   ?>

                   <?php while ($id_row = mysqli_fetch_assoc($query)): ?> 
                      
                  
                    <p class="stat_count"><?php echo  $id_row['sum']; ?></p>
                    <?php endwhile ?>
                        <h3>Subscribers</h3>
                </div>
                
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->




 
    <?php include 'footer.php' ?>   

</body>
</html>