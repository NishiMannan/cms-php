<?php ob_start();

?>
<?php

function escape($string)

{
   global $connection;
    
    return mysqli_real_escape_string($connection,trim($string));
    
    
}


?>
  
  <?php

function totallikes($postid
				   )
{
	
	               global $connection;
				   $query="SELECT * FROM posts WHERE post_id=$postid";
				   $execute=mysqli_query($connection,$query);
				   $fetch=mysqli_fetch_assoc($execute);
				   $likes=$fetch['likes'];
	               return $likes;

}

?>
  
  <?php
 
						 
						 function imagedisplay($post_image='')
						 {
							 if(!($post_image))
								 
					 {
							  return 'bmw.png';
							 
							 
						 }
							 
							 else {
								 
							return $post_image;
						 
					 }

						 }



?>
  
   <?php

function redirect($location)
    
    
{
    
 //return header("Location" :$location);
    header("Location:$location");
    exit;
}



?>
   <?php



function likesdislikes($postid,$uid)
	
{
	global $connection;
	$varr="Notworked";
	$var="worked";
	$query="SELECT * FROM likes WHERE postid={$postid} && userid={$uid}";
	
	$result=mysqli_query($connection,$query);
	
	if(mysqli_num_rows($result) >= 1)
		
	{
		
		
		return true;
		
	}
	
	else
	{
		return false;
	}
	
}



?>   
      
<?php

function ifitisMethod($method=null)
{
    
   if($_SERVER['REQUEST_METHOD'] == strtoupper($method)) 
   {
       
      return true; 
       
   }
    return false;
    
}

function isLoggedin()
    
{
  
    if(isset($_SESSION['role']))
    {
       return true; 
    }  
    
    return false;
}


function checkifuserloggedinAndRedirect($redirectLocation=null)
        
{
    
    if(isLoggedin())
    {
        redirect($redirectLocation);
        
        
    }
    
    
}

?>
       
       
       
       
       <?php 
        function usersonline()
            
            
        {
           
            global $connection;
            
   if(isset($_GET['usersonline']))
{
             if(!$connection)
             {
            include "../includes/db.php";
            session_start();
     $sessions = session_id();
       
        $time = time();
        
        $time_out_in_seconds = 05;
        $time_out= $time-$time_out_in_seconds;
         $sesquery="SELECT * FROM users_online WHERE session = '$sessions'";
        $insquery=mysqli_query($connection, $sesquery);
        
        $count=mysqli_num_rows($insquery);
        
        if($count == NULL)
            
            
        {
        
 $inssessionquerry="INSERT INTO users_online(session,time) VALUES('{$sessions}','$time')";
        $querys=mysqli_query($connection,$inssessionquerry);
            
        }
        
        else{
            
             $updatesessionquerry="UPDATE users_online SET time = '$time' WHERE session = '$sessions'";
        $queryt=mysqli_query($connection,$updatesessionquerry);
            
        }
        
         $selectsessionquerry="SELECT * FROM users_online WHERE time >   '$time_out'";
        $queryy=mysqli_query($connection,$selectsessionquerry);
                 
          echo $usercount=mysqli_num_rows($queryy);
        
        }}}



?>

<?php usersonline();?>

<?php
function confirm($result)
{
    global $connection;
    if(!$result)
        
    {
       die("Query Failed".mysqli_error($connection));
        
        
    }
}
    
?>


  
    <?php

function insert_category()//to insert values
{
global $connection;
                        if(isset($_POST['Submit']))
                        {
                            
                    
                           $cat_title=$_POST['cat_title'];
                            
                            if($cat_title== "" ||empty($cat_title))
                            {
                                
                              $status="No entry";
                                echo $status;
                            }
                        
                           // echo $status;
                            else
                            {
                                
                                $query= mysqli_prepare($connection, "INSERT INTO categories(cat_title) VALUES (?)");
                             mysqli_stmt_bind_param($query,"s",$cat_title);
                                mysqli_stmt_execute($query);
                          // $query = "INSERT INTO categories(cat_title)";         
                        //  $query .= "VALUES('{$cat_title}')";
                                
                           //$insert_query=mysqli_query($connection,$query);
                                
                                if(!$query)
                               {
                                    
                                   die("queryfailed".mysqli_error($connection));
                                }
                            
                            }
                        }

                        ?>
                 
                     
               
                   <div class="col-xs-6">
     
                          <form action="" method="post">
                         <div class= "form-group">
                             <label for="cat_title">Add Category</label>
                         <input class= "form-control" type="text" name="cat_title">
                              </div> 
                        <div class= "form-group">
                         <input class= "btn btn-primary" type="submit" name="Submit" value="Add Categories">
                             </div>
                     </form>
                     
                  <?php }
                       ?>
                    
                    
                    
                    
                     <?php            
                       
                       function update_category() //Updating Categories
                       {
                           
                           global $connection;
                       if(isset($_GET['edit']))
                           
                       {
                           $cat_id = $_GET['edit']; ?>
                        
                        <div class="col-xs-6">
     
                          <form action="" method="post">
                         <div class= "form-group">
                             <label for="cat_title">Edit Category</label>
                             
                              <?php
                            
                           
                                
                                 $query = mysqli_prepare($connection, "SELECT cat_id, cat_title FROM categories WHERE cat_id= ?");
                      mysqli_stmt_bind_param($query, 'i', $cat_id);
                    
                      mysqli_stmt_execute($query);
                      mysqli_stmt_bind_result($query, $catid, $cat_title);
                         if(!$query)
                         {
                             mysqli_error($connection);
                         }
                         while(mysqli_stmt_fetch($query)){
                           
                       //{
                          //$cat_id = $row['cat_id'];       
                       //$cat_title = $row['cat_title'];
                               ?>
                               
                               <input value = "<?php echo $cat_title?>" class="form-control" type="text" name="cat_title">
                               
                               
                          
                               
                                <?php }?>  
                            
                                  <?php
                              if(isset($_POST['Edit']))
                              {
                                   $cat_title= $_POST['cat_title'];
                                   
                              
                            
                                 $queryupdate = mysqli_prepare($connection, "UPDATE categories SET cat_title = ? WHERE cat_id = ? ");
                                 
                                  mysqli_stmt_bind_param($queryupdate, "si", $cat_title, $cat_id);
                                  mysqli_stmt_execute($queryupdate);
                                
                                if(!$queryupdate)
                                {
                                     
                                    die("Query Failed". mysqli_error($connection));
                                }
                                 
                                 
                                 
                             }
                   
                              
                  ?>    
                                 
                           
                                </div> 
                        <div class= "form-group">
                         
                                
                         <input class= "btn btn-primary" type="submit" name="Edit" value="Update">
                            
                           
                             </div>
                             
                             
                             
                     </form>
                     
                        </div>
                    
                 
                 
              <?php }?>
                  
                     
                        </div> 
                    
                              <?php }?>
                  
                  
               
                             
                             <?php
                           
                function selecting_category() //selecting all categories
                {
                     global $connection;
               
                      
                       $query = "SELECT * FROM categories";
                       $select_categories_query = mysqli_query($connection,$query);
                    
                      
                            while($row = mysqli_fetch_assoc($select_categories_query))
                           
                       {
                       $cat_id = $row['cat_id'];       
                       $cat_title = $row['cat_title'];
                    echo"<tr>";
                        echo "<td>{$cat_id}</td>";
                         echo "<td>{$cat_title}</td>";
								
								
								if($_SESSION['username']=="rajjo")
								{
                                echo "<td><a href = 'categories.php?delete={$cat_id}'>Delete</a></td>"; 
                                
                                echo "<td><a href = 'categories.php?edit={$cat_id}'>Edit</a></td>"; 
								}
                                echo "</tr>";
                                
                       }}
                          ?>
                         
                           
                           
                       
                          <?php 
                            

                        function delete_category()//delete category
                         {
                           
                           global $connection;
               
                           if(isset($_GET['delete']))
                               
                           {
                              $cat_id =$_GET['delete'];
                            
                        
                           
                           $query = "DELETE FROM categories WHERE cat_id=$cat_id";
                           
                           $delete_query =mysqli_query($connection,$query);
                               
                           if(!$delete_query)
                                {
                                    
                                    die("queryfailed".mysqli_error($connection));
                                }
                           
                       header("Location: categories.php");
                           }
                   
}
                           ?>
                       
                       

  <?php

function Reseet()
{
    global $connection;
     if(isset($_GET['post_id']))
     {
         
         $post_id=$_GET['post_id'];
          $resetposts="UPDATE posts SET post_views_count=0 WHERE post_id={$post_id}";
            $postcount=mysqli_query($connection,$resetposts);
             header("Location: posts.php");             
     }
}
                        
?>
             <?php
                   function Countnum($table)
                    {
    
    
                     global $connection;
                     $query="SELECT * FROM $table WHERE userid=".$_SESSION['uid']."";
                     $countnum=mysqli_query($connection,$query);
                     $countrows=mysqli_num_rows($countnum);
                  
                    return $countrows;
                   }
                    ?>
                    <?php
                   function Countcat($table)
                    {
    
    
                     global $connection;
                     $query="SELECT * FROM posts INNER JOIN $table ON posts.post_category_id=$table.cat_id WHERE posts.userid=".$_SESSION['uid']."";
                     $countnum=mysqli_query($connection,$query);
                     $countrows=mysqli_num_rows($countnum);
                  
                    return $countrows;
                   }
                    ?>
                     <?php
                   function Countgeneral($table)
                    {
    
    
                     global $connection;
                     $query="SELECT * FROM $table";
                     $countnum=mysqli_query($connection,$query);
                     $countrows=mysqli_num_rows($countnum);
                  
                    return $countrows;
                   }
                    ?>
                      <?php
                   function Countcomment($table)
                    {
    
    
                     global $connection;
					  $query="SELECT * FROM posts INNER JOIN $table ON posts.post_id=comments.comment_post_id WHERE userid=".$_SESSION['uid']."";
                     $countnum=mysqli_query($connection,$query);
                     $countrows=mysqli_num_rows($countnum);
                  
                    return $countrows;
                   }
                    ?>
                    
                    
                    
                    
                    
                    
                    
                    
                    
 <?php 

                  function poststatus($table,$status,$value)
                  {
                     global $connection;
                    $query="SELECT * FROM $table WHERE $status='$value' && userid=".$_SESSION['uid']."";
                     $postdisplay=mysqli_query($connection,$query);
                   $countpd=mysqli_num_rows($postdisplay);
                      
                     return $countpd;
                  }
                   
                    ?>
                    
                    
                    <?php 

                  function commentstatus($table,$status,$value)
                  {
                     global $connection;
			$query="SELECT * FROM posts INNER JOIN $table ON posts.post_id=comments.comment_post_id WHERE comments.$status='$value' && posts.userid=".$_SESSION['uid']."";
                     $countnum=mysqli_query($connection,$query);
					   
					
                   $countpd=mysqli_num_rows($countnum);
                      
                     return $countpd;
                  }
                   
                    ?>
                      <?php 

                  function userstatus($table,$status,$value)
                  {
                     global $connection;
					 
                    $queryuser="SELECT * FROM $table WHERE $status='$value'";
                     $userdisplay=mysqli_query($connection,$queryuser);
                   $countpd=mysqli_num_rows($userdisplay);
                      
                     return $countpd;
                  }
                   
                    ?>
                    
                    
                    
                  
                   <?php
            function isadmin()
                 {
    
           global $connection;

         if(isset($_SESSION['role']))
   
         {
       if($_SESSION['role']=="subscriber")
           
       {
           header("Location:../admin/indexsubscriber.php");
          //return true;
       }
      
      // else
       //{
           
          // return false;
       //}
   }
     if(empty($_SESSION['role']))
     {
           header("Location:../index.php");
         
     }

}

?>
                   
              <?php

               function userexist($username)
                {
                   
                     global $connection;

                     $query="SELECT user_name FROM users WHERE user_name='$username'";
                     $user=mysqli_query($connection,$query);
                   
                   if(mysqli_num_rows($user)>0)
                   {
                       return true;
                   }
                   else
                   {
                       return false;
                   }

                 }

                 ?>
 
              <?php

               function emailexist($email)
                {
                   
                     global $connection;

                     $query="SELECT user_email FROM users WHERE user_email='$email'";
                     $user=mysqli_query($connection,$query);
                   
                   if(mysqli_num_rows($user)>0)
                   {
                       return true;
                   }
                   else
                   {
                       return false;
                   }

                 }

                 ?>
                 
                
                                
          <?php

               function registeruser($username, $email, $password)
                {
                   
                     global $connection;

                    $username=trim($username);
                    $password=trim($password);
                     $email=trim($email);
                    $username = mysqli_real_escape_string($connection,$username);
                    $password =  mysqli_real_escape_string($connection,$password);
                    $email=  mysqli_real_escape_string($connection,$email);
  
    $password = password_hash($password,PASSWORD_BCRYPT,array('cost' =>12));  
        
     $regquery="INSERT INTO users(user_name, user_password, user_email, user_role) VALUES('{$username}', '{$password}', '{$email}', 'subscriber')";   
        $reginsertquery=mysqli_query($connection,$regquery);
    
  if(!$reginsertquery)                 
        
{
 die("queryfailed".mysqli_error($connection). "" .mysqli_errno($connection));
        
}
        
       // $message="Your Registeration has been submitted";
    
//}//}//}
    
 // else{
            
       // $message="Fields can not be empty";
 
     // }
  
        
    }

    
                 ?>
                 
                
                                       
          <?php

               function loginuser($username, $password)
                {
                   
                     global $connection;

                    $username=trim($username);
                    $password=trim($password);
                    
                    $username = mysqli_real_escape_string($connection,$username);
                    $password =  mysqli_real_escape_string($connection,$password);
                   
                   
                   
                   $query = "SELECT * FROM users WHERE user_name = '{$username}'";
$loginquery = mysqli_query($connection,$query);

if(!$loginquery)
    

    {
        die("queryfailed". mysqli_error($connection));
    }


    while($row = mysqli_fetch_assoc($loginquery))
        
    {
        
     
        $uname= $row['user_name'];
       
        $uid= $row['user_id'];
          $upassword= $row['user_password'];
         $ufirstname= $row['user_firstname'];
         $ulastname= $row['user_lastname'];
        $urole= $row['user_role'];
    
    

    //echo $upassword;
      // $password = crypt($password, $upassword); 

//echo $password;
   if(password_verify($password,$upassword))
     //  if($uname  === $username && $upassword === $password)
            
            
    {
            $_SESSION['uid']= $uid;
           
            $_SESSION['username']= $uname;
            $_SESSION['firstname']= $ufirstname;
            $_SESSION['lastname']= $ulastname;
             $_SESSION['role']= $urole;
           
   
      
          header("Location:/cms/admin/index.php");
       
       
       
       }
        
        else
        {
            
            echo "<br>";
             echo "<br>";
             echo "<br>";
        echo "Entries not found";
 redirect('/cms/betterlogin.php');
                   
                   
                
            
            
            
        }

    }
      // else
            
  // {
         //header("Location:../index.php");
            
      //}

//echo "Entries not found";
?>
<!--<a href="./index.php">GO BACK TO LOGIN</a>-->


        
 <?php   }?>

    
               