<?php
include "db.php";
include "../admin/functions.php";
ob_start();
session_start();



    
if(isset ($_POST['Submit']))
    
{
    $username=$_POST['username'];
     //echo $username;
    $password=$_POST['password'];
    



loginuser($username, $password);
}

?>

