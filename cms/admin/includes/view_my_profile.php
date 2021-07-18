     
     <?php ob_start();

     $user=  $_SESSION['username'];
  $uid=  $_SESSION['uid'];
      
      ?>
     
      <table class="table table-bordered table-hover">
                 <thead>
                     
                         <tr>
                             <th>ID</th>
                              <th>User Name</th>
                              <th>User Password</th>
                               <th>User FirstName</th>
                        
                             <th>User LastName</th>
                             
                             <th>Email</th>
                             <th>Image</th>
                             <th>User Role</th>
                           
                             <th>Edit</th>
                              <th>Delete</th>
                           
          
                         </tr>
               
                 </thead>
                 
                 <tbody>
                     
                   <?php
                     
                     $query ="SELECT * FROM users WHERE user_id= $uid";
                     
                     $users_query=mysqli_query($connection,$query);
                     
                     while($row=mysqli_fetch_assoc($users_query))
                     {
                          $user_id = $row['user_id'];
                         $username = $row['user_name'];
                         $user_firstname = $row['user_firstname'];
                            $user_lastname= $row['user_lastname'];
                         $user_password= $row['user_password']; 
                            $user_image = $row['user_image'];
                            $user_role = $row['user_role']; 
                            //$post_comment= $row['post_comment']; 
                            $user_email= $row['user_email']; 
                             
                         
                         echo"<tr>";
                         echo"<td> {$user_id} </td>";
                          
                          
                          echo"<td>{$username}</td>";
                         echo"<td>{$user_password}</td>";
                             echo"<td>{$user_firstname}</td>";
                         echo"<td> {$user_lastname} </td>";
                         
                         echo"<td> {$user_email}</td>";
                        
                          echo"<td><img class='img-responsive' src='../images/{$user_image}'</td>";
                          
                   
                            echo"<td> {$user_role}</td>";
                          echo"<td><a href='users.php?subscribe=            {$user_id}'>Subscriber</a></td>";
                              echo"<td><a href='users.php?admin={$user_id}'>Admin</a></td>";
        echo"<td><a href='profile.php?source=edit_profile&Edit={$user_id}'>EDIT</a></td>";
                          echo"<td><a href='profile.php?Delete={$user_id}'>DELETE</a></td>";
                           echo"</tr>";
                           
                     }    ?>

    </tbody>
             </table>
                                    <?php

if(isset($_GET['subscribe']))
    
{
    
    $userid=escape($_GET['subscribe']);
    
    $query="Update users SET user_role='subscribe' WHERE user_id={$userid}";
    
    
    $rolequery=mysqli_query($connection,$query);
    
    header("Location:users.php");
}

?>
                    
                                    <?php

if(isset($_GET['admin']))
    
{
    
    $userid=escape($_GET['admin']);
    
    $query="Update users SET user_role='admin' WHERE user_id={$userid}";
    
    $rolequery=mysqli_query($connection,$query);
    
    header("Location:users.php");
}

?>

                    
                    
                    <?php

if(isset($_GET['Delete']))
    
{
    
    $userid=escape($_GET['Delete']);
    
    $query="DELETE FROM users WHERE user_id={$userid}";
    
    $deletepost=mysqli_query($connection,$query);
    
    header("Location:./users.php");
}

?>


                     
                 
                     
                     
             
