
    
     <?php ob_start();?>
     
     <?php include "delete_modal.php"; ?>
     <?php

$uid=$_SESSION['uid'];
$user=$_SESSION['username'];

if(isset($_POST['Button']))
{
   if(isset($_POST['arraycheckbox']))
{
    foreach($_POST['arraycheckbox'] as $value)
        
    {
        $bulkoptions=$_POST['bulkoptions'];
        
        switch($bulkoptions)
        {
            case 'Published':
        $query ="UPDATE posts SET post_status= '{$bulkoptions}' WHERE post_id={$value}";
        $publishquery=mysqli_query($connection,$query);
        
         break;
                
         case 'Drafted':
        $query ="UPDATE posts SET post_status= '{$bulkoptions}' WHERE post_id={$value}";
        $draftedquery=mysqli_query($connection,$query);
         break;
                
         case 'Delete':
        $query ="DELETE FROM posts WHERE post_id={$value}";
        $deletequery=mysqli_query($connection,$query);
        break;      
        
            case 'clone':
              $query ="SELECT * FROM posts WHERE post_id={$value}";
                     
              $posts_query=mysqli_query($connection,$query);
                     
              while($row=mysqli_fetch_assoc($posts_query))
                     
              {
                          $post_id = $row['post_id'];
                         $post_category_id = $row['post_category_id'];
                         $post_title = $row['post_title'];
                           // $post_author= $row['post_author'];
                         $post_user= $row['userid'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content']; 
                            //$post_comment= $row['post_comment']; 
                            $post_tags = $row['post_tags']; 
                            $post_status = $row['post_status']; 
                          $post_comment_count = $row['post_comment_count']; 
                         
                     }

        $insquery ="INSERT INTO posts(post_category_id, post_title, userid, post_date, post_image, post_content, post_tags, post_status, post_comment_count) VALUES({$post_category_id}, '{$post_title}', '{$post_user}', '{$post_date}', '$post_image', '{$post_content}', '{$post_tags}', '{$post_status}', '{$post_comment_count}')";
                     
                     $posts_query=mysqli_query($connection,$insquery);
                break;
                     
    }}
}

}
?>
 
     <form action="" method="post">
     <div id="bulkOptionContainer" class="col-xs-4">
     <select class="form-control" name="bulkoptions" id="">
         
         <option value="Drafted">Drafted</option>
           <option value="Published">Published</option>
             <option value="Delete">Deletet</option>
       <option value="clone">Clone</option>
       
           </select>
           </div>
          <div class="col-xs-4">
          <input type="submit" class="btn btn-success" name="Button" value="Apply"><a class="btn btn-primary" href="posts.php?source=add_post">Add Post</a>
     
           </div>
            <table class="table table-bordered table-hover">
                 <thead>
                <tr>
               <th><input type="checkbox" id="selectAllBoxes"></th>
                             <th>ID</th>
                               <th>Category</th>
                        
                             <th>Title</th>
                             <th>User</th>
                             <!-- <th>User</th>-->
                             <th>Date</th>
                             <th>Image</th>
                             <th>Content</th>
                            <th>Tags</th>
                             <th>comment_count</th>
                              <th>Post Views</th>
                              <th>Status</th>
                               <th>ViewPost</th>
                             <th>Edit</th>
                              <th>Delete</th>
                           
          
                         </tr>
               
                 </thead>
                 
                 <tbody>
                     
                   <?php
					
					 $userquery= "SELECT * FROM users WHERE user_name='{$user}'";
							$userrow=mysqli_query($connection,$userquery);
					 if(!$userrow)
					 {
					die(mysqli_error($connection));
					 }

							$ro=mysqli_fetch_assoc($userrow);

							 $userid=$ro['user_id'];
                     
					

                      if($user=="rajjo")
					  
					  {
						   $query ="SELECT * FROM posts LEFT JOIN users ON posts.userid=users.user_id LEFT JOIN categories ON posts.post_category_id=categories.cat_id"; 
						 //$query ="SELECT posts.post_id, posts.post_category_id, posts.post_title, posts.post_author, posts.post_date, posts.post_image, posts.post_content, posts.post_comment_count, posts.post_tags, posts.userid, posts.post_status,posts.post_views_count, users.user_id, users.user_name, categories.cat_id, categories.cat_title FROM posts LEFT JOIN users ON posts.userid=users.user_id LEFT JOIN categories ON posts.post_category_id=categories.cat_id"; 
						  
						  
					  }
                    else
					{
                     $query ="SELECT posts.post_id, posts.post_category_id, posts.post_title, posts.post_author, posts.post_date, posts.post_image, posts.post_content, posts.post_comment_count, posts.post_tags, posts.userid, posts.post_status,posts.post_views_count, users.user_id, users.user_name, categories.cat_id, categories.cat_title FROM posts LEFT JOIN users ON posts.userid=users.user_id LEFT JOIN categories ON posts.post_category_id=categories.cat_id WHERE posts.userid={$userid}";}
                     //$query="SELECT * FROM posts WHERE userid={$userid}";
                     $posts_query=mysqli_query($connection,$query);
                     
                     while($row=mysqli_fetch_assoc($posts_query))
						 
                     {
                          $post_id = $row['post_id'];
                         $post_category_id = $row['post_category_id'];
                         $post_title = $row['post_title'];
                            $post_author= $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content']; 
                            //$post_comment= $row['post_comment']; 
                            $post_tags = $row['post_tags']; 
                            $post_status = $row['post_status']; 
                         $post_views_count =$row['post_views_count'];
                          $user =$row['userid'];
                          $post_comment_count = $row['post_comment_count']; 
                              $user =$row['userid'];
                          $username=$row['user_name'];
                        $cat_id = $row['cat_id'];       
                       $cat_title = $row['cat_title'];
                         
						  // $userquery= "SELECT * FROM users WHERE user_id=$user";
							//$userrow=mysqli_query($connection,$userquery);
							//$rows=mysqli_fetch_assoc($userrow);

							// $username=$rows['user_name'];

                       //  echo  $username;
                         
             $commentcount="SELECT * FROM comments WHERE comment_post_id=$post_id";
               $comment_count_query=mysqli_query($connection,$commentcount);
           //$count=0;
            
           // while($row=mysqli_fetch_assoc($comment_count_query))
                
           // {
               
               
                 //  $count=++$count;
              
           // }
                 $count=mysqli_num_rows($comment_count_query);
         
                 $countcomment="UPDATE posts SET post_comment_count='$count' WHERE post_id=$post_id";
                 $comment_postcount_query=mysqli_query($connection,$countcomment);
                         
                         
                         
                         
                         echo"<tr>";
                         
                         echo "<td><input type='checkbox' class='checkBoxes' name='arraycheckbox[]' value='{$post_id}'></td>";
                       
                        
                         echo"<td>{$post_id}</td>";
                          
                          $query = "SELECT * FROM categories WHERE cat_id= {$post_category_id}";
                      $select_categories_query = mysqli_query($connection,$query);
                    
                      
                            while($row = mysqli_fetch_assoc($select_categories_query))
                           
                       {
                         $cat_id = $row['cat_id'];       
                      $cat_title = $row['cat_title'];
                         
                         
                          echo"<td> {$cat_title}
                         </td>";
                         
                            
                                
                           }
                          echo"<td>{$post_title}</td>";
                         
                        // if(!empty($post_author))
                       //  {
                            // echo"<td>{$post_author}</td>";
                             
                        // }
                       // elseif(!empty($user))
                       //  {
                             echo"<td>{$username}</td>";
                             
                       //  }
                       //  echo "<td>{$username}</td>";
                             echo"<td>{$post_date}</td>";
                          echo"<td><img class='img-responsive' src='../images/{$post_image}'</td>";
                          echo"<td> {$post_content} </td>";
                   
                            echo"<td> {$post_tags}</td>";
                         
                          
                       
                       
                         
                            echo"<td><a href='comments.php?postid={$post_id}'>{$post_comment_count}</a></td>";
                          echo"<td>{$post_views_count}<a class='btn btn-primary' href='posts.php?post_id={$post_id}'>RESET</a></td>";
                            echo"<td>{$post_status}</td>";
                           echo"<td><a class='btn btn-primary' href='../post.php?post_id={$post_id}'>View Post</a></td>";
        echo"<td><a class='btn btn-info' href='posts.php?source=edit_post&Edit={$post_id}'>EDIT</a></td>";
                          echo"<td><a href='javascript:void(0)' rel='{$post_id}' class='delete_link btn btn-danger'>DELETE</a></td>";
                           echo"</tr>";
                           Reseet();
                     }    ?>

    </tbody>
             </table>
                  </form>  
            
                    <?php
if(isset($_GET['Delete']))
    
{
    
if(isset($_SESSION['role']))
{
   
    
    if($_SESSION['role'] == 'admin')
    {

    
    $postid=mysqli_real_escape_string($connection,$_GET['Delete']);
    
    $query="DELETE FROM posts WHERE post_id={$postid}";
    
    $deletepost=mysqli_query($connection,$query);
    
    header("Location:posts.php");
}
}
}
?>


<script>
    
   $(document).ready(function(){
    
    $(".delete_link").on('click', function(){
        
  var id = $(this).attr("rel");
        
        var delete_url = "posts.php?Delete="+ id  +"";
        
        $(".modal_delete_link").attr("href", delete_url);
        
        $("#myModal").modal('show');
        
       
    });
  
});

</script>

                     
              
                     
                     
             
