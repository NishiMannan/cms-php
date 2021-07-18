
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
                        
                                    
                       <?php
                        
                        insert_category();
                        update_category();
                       delete_category();
                        ?>
                     
                   <div class="col-xs-6">
                      
                      <table class="table table-bordered table-hover">    
                      <thead>
                          <tr>
                              <th>
                                  ID
                              </th>
                              <th>
                                  Category Title
                              </th>
                              
                              <?php
							  
                              if($_SESSION['username']=="rajjo")
								  
							   {
							  ?>
                               <th>
                                  Edit
                              </th>
                               <th>
                               Delete
                              </th>
                              <?php
							  }
							  ?>
                          </tr>
                      </thead>
                       <tbody>
         
                     <?php
                  
                      selecting_category();
                           
                          ?>
                       </tbody>
                      
                      </table> 
                        </div>
         
                </div>
                <!-- /.row -->
                
              
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

      
    <!-- /#wrapper -->
       </div>        
                   
<?php include "includes/admin_footer.php"; ?>

