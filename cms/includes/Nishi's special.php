<?php
include "db.php";

ob_start();
session_start();
echo $_SESSION['username'];

if(isset ($_POST['Submit']))
    
{
    $username=$_POST['username'];
     //echo $username;
    $password=$_POST['password'];
   // $username=mysqli_real_escape_string($connection,$username);
   //$password=mysqli_real_escape_string($connection,$password);

}


$query = "SELECT * FROM users WHERE user_name = '{$username}'";
$loginquery = mysqli_query($connection,$query);

if(!$loginquery)
    

    {
        die("queryfailed". mysqli_error($connection));
    }
    
    while($row = mysqli_fetch_assoc($loginquery))
        
    {
        
      $uname= $row['user_name'];
       
       
          $upassword= $row['user_password'];
         $ufirstname= $row['user_firstname'];
         $ulastname= $row['user_lastname'];
        $urole= $row['user_role'];
        
        //echo $uname;
       //     echo $upassword;
    
    }
    
        
       if($uname  == $username && $password == $upassword && $urole == "admin")
            
            
    {
            
   
      
          header("Location:../admin/index.php?uname=$username");
       }
        
else if($uname == $username && $upassword == $password && $urole == "subscribe")
            
  {
            
echo $urole ;
  
  }   

        
          else
            
   {
      
          
         header("Location:../index.php");
            
      }
   

?>