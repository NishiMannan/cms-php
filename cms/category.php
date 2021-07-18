<!--<!DOCTYPE html>
<html lang="en">-->
<?php
include "includes/db.php";
include "includes/header.php";

session_start();
?>
<body>
<!--navigation-->
  <?php
include "includes/navigation.php";
?>
    echo "<br>";
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php
                
                if(isset($_GET['catid']))
                    
                {
                    $postcatid=escape($_GET['catid']);
                    
                if(isset($_SESSION['role']) && $_SESSION['role']='admin')
                   {
                      // echo "admin";
                       $stmt1 = mysqli_prepare($connection, "SELECT post_id, post_title, post_author, post_date, post_image, post_content FROM posts WHERE post_category_id= ?");
                
                    
                   }
                    else
                    {
                        
                       // echo "Not Admin";
                 $stmt2= mysqli_prepare($connection, "SELECT post_id, post_title, post_author, post_date, post_image, post_content FROM posts WHERE post_status= ? && post_category_id= ?");
                        
                        $published = "Published";
                     
                        
                    }
                    
                    if(isset($stmt1))
                    {
                        
                         // echo "Statement1";
                        mysqli_stmt_bind_param($stmt1, "i", $postcatid);
                        mysqli_stmt_execute($stmt1);
                        mysqli_stmt_bind_result($stmt1, $post_id, $post_title, $post_author, $post_date, $post_image, $post_content);
                        
                        $stmt = $stmt1;
                        
                      
                    }
                        
                        
                  else
                  {
                           //echo "Statement2";
                       mysqli_stmt_bind_param($stmt2, "si", $published, $postcatid);
                        mysqli_stmt_execute($stmt2);
                        mysqli_stmt_bind_result($stmt2, $post_id, $post_title, $post_author, $post_date, $post_image, $post_content);
                        $stmt = $stmt2;
                      
                  }
                  
                      
                      // $select_all_posts = mysqli_query($connection,$query);
                    
              
                       while(mysqli_stmt_fetch($stmt))
					   {
                           
                    
                       
                      ?> 
                        <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?post_id=<?php echo $post_id;?>"><?php echo $post_title ?> 
                    
                    
            </a>
               
            
                </h2>
                <p class="lead">
                    by <a href="post.php?post_id=<?php echo $post_id;?>"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo  $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo  $post_image;?>"alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                       
                    <?php   
                       
					   }     //  endwhile;
               
					 if(mysqli_stmt_num_rows($stmt) == 0)
                    {
                        
                     echo "<br>";
                     echo "<br>";
                      echo "<br>"; 
                       echo "<h3> No Post Available related to this category </h3>";
                   }
					
			  }
                
                else{
        header("Location: index.php");
                }?>
            </div>
               

                <hr>

               <!-- Second Blog Post -->
               <!-- <h2>
                    <a href="#">Blog Post Title</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, quasi, fugiat, asperiores harum voluptatum tenetur a possimus nesciunt quod accusamus saepe tempora ipsam distinctio minima dolorum perferendis labore impedit voluptates!</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                <!-- Third Blog Post -->
              <!--  <h2>
                    <a href="#">Blog Post Title</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, voluptates, voluptas dolore ipsam cumque quam veniam accusantium laudantium adipisci architecto itaque dicta aperiam maiores provident id incidunt autem. Magni, ratione.</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                <!-- Pager -->
               <!-- <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div> -->

            <!-- Blog Sidebar Widgets Column -->
            
        
           <?php
include "includes/sidebar.php";
?>

        </div>
        
          <hr>
<?php
include "includes/footer.php";
                

    ?>
        
        
        
        
        <!-- /.row -->

      