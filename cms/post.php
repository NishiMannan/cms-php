<!--<!DOCTYPE html>
<html lang="en">-->
<?php
include "includes/db.php";
include "includes/header.php";
//include "./admin/functions.php";
?>
<body>
<!--navigation-->
  <?php
include "includes/navigation.php";
	session_start();
	$uid= $_SESSION['uid'];
?>
   <br>
   <br>
   <br>
   <?php
	if(isset($_POST['liked']) && isset($_POST['user_id']))
				{
					$userid=$_POST['user_id'];
					$postid=$_POST['post_id'];
		
		$updatequery="UPDATE posts SET likes=likes+1 WHERE post_id={$postid}";
		
		$res=mysqli_query($connection,$updatequery);
		if(!$res)
		{
			echo"Sorry not update";
		}
		
        $insertlikes="INSERT INTO likes (userid,postid) VALUES($userid,$postid)";
		$insertquery=mysqli_query($connection,$insertlikes);
		
		
				}
	
	?>
    <?php
	if(isset($_POST['unliked']) && isset($_POST['user_id']))
				{
					$userid=$_POST['user_id'];
					$postid=$_POST['post_id'];
		
		$updatequery="UPDATE posts SET likes=likes-1 WHERE post_id={$postid}";
		
		$res=mysqli_query($connection,$updatequery);
		if(!$res)
		{
			echo"Sorry not update";
		}
		
        $deletelikes="DELETE FROM likes WHERE postid=$postid && userid=$userid";
		$deletequery=mysqli_query($connection,$deletelikes);
	
				}
	
	?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
             <?php
				
                if(isset($_GET['post_id']))
                   {
                       
                       $postid=escape($_GET['post_id']);
                   
                     $postviewsquery = "UPDATE posts SET post_views_count= post_views_count+1 WHERE post_id={$postid}";
                    
                    $postviews = mysqli_query($connection,$postviewsquery);
                    
                 $query = "SELECT * FROM posts WHERE post_id={$postid}";
                       $select_all_posts = mysqli_query($connection,$query);
                    
                       while($row = mysqli_fetch_assoc($select_all_posts))
                           
                       {
                           $post_id = $row['post_id']; 
                            $post_title = $row['post_title'];
                            $post_author= $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                       
                      
                      ?> 
                        <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo  $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo  $post_image;?>"alt="" height="350" width="350">
                <hr>
                <p><?php echo $post_content ?></p>
                <!--<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>-->
                       
                    <?php   
                       
                       }}
                
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
        
        
        
        
        

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="row" class="col-xs-8">
                <div class="well">
                   
                    
                    
                    <form role="form" method="post">
                       
                        <div class="form-group">
                           <h4>Leave a Comment:</h4>
                            <textarea class="form-control" rows="3" name="comment"></textarea>
                        </div>
                        
                       
                        <div class="form-group">
                           <label for="author">Author</label>
                            <input class="form-control"  type="text" name="author">
                        </div>
                        
                         <label for="email">Email</label>
                        <div class="form-group">
                            <input  class="form-control" type="text" name="email">
                        </div>
                        <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                    </form>
                </div>
            </div>
               
               <div class="row">
               <?php	if(isloggedin())
               	{?>
               	<p class="pull-right"><span class="<?php echo likesdislikes($postid,$uid) ? 'glyphicon glyphicon-thumbs-down' : 'glyphicon glyphicon-thumbs-up';?>"></span><a href="" data-toggle="tooltip" data-placement="top" title="<?php echo likesdislikes($postid,$uid) ? 'User liked this before' : 'Want to Like';?>"class="<?php echo likesdislikes($postid,$uid) ? 'unlike' : 'like';?>"><?php echo likesdislikes($postid,$uid) ? 'Unlike' : 'Like';?></a></p>
               <?php }
				   
               	else
               	{
               echo "<p class='pull-right'>You need to <a href='/cms/betterlogin.php'>Login</a> to like/dislike this post </p>";
               	
               	
               	
               	}?>
               </div>
               <div class="row">
              
               	<p class="pull-right">Liked:<?php echo totallikes($postid);?></p>
               	
               	
               </div>
               <div class="clearfix"></div>
                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php
                     $query="SELECT * FROM comments WHERE  comment_post_id=$postid ORDER BY comment_id DESC";
                     
                     $publishcomments=mysqli_query($connection,$query);
            
            while($row=mysqli_fetch_assoc($publishcomments))    
            
       
                
                
            {
                $publish=$row['comment_status']; 
                 $content=$row['comment_content']; 
                 $comment_date=$row['comment_date']; 
                 $comment_author=$row['comment_author']; 
                if($publish=="approved")
                {
                    
                   ?>
                
            
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author;?>
                            <small><?php echo $comment_date;?></small>
                            
                        </h4>
                      <?php echo $content;?>
                    </div>
                </div>

         <?php  } }?>
            

        </div>
        <!-- /.row -->
        <?php
        if(isset($_POST['create_comment']))
                        
                        {
                            
            
                            $comment=escape($_POST['comment']);
                                $author=escape($_POST['author']);
                                $email=escape($_POST['email']);
            
            
            if(!empty($comment) && !empty($author) && !empty($email))
            {
            
            
      $query = "INSERT INTO comments(comment_content,comment_author,comment_email,comment_post_id,comment_date)";
          
          $query .= "VALUES('$comment','$author','$email','$postid',now())";
                            
            $commentquery=mysqli_query($connection,$query);
                           
                        if(!$commentquery)                
                                                       
                          {
                        
                        die("queryfailed".mysqli_error($connection));
                        }
                            
           
            $countcomment="UPDATE posts SET post_comment_count= post_comment_count+1 WHERE post_id=$postid";
            
             $comment_postcount_query=mysqli_query($connection,$countcomment);
                        
             if(!$comment_postcount_query)                
                                                       
                          {
                        
                        die("queryfailed".mysqli_error($connection));
                        }
         }
     
        
        else{?>
            
            <script> alert('Fields cannot be empty') </script>
               
        <?php    
        }
        }
?>
        <hr>
<?php
include "includes/footer.php";
?>

<script>
		
		$(document).ready(function()
		
	{
			
			$("[data-toggle='tooltip']").tooltip();		
		var postid = <?php echo $postid?>;
		var userid = <?php echo $uid?>;
	$('.like').click(function()
					 {
		
		$.ajax({
			url: "/cms/post.php?p_id=<?php echo $postid?>",type: 'post',
			data: {
			
			'liked': 1,
			'post_id': postid,
			'user_id': userid
		}
	
		});
	
	});
	});
		</script>
		
	
<script>
		
		$(document).ready(function()
	{
		var postid = <?php echo $postid?>;
		var userid = <?php echo $uid?>;
	$('.unlike').click(function()
					 {
		
		$.ajax({
			url: "/cms/post.php?p_id=<?php echo $postid?>",type: 'post',
			data: {
			
			'unliked': 1,
			'post_id': postid,
			'user_id': userid
		}

		});
	
	});
	});
		</script>