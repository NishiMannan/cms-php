<?php


if(isset($_GET['Edit']))
    
    
{

    $user_id=escape($_GET['Edit']);
    
  
 
    

    $query ="SELECT * FROM users WHERE user_id={$user_id}";
    
                     
                     $user_query_edit=mysqli_query($connection,$query);
    
    if(!$user_query_edit)
        
    {
       
        echo("query failed".mysqli_error($connection));
    }
   
                     
                     while($row=mysqli_fetch_assoc($user_query_edit))
                     {
                          
                          $user_id = $row['user_id'];
                     
                         $username = $row['user_name'];
                         $password = $row['user_password'];
                            $firstname= $row['user_firstname'];
                             $lastname= $row['user_lastname'];
                            $userimage= $row['user_image'];
                           
                            $useremail =$row['user_email']; 
                           
                            $userrole = $row['user_role']; 
                            
                     }

    //$query ="SELECT randsalt FROM users";
  //  $randquery=mysqli_query($connection,$query);
    
   // if(!$randquery)
        
   // {
        
       // die("query failed".mysqli_error($connection));
   // }
        
        
//$row=mysqli_fetch_assoc($randquery);

//$randsalt=$row['randsalt'];

 
//$password = crypt($password,$randsalt);

    
   

if(isset($_POST['edituser']))
    
{
  
                           $uname = escape($_POST['username']);
                            $upassword = escape($_POST['password']);
                            $ufirstname= escape($_POST['firstname']);
                          $ulastname =escape($_POST['lastname']); 
                          // $post_date = date ['d-m-y'];
                             = $_FILES['user_image']['name'];
                            $user_tempimage = $_FILES['user_image']['tmp_name'];
                           
                            //$post_comment= $row['post_comment']; 
                            $uemail = escape($_POST['useremail']); 
                            $urole = escape($_POST['userrole']); 
    
    // $query ="SELECT randsalt FROM users";
    //$randquery=mysqli_query($connection,$query);
   // $row=mysqli_fetch_assoc($randquery);
   

//$randsalt=$row['randsalt'];

 
//$upassword = crypt($upassword,$randsalt);
    if(!empty($password))
   {
        
        if(empty($upassword))
        {
            $upassword=$password;
            $queryup = "UPDATE users SET user_name='$uname', user_password='$upassword', user_firstname='$ufirstname', user_lastname='$ulastname', user_image='$user_image', user_email='$uemail', user_role='$urole' WHERE user_id={$user_id}";
                     $query_updatings= mysqli_query($connection, $queryup);             
            if(!$query_updatings)
                                {
                                     
                                    die("Query Failed". mysqli_error($connection));
                                }
                                 
                                 
        }
        
    if($password!=$upassword)
{
    $upassword = password_hash($upassword,PASSWORD_BCRYPT,array('cost' =>12));
move_uploaded_file("$user_tempimage","../images/$user_image");
    if(empty($user_image))
    {
        
        $query="SELECT * FROM users WHERE user_id=$user_id";
            
    $imagecheck=mysqli_query($connection,$query);
        
        while($row=mysqli_fetch_assoc($imagecheck))
        {
          $user_image=$row['user_image']; 
            
        
    }
    }
$query = "UPDATE users SET user_name='$uname', user_password='$upassword', user_firstname='$ufirstname', user_lastname='$ulastname', user_image='$user_image', user_email='$uemail', user_role='$urole' WHERE user_id={$user_id}";
                                 
                                 $query_updating= mysqli_query($connection, $query);
                                if(!$query_updating)
                                {
                                     
                                    die("Query Failed". mysqli_error($connection));
                                }
                                 
                                 
                                 
                             }




        
        
}
    
    
echo "USER UPDATED" . "" . "<a href='users.php'>View All Users</a>";
}


}
    
  ?>
  

 

<form action="" method="post"enctype="multipart/form-data">
  
   <div class="form-group">
   
  <label for="username">User Name</label>
    <input value= "<?php echo $username;?>" type="text" class="form_control" name="username">
    
</div>
 
  <div class="form-group">
   
  <label for="password">Password</label>
   <input value= "" autocomplete="off" type="password" class="form_control" name="password">
      
    </div>


<div class="form-group">
  
    <label for="firstname">Firstname</label>
    <input value="<?php echo $firstname;?>"type="text" class="form_control" name="firstname">
    
</div>


  <div class="form-group">
   
   
  <label for="lastname">Lastname</label>
    <input value="<?php echo $lastname;?>"type="text" class="form_control" name="lastname">
    
</div>


<div class="form-group">
    
  <label for="user_image">
   Image</label>
    <img src="../images/<?php echo $userimage;?>" width="100" alt=""> 
   <input type="file" class="form_control" name="user_image">
</div>
<div class="form-group">
    
  <label for="useremail">Email</label>
    <input value="<?php echo $useremail;?>" type="text" class="form_control" name="useremail">
    
</div>
<div class="form-group">
    
  <label for="userrole">Role </label>
  <select name="userrole" id="">
  <option value="<?php echo $userrole;?>"><?php echo "Select Role"; ?></option>
      <option value="<?php echo $userrole;?>"><?php echo $userrole; ?></option>
      <?php
      if($userrole!="admin")
      {
      ?>
        <option value="admin">Admin</option>
        <?php
      }  
        
      else
    
        {
      
      ?>
          <option value="subscriber">Subscriber</option>
          
      <?php
        
        
        }
      ?>
      
   <!-- <input value="<?php //echo $userrole;?>" type="text" class="form_control" name="userrole">-->
   </select>  
</div>

<div class="form-group">
          

    <input type="submit" class="btn btn-primary" name="edituser" value="Update User">
    </div>


</form>  
     
                           












    


                
                 

 