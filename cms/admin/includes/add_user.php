
   <?php 

if(isset($_POST['adduser']))
    
{
                          //$post_id = $_POST['post_id'];
                         $username = $_POST['username'];
                         $password = escape($_POST['password']);
                            $firstname= escape($_POST['firstname']);
                             $lastname= escape($_POST['lastname']);
                            //$post_date = $_POST['Date'];
                          // $post_date = date ['d-m-y'];
                           $user_image= $_FILES['userimage']['name'];
                        $user_tempimage = $_FILES['userimage']['tmp_name'];
                            $useremail =escape($_POST['useremail']); 
                            //$post_comment= $row['post_comment']; 
                            $userrole = escape($_POST['userrole']); 
                            
    
    
      $password = password_hash($password,PASSWORD_BCRYPT,array(('cost') =>12));
    move_uploaded_file("$user_tempimage", "../images/$user_image");
    
    $query ="INSERT INTO users(user_name,user_password,user_firstname,user_lastname,user_image,user_email,user_role) VALUES ('$username','$password','$firstname',' $lastname','$user_image','$useremail','$userrole')";
    
    
    $insert_query=mysqli_query($connection,$query);
    
confirm($insert_query);
    
    echo "User Created" . " " ."<a href='././users.php'>View Users</a>";

}
        

?>                     
                        
  
  <form action="" method="post"enctype="multipart/form-data">
  
   <div class="form-group">
   
  <label for="username">Username</label>
    <input type="text" class="form_control" name="username">
    
</div>

 <div class="form-group">
   
  <label for="password">Password</label>
    <input type="password" class="form_control" name="password">
    
   
      </div>
       
         
      
    
<div class="form-group">
  
    <label for="firstname">First Name</label>
    <input type="text" class="form_control" name="firstname">
    
</div>

  
 <!-- <label for="Date">Post Date</label>
    <input type="date" class="form_control" name="Date">
    
</div>-->


  <div class="form-group">
   
   
  <label for="lastname">Last Name</label>
    <input type="text" class="form_control" name="lastname">
    
</div>


<div class="form-group">
    
  <label for="userimage">User
   Image</label>
   
    <!--<img src="../images/<?php// $user_image; ?>" width="100" alt="">-->
    
    <input type="file" class="form_control" name="userimage">
    
</div>
<div class="form-group">
    
  <label for="useremail">Email</label>
    <input type="text" class="form_control" name="useremail">
    
</div>
<div class="form-group">
    
  <label for="userrole">Role</label>
    <!--<input type="text" class="form_control" name="userrole">-->

    <select name="userrole" id="">
        
        <option value="admin">Admin</option>
       <option value="subscriber">Subscriber</option>
        
        
        
    </select>
</div>

<div class="form-group">
    

    <input type="submit" class="btn btn-primary" name="adduser" value="Add User">
    </div>


</form>  
                 




