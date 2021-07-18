
   <?php 
        
     $session=session_id();
        $time = time();
        
        $time_out_in_seconds=60;
        $time_out= $time-$time_out_in_seconds;
        
    $sesquery="SELECT * FROM users_online WHERE session = '$session'";
        $insquery=mysqli_query($connection, $sesquery);
        
        $count=mysqli_num_rows($insquery);
        
        if($count == NULL)
            
            
        {
        
             $inssessionquerry="INSERT INTO users_online (session, time) VALUES('{$session}', '{$time}')";
        $querys=mysqli_query($connection,$inssessionquerry);
            
        }
        
        else{
            
             $updatesessionquerry="UPDATE users_online SET time='{$time}' WHERE session='{ $session}'";
        $queryt=mysqli_query($connection,$updatesessionquerry);
            
        }
        
         $selectsessionquerry="SELECT * FROM users_online WHERE time <   '{$time}'";
        $queryy=mysqli_query($connection,$selectsessionquerry);
        $usercount=mysqli_num_rows($queryy);
        
        

$eg["name"]='Nishi';
$eg["user"]='Neeraj';


foreach($eg as $key=>$value)
    
{
    
    define($key, $value);
}

echo name;
 echo user;

?>