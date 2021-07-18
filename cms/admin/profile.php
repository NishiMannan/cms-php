


<?php ob_start();?>

<?php include "includes/admin_header.php"; ?>
<?php include "functions.php"; ?>


     <div id="wrapper">
     
<?php include "includes/admin_navigation.php"; ?>
       
          
        <div id="page-wrapper">

        <div class="container-fluid">

         <!-- Page Heading -->
       <div class="row">
       <div class="col-lg-12">
                    
            <h1 class="page-header">
                       Welcome To Admin
                            <small><?php echo $_SESSION['username'] ?></small>
                        </h1>         
           </div>
        </div>
        
        <?php
    
     
           include "includes/editprofile.php";
            
    
        ?>
              
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        </div>  
        <!-- /#wrapper -->      
                   
<?php include "includes/admin_footer.php"; ?>

