


<?php ob_start();?>

<?php include "includes/admin_header.php"; ?>
<?php include "functions.php"; ?>




   <!--Script to select all check boxes  -->
   


     <div id="wrapper">
     
<?php include "includes/admin_navigation.php"; ?>
       
          
        <div id="page-wrapper">

        <div class="container-fluid">

         <!-- Page Heading -->
       <div class="row">
       <div class="col-lg-12">
                    
            <h1 class="page-header">
                       Welcome To Admin
                       <small><?php echo $_SESSION['username'];?></small>
                       </h1>         
           </div>
        </div>
        
        <?php
    
     if(isset($_GET['source']))
         
     {
    $source = escape($_GET['source']);
     }
            
            else
            {
                echo $source="";
            }
        switch($source)
        {
            case 'add_post';
            
          include "includes/add_post.php";
                
         break;
         
       
            case 'edit_post';
            
            include "includes/post_edit.php";
         break;
        
            case '80';
            
            echo" Nice 80";
         break;
         
         
         default:
         
         include "includes/view_all_posts.php";
         break;
        }
  
?>
              
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        </div>  
        <!-- /#wrapper -->      

  
   
     <!-- Script for jquery  -->
  
  
  
  
  
<?php include "includes/admin_footer.php"; ?>

