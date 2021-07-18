





<?php


if(isset($_GET['Edit']))
    
    
{

    $post_id=escape($_GET['Edit']);
    
  // $uid=$_SESSION['uid'];
    
 
    

    $query ="SELECT * FROM posts WHERE post_id={$post_id}";
    
                     
                     $posts_query_edit=mysqli_query($connection,$query);
    
    if(!$posts_query_edit)
        
    {
       
        echo("query failed".mysqli_error($connection));
    }
   
                     
                     while($row=mysqli_fetch_assoc($posts_query_edit))
                     {
                          
                          $post_id = $row['post_id'];
                         $post_category_id = $row['post_category_id'];
                         $post_title = $row['post_title'];
                            $post_author= $row['post_author'];
                            //$post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content']; 
                            //$post_comment= $row['post_comment']; 
                            $post_tags = $row['post_tags']; 
                            $post_status = $row['post_status']; 
                            //$post_comment_count = $row['post_comment_count']; 
                         
                         $postuser = $row['userid']; 
                         
               
                     }


if(isset($_POST['create_post']))
    
{
  
                           $post_category_id = escape($_POST['post_category']);
                            $post_title = escape($_POST['post_title']);
                           // $post_author= escape($_POST['post_author']);
                            //$post_date = $_POST['Date'];
                          // $post_date = date ['d-m-y'];
                            $post_image= $_FILES['post_image']['name'];
                            $post_tempimage = $_FILES['post_image']['tmp_name'];
                            $post_content = escape($_POST['post_content']); 
                            //$post_comment= $row['post_comment']; 
                            $post_tag = escape($_POST['post_tag']); 
                            $post_status = escape($_POST['post_status']); 
                            $post_comment_count = 4; 
                            $uid= escape($_POST['user']); 
    
move_uploaded_file("$post_tempimage","../images/$post_image");
    if(empty($post_image))
	{
        
       $query="SELECT * FROM posts WHERE post_id=$post_id";
            
    $imagecheck=mysqli_query($connection,$query);
        
       while($row=mysqli_fetch_assoc($imagecheck))
       {
          $post_image=$row['post_image'] ; 
            
        
   }
    }
        
        echo "<p class='bg-success'> Post Updated  
<a href='../post.php?post_id={$post_id}'>View Post </a> OR <a href='posts.php'>Edit More Posts</a></p>";


$query = "UPDATE posts SET post_category_id='$post_category_id', post_title='$post_title', post_author='$post_author', post_image='$post_image', post_content='$post_content', post_status='$post_status', userid='$uid', post_comment_count='$post_comment_count' WHERE post_id={$post_id}";
                                 
                                 $query_updating= mysqli_query($connection, $query);
                                if(!$query_updating)
                                {
                                     
                                    die("Query Failed". mysqli_error($connection));
                                }
                                 
                                 
                                 
                             }



}




    
  ?>
  
<form action="" method="post"enctype="multipart/form-data">
  
   <div class="form-group">
   
  <label for="post_title">Post Title</label>
    <input value= "<?php echo $post_title ;?>" type="text" class="form_control" name="post_title">
    
</div>

<div class="form-group">
   
  <label for="User">User</label><?php
   
?>
    <select name="user" id="">
       <?php 
          
          //global $connection;
        $queryuser = "SELECT * FROM users";
         $select_user_query = mysqli_query($connection,$queryuser);
        
        if(!$select_user_query)
        {
            
            die("queryfailed".mysqli_error($connection));
        }
               
       while($row = mysqli_fetch_assoc($select_user_query))
                           
                       {
                          $user_id = $row['user_id'];       
                       $user_name= $row['user_name'];
           if($user_name=="")
               
           {
               
               echo "empty";
           }
           if($user_id==$postuser)
           {
              echo "<option selected value='{$user_id}'>{$user_name}</option>"; 
           }
           else{
                        echo "<option value='{$user_id}'>{$user_name}</option>";
       }}
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
           if($cat_id==$post_category_id)
           {
               
               
               echo "<option selected value='{$cat_id}'>{$cat_title}</option>";
           }
           else{
                        echo "<option value='{$cat_id}'>{$cat_title}</option>";
           }
       }
        ?>
      </select>
      
    </div>


<!-- <div class="form-group">

  <label for="post_category_id">Post Category Id</label>
    <input value="
    <?php //echo $post_category_id ;?>
    "type="text" class="form_control" name="post_category_id">
    
</div>
<div class="form-group">
  
    <label for="post_author">Post Author</label>
    <input value="<?php echo $post_author;?>"type="text" class="form_control" name="post_author">
    
</div>
 <!--<div class="form-group">
  
 <label for="Date">Post Date</label>
    <input type="date" class="form_control" name="Date">
    
</div>-->


  <div class="form-group">
   
   
  <label for="post_status">Post Status</label>
  <select name="post_status" id="">
    
    <option value="<?php echo $post_status;?>"><?php echo $post_status;?></option>
     <?php 
    $query="SELECT * FROM posts WHERE post_id={$post_id}";
      $poststatus=mysqli_query($connection,$query);
      
      while($row=mysqli_fetch_assoc($poststatus))
          
      {
          $status=$row['post_status'];
          
          if($status!=Drafted)
          {
              
           ?>
             
              <option value="<?php echo 'Drafted';?>"><?php echo "Drafted";?></option>  
     <?php     }
          
          else
              
          {?>
              <option value="<?php echo 'Published';?>"><?php echo "Published";?></option>   
              
        <?php  }
        
          
      }
      
      
     ?> 
  </select>
   <!-- <input value="<?php// echo $post_status ;?>"type="text" class="form_control" name="post_status">-->
    
</div>


<div class="form-group">
    
  <label for="post_image">Post 
   Image</label>
    <img src="../images/<?php echo $post_image;?>" width="100" alt=""> 
   <input type="file" class="form_control" name="post_image">
</div>
<div class="form-group">
    
  <label for="post_tag">Post Tag</label>
    <input value="<?php echo $post_tags;?>" type="text" class="form_control" name="post_tag">
    
</div>


<script src="js/ckeditor.js"></script> <!-- Script For Editor-->


<div class="form-group">
    
  <label for="post_content">Post Content</label>
    
    <textarea class="form-control" name="post_content" id="editor" cols="30" rows="10">
    <?php echo $post_content;?>
    </textarea> 
    
</div>

<div class="form-group">
    

    <input type="submit" class="btn btn-primary" name="create_post" value="Update Post">
    </div>


</form>  
     
                           












    


                
                 

 