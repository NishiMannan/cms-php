<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
   <?php


if(isset($_POST['submit']))
 
{
    
    $to="kanta.nishi2526@gmail.com";
      $subject=wordwrap($_POST['subject'],70);
    
    $body=wordwrap($_POST['emailcontent'],70);
    $header="From:" . $_POST['email'];
    
   mail($to,$subject,$body,$header);
        
      $message="Your email has been sent";
    
}
 

  else
   {
       
     $message="";
    
     }

?>

    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <hr>
                <hr>
                <h1>Contact Here</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                       
                       <h5 class="text-center"><?php echo $message;?></h5>
                        
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control " placeholder="Enter your email address here">
                        </div>
                        
                        <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control " placeholder="Enter your subject here">
                            
                            
                        </div>
                        
                         <div class="form-group">
                    
                             <textarea class="form-control" name="emailcontent" id="editor" cols="30" rows="10" placeholder="Enter detail"></textarea>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Contact">
                        
                        
                        
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
 
  
  <hr>

<?php include "includes/footer.php";?>