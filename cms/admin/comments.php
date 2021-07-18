


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
                            <small>Author</small>
                        </h1>         
           </div>
        </div>
         <?php
             
             if(isset($_GET['postid']))
            
             {
    include "includes/postcomments.php";
             }
           
            else
            {
    
     if (isset($_GET['source']))
         
     {
    $source = $_GET['source'];
     }
            
            else
            {
                echo $source="";
            }
        switch($source)
        {
          
         
       
        
        
             case 'Approved';
            
            echo include "includes/view_all_comments.php";
         break;
        
         case 'Declined';
            
            echo include "includes/view_all_comments.php";
         break;
                
         
                
                
         default:
           
         include "includes/view_all_comments.php";
            



         break;
        }
            }
?>
            
           
              
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        </div>  
        <!-- /#wrapper -->      
                   
<?php include "includes/admin_footer.php"; ?>

