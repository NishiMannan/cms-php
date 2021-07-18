<!--<!DOCTYPE html>
<html lang="en">-->
<?php 
include "includes/db.php";
include "includes/header.php";
//include "./admin/functions.php";
session_start();
?>
<body>
<br>

<!--navigation-->
  <?php
include "includes/navigation.php";
 
?>
  
   
   
    <!-- Page Content -->
    <div class="container">

    <div class="row">

    <!-- Blog Entries Column -->
    
     <div class="col-md-9">
     <?php
    
    if(isset($_GET['page']))
                    
     {
                    
        $page=$_GET['page'];
                    
        $pagee=$page*2-2;
                    
      }
                
    else
                    
     {
         $page=1;        
         $pagee=0;
        
     }
                    
                   // if($page == "" || $page == 1)
                   // {
                        
                        
                        
                        
                       // $page_1=0;
                    //}
                
                   // else{
                        
                         //$page_1=($page*2)-2;
                        
                    //}
              
               
                ?>
            
            
            
            
<?php
         
         
                 
         if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin')
         {
          $query = "SELECT * FROM posts";
         }
         
         else
             
         {
              $query = "SELECT * FROM posts WHERE post_status='Published'";
         }
                       $select_all_posts = mysqli_query($connection,$query);
                    $count=mysqli_num_rows($select_all_posts);
         
         if($count<1)
         {
             
            echo "<br>";
              echo "<br>";
             echo "<h3> No Post Available </h3>";
         }
         
         
         else
         {
                $count=ceil($count/2);
                
             
             if(isset($_SESSION['role']) && $_SESSION['role']=='admin')
             {
                 $limitquery = "SELECT * FROM posts LIMIT $pagee,2";
                 
                 
             }
             else
                 
             {
                 
                  $limitquery = "SELECT * FROM posts WHERE post_status='Published' LIMIT $pagee,2";
             }
                       $limit = mysqli_query($connection,$limitquery);
                   
           
                       while($row = mysqli_fetch_assoc($limit))
                           
                       {
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            //$post_author= $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = substr($row['post_content'],0,100);
                       $post_status=$row['post_status'];
                      
                  $user=$row['userid'];
                      
                        $userquery= "SELECT * FROM users WHERE user_id=$user";
                         $userrow=mysqli_query($connection,$userquery);
                         $rows=mysqli_fetch_assoc($userrow);
                     
                         $username=$rows['user_name'];
                       
                    
                  
       //echo "<h2 class='text-center'> Post is not published yet </h2>";
                           
                      // }
                           
                           //else
                           //{
                               
                        ?> 
                       <br>
                       <br>
                       
                        <h1 class="page-header"> 
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>  
             <a href="post/<?php echo $post_id;?>"><?php echo $post_title; ?></a> 
              
                </h2>
                <p class="lead">
                    by <a href="author.php?post_author=<?php echo $user;?>"><?php echo $username; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo  $post_date;?></p>
                <hr>
                <a href="post.php?post_id=<?php echo $post_id;?>"><img class="img-responsive" src="images/<?php echo imagedisplay($post_image);?>"alt=""></a>
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?post_id=<?php echo $post_id;?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                       
                    <?php   
                       
                       }  }
                
                ?>
               
        
        </div>
     

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

     
        <!-- /.row -->

        <hr>
  
<?php
    
    
include "includes/footer.php";
?>
   </div>
 </div>
      <ul class="pager">
         
        <?php
      
   
        //for($i =1; $i <= $count; $i++)
            for($i =1; $i <= $count; $i++)
           {
           
                if($i == $page)  
              
         
          {?>
   
          <li><a class='active_link' href="index.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
         
              
       <?php  
          }
         else
         {
         ?>
         
               
           
       
   <li><a href="index.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
      
     
          
            
     <?php
         }}
        ?>
        
        </ul> 
       