
   <?php 
//$user=$_SESSION['uid'];
$currentuser=$_SESSION['username'];
if(isset($_POST['create_post']))
    
	
	
{
	
	
          //global $connection;
        $queryuser = "SELECT * FROM users WHERE user_name='{$currentuser}'";
         $select_user_query = mysqli_query($connection,$queryuser);
        
        if(!$select_user_query)
        {
            
            die("queryfailed".mysqli_error($connection));
        }
                    
       while($row = mysqli_fetch_assoc($select_user_query ))
                           
                       {
                          $user_id = $row['user_id'];       
                       $user_name = $row['user_name'];
	                     }
                          //$post_id = $_POST['post_id'];
                         $post_category_id = escape($_POST['post_category']);
                         $post_title = escape($_POST['post_title']);
                           // $post_author= $_POST['post_author'];
                            //$post_date = $_POST['Date'];
                          // $post_date = date ['d-m-y'];
                           $post_image= $_FILES['post_image']['name'];
                        $post_tempimage = $_FILES['post_image']['tmp_name'];
                            $post_content = escape($_POST['post_content']); 
                            //$post_comment= $row['post_comment']; 
                            $post_tag = escape($_POST['post_tag']); 
                            $post_status = escape($_POST['post_status']); 
                           // $post_comment_count = 4; 
    
                              $user = escape($_POST['user']); 
    
    move_uploaded_file("$post_tempimage", "../images/$post_image");
    
    $query ="INSERT INTO posts (post_category_id,post_title,userid,post_date,post_image,post_content,post_tags,post_status,post_author) VALUES ('$post_category_id','$post_title','$user',now(),'$post_image','$post_content','$post_tag','$post_status','$user_name')";
    
    
    $insert_query=mysqli_query($connection,$query);
    
confirm($insert_query);
    
   $pid=escape(mysqli_insert_id($connection));
    
echo "<p class='bg-success'>Post Added
<a href='posts.php'>View All Posts</a><a href ='../post.php?post_id={$pid}'>View Post</a>";

}
    

?>                     
    
  
  <form action="" method="post"enctype="multipart/form-data">
  
   <div class="form-group">
   
  <label for="post_title">Post Title</label>
    <input type="text" class="form_control" name="post_title">
    
</div>
 
 
 
 
 <div class="form-group">
   
  <label for="User">User</label>
   
    <select name="user" id="">
       
          <?php
          //global $connection;
        $queryuser = "SELECT * FROM users";
         $select_user_query = mysqli_query($connection,$queryuser);
        
        if(!$select_user_query )
        {
            
            die("queryfailed".mysqli_error($connection));
        }
                    
       while($row = mysqli_fetch_assoc($select_user_query ))
                           
                       {
                          $user_id = $row['user_id'];       
                       $user_name = $row['user_name'];
           if($user_name=="")
               
           {
               
               echo "empty";
           }
           
           
                        echo "<option value='{$user_id}'>{$user_name}</option>";
       }
        ?>
        
        </select>
      
    </div>

 <div class="form-group">
   
  <label for="post_category">Post Category</label>
   
    <select name="post_category" id="">
       
          <?php
          //global $connection;
        $query = "SELECT * FROM categories";
         $select_categories_query = mysqli_query($connection,$query);
        
        if(!$select_categories_query)
        {
            
            die("queryfailed".mysqli_error($connection));
        }
                    
       while($row = mysqli_fetch_assoc($select_categories_query))
                           
                       {
                          $cat_id = $row['cat_id'];       
                       $cat_title = $row['cat_title'];
           if($cat_title=="")
               
           {
               
               echo "empty";
           }
           
           
                        echo "<option value='{$cat_id}'>{$cat_title}</option>";
       }
        ?>
      </select>
      
    </div>
<!--<div class="form-group">
  
    <label for="post_author">Post Author</label>
    <input type="text" class="form_control" name="post_author">
    
</div>-->
 <div class="form-group">
  
 <!-- <label for="Date">Post Date</label>
    <input type="date" class="form_control" name="Date">
    
</div>-->


  <div class="form-group">
   
   
  <label for="post_status">Post Status</label>
   
   
   <select class="form_control" name="post_status" id="">
    
    
    <option value="Published">Published</option>
    <option value="Drafted">Drafted</option>
    
      </select>
    
</div>


<div class="form-group">
    
  <label for="post_image">Post 
   Image</label>
   
    <input type="file" class="form_control" name="post_image">
    
</div>
<div class="form-group">
    
  <label for="post_tag">Post Tag</label>
    <input type="text" class="form_control" name="post_tag">
    
</div>

   
   
<script src="js/ckeditor.js"></script>
    

   
   
     <div class="form-group">
  <label for="post_content">Post Content</label>
    <textarea class="form_control" name="post_content" id="editor" cols="30" rows="10">
    </textarea>
    
</div>

 <script src="js/editor.js"></script>  <!-- Script For Editor-->

<div class="form-group">
    

    <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
    </div>

      </div>
</form>  
                 




