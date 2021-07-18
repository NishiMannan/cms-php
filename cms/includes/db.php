<?php

$db["db_host"] = 'localhost';
$db["db_user"] = 'root';
$db["db_pass"] = '';
$db["db_name"] = 'cms';
foreach($db as $key => $value)
{
    
   // define("DB_HOST",'localhost');
    
    define(strtoupper($key),$value);
}


$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

//$query = "SET Names utf8";

//mysqli_query($connection,$query);



if($connection)
	
    
{
    echo "successfull";
    
    
}

else
{
	die("Connection failed: " . mysqli_connect_error($connection));
//	echo ("no connection");
}
?>