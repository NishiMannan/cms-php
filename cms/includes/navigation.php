  <!-- Navigation -->
   
  
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/cms/index.php">CMS Front</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                 
                 
                 <?php
                    
                      //session_start();
                       $query = "SELECT * FROM categories";
                       $select_all_categories_query = mysqli_query($connection,$query);
                    
                       while($row = mysqli_fetch_assoc($select_all_categories_query))
                           
                       {
                       $cat_title = $row['cat_title'];
                       $cat_id = $row['cat_id'];
               
    
   $categoryactive='';
   $regactive='';
   $contact='';
   $log='';
   $pagename= basename($_SERVER['PHP_SELF']);
     $login="betterlogin.php";                     
   $reg="registration.php";                    
   $cont="contact.php";  
    if(isset($_GET['catid']) && $_GET['catid'] == $cat_id)
        
    {
        
    $categoryactive='active';
        
    }
  

     echo "<li class='$categoryactive'><a href='/cms/category/{$cat_id}'>{$cat_title}</a></li>";
    
    }
                          ?>
                          
                    
                          
                       
                          <?php  
                                
                                if($pagename==$reg)
                            {
                             $regactive='active';
                            }
                                
                            ?>
                    <li class="<?php echo $regactive;?>"><a href="/cms/registration.php">Registration</a> </li>
                       
                         <?php  
                    
                        if($pagename==$cont)
                            {
                             $contact='active';
                            }
                                
                            ?>
                 <li class="<?php echo $contact;?>"><a href="contact.php">Contact Us</a></li>
                    
            <?php
                    
                   // if(isset($_SESSION['role']))
                        
            
                       //if(isset($_GET['post_id'])) 
                 
                      //     $pid=$_GET['post_id'];
                         
               ?>
                           
                    <!--<li><a href="admin/posts.php?source=edit_post&Edit=<?php //echo $pid;?>">Edit Post</a></li>-->
                        
                   
           
                    
            
                    
                    
                    
                    <?php  
                     if(isLoggedin())
                    {
                         
					?>
                 
                    <li><a href="includes/logout.php">LogOut</a></li>
                 
                   <?php
					 
					 }
					 
					else {
                         
                          if($pagename==$login)
                            {
                             $log='active';
                            } ?>
                      <li class="<?php echo $log;?>"><a href="betterlogin.php">LogIn</a></li>
                          
                         
               <?php    }
					
						
					if($_SESSION['user_role']="admin")
						
					 {
						
					  ?>
						 
				<li><a href="/cms/admin/index.php">Admin</a></li>
                          
					<?php
					}
                        
                       ?>  
               
                   </ul>
                   </div>
                    </div>
                     <!--  <li>
                        <a href="#">Services</a>
                    </li>
                   
                </ul>-->
                   
            
          
            <!-- /.navbar-collapse -.->
        </div>
       /.container -->
    </nav>
