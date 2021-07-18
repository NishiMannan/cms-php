     
     <?php ob_start();
     
     if($_SESSION['username']!="rajjo")
	 
	 
	 {
		 
		echo "<h1> This data is not available to you </h1>";
	 }
		    else
     
			{
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
                            <th>Subscriber</th>
                              <th>Adminr</th>
                             <th>Edit</th>
                              <th>Delete</th>
                           
          
                         </tr>
               
                 </thead>
                 
                 <tbody>
                     
                   <?php
                     
                     $query ="SELECT * FROM users";
                     
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
                         ?>
                         <td>
                         
                         <form method="post">
                             <input type="hidden" name="role" value="<?php echo $user_id; ?>">
                             
                             <input type="submit" name="subscriber" class="btn btn-info" value="Subscriber">
                             
                             </form></td>
                         
                         
                         
                         <?php
                         
                          //echo"<td><a href='users.php?subscribe=            {$user_id}'>Subscriber</a></td>";
                          
                         
                              echo"<td><a class='btn btn-primary' href='users.php?admin={$user_id}'>Admin</a></td>";
        echo"<td><a class='btn btn-primary' href='users.php?source=edit_user&Edit={$user_id}'>EDIT</a></td>";
                          echo"<td><a class='btn btn-danger' onclick=\"javascript: return confirm('Are you sure you want to delete'); \"href='users.php?Delete={$user_id}'>DELETE</a></td>";
                           echo"</tr>";
                           
                     }    ?>

    </tbody>
             </table>
                                    <?php

if(isset($_POST['subscriber']))
    
{
    
    $userid=escape($_POST['role']);
    
    $query="Update users SET user_role='subscriber' WHERE user_id={$userid}";
    
    
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
}}

?>





                     
                 
                     
                     
             
