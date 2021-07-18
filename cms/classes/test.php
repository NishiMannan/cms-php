<?php

ob_start();
include "../includes/db.php";
function likesdislikes()
	
{
	global $connection;
	$postid=65;
	$uid=329;
	$varr="Notworked";
	$var="worked";
	$query= "SELECT * FROM likes WHERE postid=$postid && userid={$uid}";
	
	$result=mysqli_query($connection,$query);
	
	if(mysqli_num_rows($result) == 1)
		
	{
		
		
		return $var;
		
	}
	
	else
	{
		return $varr;
	}
	
}




//include "../admin/functions.php";
 echo likesdislikes();
 //echo usersonline();
//class Test{
	//function test(){
	
	//echo "test";
	//}
//}
session_start();
echo $_SESSION['username'];
$a="love";
$b="ishanout";
if($_SESSION['username']==$b)
	
{
	echo"I love internal";
	
}
 $reg = array("registeration" => 'register', "username" => 'Nishi', "email" => 'mannan.nishi@gmail.com', "password" => 'abc');

foreach($reg as $key => $value)
{
	define($key,$value);
	
	
}
echo registeration;
echo username;
echo email;
echo password;

function test()
	
{
	$a=1;
	$b=1;
	$result=$a+$b;
	return $result;
}

echo test();
?>

   
   <?php
//if($_GET['cat'])
//{
	echo $_SESSION['language'];
	//header("Location:test.php");
	
//}

?>

	<a href='test.php?cat=asd' class="btn btn-primary" name="registerme">register</a>

	
