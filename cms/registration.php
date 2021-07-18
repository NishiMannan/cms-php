<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; 
ob_start;

?> 

<?php

function reloadpageonce()
{
	
	echo '<script type="text/javascript">location. reload(); </script>';
	
	
}

?>
<?php
 	include "Pusher/index.php";
//include "Pusher/index1.php";
?>

<?php session_start(); 

?>
<?php ob_start();?>
    <!-- Navigation -->
    
    <?php  //include "includes/navigation.php"; ?>
    
    <br>
    <?php


echo "<br>";

echo "<br>";

   
if(isset($_GET['lang']))
{
	$_SESSION['language']=$_GET['lang'];

	include "includes/languages/".$_SESSION['language'].".php";
//echo "<script type='javascript/text'> location.reload(); </script>";
}
else
{

	include "includes/languages/en.php";
	
}


?>
    
   
    
    
    
   <?php
//if(isset($_POST['submit']))
if($_SERVER['REQUEST_METHOD'] == "POST")
 
{
	
    
    $username=$_POST['username'];
      $email=$_POST['email'];
     $password=$_POST['password'];
    
   
    $error=['username'=>'','email'=>'','password'=>''];
    
 
    
   // if(!empty($username) && !empty($email) && !empty($password))
        
        
   // {
    
      
    
    if(strlen($username)<4)
    {
            $error['username']='Use longer username';
           
        }
    
        
  if($username=='')
{
 $error['username']='Username can not be empty';
           
    }
    
      if(userexist($username))
 
      {
    
      $error['username']="User already exist";
    
      }
    
        if($password=='')
        {
            $error['password']='Password can not be empty';
            
        }
        if($email=='')
        {
            $error['email']='Email can not be empty';
           
        }
        
        
        if(emailexist($email))
            {
            
          
     $error['email']="Email already exist";
   
        }
       // else
        
       // {
   
    
    
foreach($error as $key=>$value)
{

 if(empty($value))
{ 
	 
   unset($error[$key]); 
	
      }
}
    if(empty($error))
    {
       
       registeruser($username, $email, $password);
        loginuser($username, $password);
        
        // else
    }}
        
       // {
//$query ="SELECT randsalt FROM users";
   // $randquery=mysqli_query($connection,$query);
   
  //  if(!$randquery)
        
  //  {
        
       // die("query failed".mysqli_error($connection));
    //}
        
        
//$row=mysqli_fetch_assoc($randquery);

//$randsalt=$row['randsalt'];

 
//$password = crypt($password, $randsalt);
        
      
    
  //else
   //{
       
    // $message="";
    
    
   
  // }

?>

    <!-- Page Content -->
    <div class="container">
    <br>
    <br>
    <br>
    <br>
    <form id="languagechange" method="get">
    	
    	<select name="lang" onchange="locationchange()">
    		<option value="en" <?php if(isset($_GET['lang']) && $_GET['lang']=="en"){echo "selected";}?>>English</option>
    		<option value="pun" <?php if(isset($_GET['lang']) && $_GET['lang']=="pun"){echo "selected";}?>>Punjabi</option>
    	
    	</select>
    	
    
    	
    </form>
   <?php if(isset($_GET['lang'])&&!isset($_SESSION['language']))
   
   {
	   
	  echo $_GET['lang'];
	echo $_SESSION['lang'];
	echo reg;
echo username;
echo Email;
echo Password;
	echo login;
include "includes/languages/".$_GET['lang'].".php";
   }?>
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <hr>
                <hr>
                <h1><?php echo reg; ?></h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                       
                       <h5 class="text-center"><?php //echo $message;?></h5>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="<?php echo username;?>" autocomplete="on"
                           value="<?php echo isset($username) ? $username: '';?>">
                            
                            <p>
                            <?php if(isset($error['username']))
                            {
	//include "Pusher/index.php";
	//include "Pusher/notification.php";
	//include "Pusher/index.php";
	
	
 
                     echo $error['username'];
                            }
								
                            ?>
                           
                            </p>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="<?php echo Email;?>" autocomplete="on" value="<?php echo isset($email) ? $email: '';?>">
                              <p><?php echo isset($error['email']) ? $error['email']: '';?><a href="index.php"><?php echo login;?></a></p>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="<?php echo Password;?>" autocomplete="on">
                            <p><?php echo isset($error['password']) ? $error['password']: '';?></p>
                            
                             
                        </div>
                <br>
                    <input type="submit" name="register" id="btn-login" class="btn btn-custom btn-lg btn-block" value="<?php echo reg;?>">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
 
  
  <hr>

<?php 
		
// include "Pusher/index.php";
		
		include "includes/footer.php";
		
	//	include "Pusher/notification.php";
		
		?>


<script>
	function locationchange(){
		console.log("hello");
	document.getElementById('languagechange').submit();	
		
		
	}
		
		</script>

 
 