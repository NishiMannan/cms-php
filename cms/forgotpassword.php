


<?php 
use PHPMailer\PHPMailer\PHPMailer;?>




<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<?php require 'vendor/autoload.php';?>
<?php //require './classes/Config.php';
	$mail = new PHPMailer();
	
	//echo get_class($mail);
	
	$email = new Config();
	$rt = new Example();
	//echo get_class($email);
   // echo get_class($rt);
	?>

		
<?php
if(ifitismethod('get') && isset(($_GET['forgot'])))
{
    redirect('index.php');
    
}


if(ifitismethod('post'))
{
    if(isset($_POST['email']))
    {
        $emailuser=$_POST['email'];
        
        $length=50;
        
        $token= bin2hex(openssl_random_pseudo_bytes($length));
        
if(emailexist($emailuser))
{
    echo "Email exists";
    
    $stmt=mysqli_prepare($connection,"Update users SET token ='$token' WHERE user_email= ?");
    mysqli_stmt_bind_param($stmt, "s", $emailuser);
    mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);
 
	$mail = new PHPMailer();
	
	//echo get_class($mail);
	
	 $mail->isSMTP();  // Send using SMTP                                        
	$mail->Host = Config::SMTP_HOST;// Set the SMTP server to send through                                                   
    $mail->Username = Config::SMTP_USER; // SMTP username                    
    $mail->Password   = Config::SMTP_PASSWORD; // SMTP password                           
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port = Config::SMTP_PORT; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->SMTPAuth = true;// Enable SMTP authentication  
	$mail->isHTML(true);
	$mail->CharSeT = 'UTF-8';
	$mail->setFrom('mannan.nishi@gmail.com', 'Nishi');
	$mail->addAddress($emailuser);
	$mail->Subject = 'This is first email';
	 
	$mail->Body ="<p>Please click here to reset the password
<a href='http://localhost:8080/cms/resetpassword.php? email={$emailuser} & token={$token}'>RESET</a></p>";
	if($mail->send())
	{
		$emailsent=true;
		
	}
	else{
		
		echo "Not Sent";
	}
		
}
}
}
if(isset($emailsent))
{
	echo "<div class='text-center'><h1>Email Sent</h1><br><h2>Please check your email and follow the link<br>Thankyou!!</h2></div>";
	
	
}
else{

?>

<!-- Page Content -->
<div class="container">

    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">


                                <h3><i class="fa fa-lock fa-4x"></i></h3>
                                <h2 class="text-center">Forgot Password?</h2>
                                <p>You can reset your password here.</p>
                                <div class="panel-body">




                                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                                <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                        </div>

                                        <input type="hidden" class="hide" name="token" id="token" value="">
                                    </form>

                                </div><!-- Body-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <hr>

    <?php include "includes/footer.php";?>

</div>


<?php
	}
?> <!-- /.container -->

