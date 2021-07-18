     
     <?php ob_start();?>
      <table class="table table-bordered table-hover">
                 <thead>
                     
                         <tr>
                            
                               <th>In Response To</th>
                                <th>Comment_ID</th>
                         <th>Comment_Author</th>
                             <th>Comment_Content</th>
                            
                             <th>Comment_Email</th>
                             
                             <th>Comment_Date</th>
                             <th>Comment_Status</th>
                             <th>Comment_Approved</th>
                             <th>Comment_Disapproved</th>
                         
                             <th>Comment_Delete</th>
                             
                             
                          
                           
          
                         </tr>
               
                 </thead>
                 
                 <tbody>
                     
                   <?php
                     if($_SESSION['username']=="rajjo")
					 {
						 
					 
                     $query ="SELECT * FROM comments";
					 }
					 else
					 {
						 
						  $query="SELECT * FROM posts INNER JOIN comments ON posts.post_id=comments.comment_post_id WHERE userid=".$_SESSION['uid']."";
						 
					 }
					 
					 
                     $comment_query=mysqli_query($connection,$query);
                     
                     while($row=mysqli_fetch_assoc($comment_query))
                     {
                         
                         $comment_id= $row['comment_id'];
                          $commentpost_id = $row['comment_post_id'];
                        
                            $comment_author= $row['comment_author'];
                            $comment_date = $row['comment_date'];
                            $comment_status = $row['comment_status'];
                           
                            $comment_content=$row['comment_content']; 
                         $comment_email=$row['comment_email']; 
                            //$post_comment= $row['post_comment']; 
                          
                           // $comment_count = $row['post_comment_count']; 
                         
                         echo"<tr>";
                       
                         
                          $query = "SELECT * FROM posts WHERE post_id= {$commentpost_id}";
                       $select_comment_query = mysqli_query($connection,$query);
                    
                      
             while($row = mysqli_fetch_assoc($select_comment_query))      
                           
                       {
                          $post_id = $row['post_id'];     
                       $post_title = $row['post_title'];
                         
                         
                          echo"<td><a href='../post.php?post_id={$post_id}'>{$post_title}
                        </a></td>";
                         
                            
                                
                            }
                           echo"<td>{$comment_id}</td>";
                          echo"<td>{$comment_author}</td>";
                         echo"<td>{$comment_content}</td>";
                          echo"<td> {$comment_email}</td>";
                             echo"<td>{$comment_date}</td>";
                         // echo"<td><img class='img-responsive' src='../images/{$post_image}'</td>";
                                  
                          echo"<td> {$comment_status} </td>";
                   
                          
                          //  echo"<td>{$post_comment_count}</td>";
                            echo"<td><a href='comments.php?source=Approved&approved={$comment_id}'>Approved</a></td>";
                         
                         
                          echo"<td><a href='comments.php?source=Declined&declined={$comment_id}'>Declined</a></td>";
                         
        
                         
                          echo"<td><a href='comments.php?Delete={$comment_id}'>DELETE</a></td>";
                           echo"</tr>";
                           
                     }    ?>

    </tbody>
             </table>
                    
                       <?php

if(isset($_GET['approved']))
    
{
    $approved= "Published";
    $commentid=escape($_GET['approved']);
    
   $query="UPDATE comments SET comment_status='$approved' WHERE comment_id=$commentid";
      $approvedcomment=mysqli_query($connection,$query);
    header("Location:comments.php");

   
}
?>
                    <?php

if(isset($_GET['declined']))
    
{
    $declined= "declined";
    $commentid=escape($_GET['declined']);
    
   $query="UPDATE comments SET comment_status='$declined' WHERE comment_id=$commentid";
    
   $declinedcomment=mysqli_query($connection,$query);
    
   
    header("Location:comments.php");
    
    
    
   
}
     ?>
                   
                                                 
                    <?php

if(isset($_GET['Delete']))
    
{
    
    $commentid=escape($_GET['Delete']);
    
   $query="DELETE FROM comments WHERE comment_id={$commentid}";
    
   $deletecomment=mysqli_query($connection,$query);
    
    header("Location:comments.php");
}

?>


                     
                 
                     
                     
             
