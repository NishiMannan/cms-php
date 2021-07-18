<!-- Blog Sidebar Widgets Column -->
           
           <?php
if(ifitisMethod('post'))
   
   {
	if(isset($_POST['username']) & isset($_POST['password'])){
        $username=$_POST['username'];
     //echo $username;
    $password=$_POST['password'];
    
loginuser($username, $password);
 
   }

	   }



?>
                 
                   <div class="col-md-3">

                <!-- Blog Search Well -->
                      <div class="well">
                      <form action = "search.php" method ="post">
                      <h4>Blog Search</h4>
                      <div class="input-group">
                       <input name ="search" type="text" class="form-control">
                       <span class="input-group-btn">
                       <button name="submit" class="btn btn-default" type="submit">
                       <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                       </div>
                    <!-- /.input-group -->
                        </form>
                    

                <!-- Blog Search Well -->
                       
                      <?php
                          if(isset($_SESSION['role']) && $_SESSION['role']=='admin')
                               {
                          
                          ?>
    <div class="well"><form action="/cms/includes/logout.php"><?php
    echo "<div class='form-group'>{$_SESSION['role']} {$_SESSION['username']} logged in</div>";?>
      
           <button name="logout" type="submit" class="btn btn-primary">Logout</button>
                             </form> </div>
                       <?php
                               }
                          
                          
                             else
                             {
                             
                        ?>                   
                        <form method ="post">
                        <h4>LogIn</h4>
                       <div class="input-group">
                        <input name ="username" type="text" class="form-control" placeholder="Enter username">
                        
                        <input name ="password" type="password" class="form-control" placeholder="Enter password">
                        <span class="input-group-btn">
                         <button name="Submit" class="btn btn-primary" value="Submit" type="submit" class="form-control">
                        <span class="glyphicon glyphicon-default"></span>
                        </button> </span>
                        
                        
                      
                       </div>
                       <a class="" href="forgotpassword.php">Forgot Password?</a>
                    <!-- /.input-group -->
                       </form>                                                  
                       <?php 
                             } 
                          ?>                                            
                                                                     
                       <h4>Blog Categories</h4>
                        <div class="row">
                        <div class="col-lg-12">
                        <ul class="list-unstyled">
                    
                       <?php
                            
                       $query = "SELECT * FROM categories";
                       $select_all_categories_query = mysqli_query($connection,$query);
                    
                       while($row = mysqli_fetch_assoc($select_all_categories_query))
                         
                       {
                           
                       $cat_title = $row['cat_title'];
                       $cat_id = $row['cat_id'];
                    
                        
                       echo "<li><a href='./category.php?catid={$cat_id}'>{$cat_title}</a></li>";
                      
                       }
                    
                            
                        ?>
                               
                     </ul>
                     </div>
                        
                     </div>
                    <!-- /.row -->
                    </div>

                <!-- Side Widget Well -->
                    <?php include "widget.php";?>

                    </div>

       
                                                                       <!-- Blog Categories Well -<div class="well">
                   