<?php

 include "../includes/db.php"; 

if(isset($_POST['submit']))
{
    
    $pass=$_POST['password'];
     $user=$_POST['username'];
     $email=$_POST['email'];
$query ="SELECT randsalt FROM users";
    $randquery=mysqli_query($connection,$query);
    
    if(!$randquery)
        
    {
        
        die("query failed".mysqli_error($connection));
    }
$row=mysqli_fetch_assoc($randquery);
$randsalt=$row['randsalt'];
              


         echo $randsalt;
    
    $password=crypt($pass,$randsalt);
    $query="INSERT INTO users(user_password, user_name, user_email, user_role) VALUES('{$password}', '{$user}', '{$email}', 'subscriber')";
    $insquery=mysqli_query($connection,$query);
    
    
    if(!$insquery)
        
{
 die("queryfailed".mysqli_error($connection). "" .mysqli_errno($connection));
        
}
}
?>


<form action="" method="post">
    
    <input type="password" name="password">
    <input type="text" name="username">
    <input type="text" name="email">
    
    <input type="submit" name ="submit" value="click">
    
    
    
</form>