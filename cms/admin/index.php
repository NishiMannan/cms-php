<?php 

include "includes/admin_header.php";

include "functions.php";
//session_start();
ob_start();
isadmin();


    ?>

<body>

    <div id="wrapper">
    
  
   
<?php include "includes/admin_navigation.php";
        
        
?>
       
           
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                     
                            
                        <h1 class="page-header">
                       Welcome To Admin 
                            <small><?php
								
								
								
				$_SESSION['username'];
                    echo $_SESSION['username'];
								"<br>";
					$Realadmin="rajjo";		
					
								?>
								
                       </small>
                        </h1>
                    
                        
                    </div>
                </div>
                <!-- /.row -->
                
                
                
                
                       
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    
                    <?php
				if($_SESSION['username']==$Realadmin)
 
					{
						
					 $countp=Countgeneral("posts");	
				     $countc=Countgeneral("comments");
					 $countu=Countgeneral("users");	
					 $countca=Countgeneral("categories");
					 $countpd=userstatus("posts","post_status","Drafted");
					$countusub=userstatus("users","user_role","subscriber");
				$countcdraft=userstatus("comments","comment_status","Drafted");
				$countcpublished=userstatus("comments","comment_status","Published");
				 $countap=userstatus("posts","post_status","Published");
					}
					
					else
					{
						
					
						
					 $countp=Countnum("posts");	
				     $countc=Countcomment("comments");
					 //$countu=Countgeneral("users");	
					 $countca=Countcat("categories");
					 $countpd=poststatus("posts","post_status","Drafted");
					//$countusub=userstatus("users","user_role","subscriber");
				$countcdraft=commentstatus("comments","comment_status","Drafted");
				$countcpublished=commentstatus("comments","comment_status","Published");
				 $countap=poststatus("posts","post_status","Published");
					}
						
						
					?>	
						
						
						
			
				
                    
                    
                    <?php 
                    
                   // $countp=Countnum("posts");
                    //$query="SELECT * FROM posts";
                   //$countposts=mysqli_query($connection,$query);
                   // $countp=mysqli_num_rows($countposts);
                    //$countp=0;
                    //while($row=mysqli_fetch_assoc($countposts))
                    //{
                     //  $countp=++$countp;
                        
                        
                   //}
                    
                    ?>
                    
                  
                    <div class="col-xs-9 text-right">
                  <div class='huge'><?php echo $countp;?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    
                     
                    <div class="col-xs-9 text-right">
                     <?php 
                    //$countc=Countcomment("comments");
                   // $query="SELECT * FROM comments";
                    //$countcomments=mysqli_query($connection,$query);
                   // $countc=mysqli_num_rows($countcomments);
                   //$countc=0;
                    //while($row=mysqli_fetch_assoc($countcomments))
                   // {
                       //$countc=++$countc;
                        
                        
                    //}
                  
                    ?>
                     <div class='huge'><?php echo $countc;?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                    
                       <?php 
                   // $countu=Countgeneral("users");
                    //$query="SELECT * FROM users";
                   // $countusers=mysqli_query($connection,$query);
                   // $countu=mysqli_num_rows($countusers);
                    //$countu=0;
                    //while($row=mysqli_fetch_assoc($countusers))
                    //{
                       //$countu=++$countu;
                        
                        
                    //}
                  
                    ?>
                    <?php
						if($_SESSION['username']==$Realadmin)
 
						
						{
						
						?>
                    <div class='huge'><?php echo $countu;?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div> 
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                       <?php
											 
											 
					   }
						
						?>
                            <?php 
                        // $countca=Countcat("categories");
                   // $query="SELECT * FROM categories";
                   // $countcat=mysqli_query($connection,$query);
                    //$countca=mysqli_num_rows($countcat);
                    
                    ?>
                        <div class='huge'><?php echo $countca;?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
                
                
                
                 <?php 
                
                //$countpd=poststatus("posts","post_status","Drafted");
                     //$query="SELECT * FROM posts WHERE post_status='Drafted'";
                    // $postsdraft=mysqli_query($connection,$query);
                    //$countpd=mysqli_num_rows($postsdraft);
                   // $countpd=0;
                    //while($row=mysqli_fetch_assoc($postsdraft))
                   // {
                      // $countpd=++$countpd;
                        
                        
                    //}
                    
                    ?>
                    <?php 
                
                 //$countusub=userstatus("users","user_role","subscriber");
                 //$query="SELECT * FROM users WHERE user_role='subscriber'";
               //  $usersub=mysqli_query($connection,$query);
               // $countusub=mysqli_num_rows($usersub);
                   // $countusub=0;
                    //while($row=mysqli_fetch_assoc($usersub))
                   // {
                       //$countusub=++$countusub;
                        
                        
                  //  }
                    
                    ?>
                    <?php 
                 //$countcdraft=commentstatus("comments","comment_status","Drafted");
				//$countcpublished=commentstatus("comments","comment_status","Published");
                   // $query="SELECT * FROM comments WHERE comment_status='Drafted'";
                    //$commentdraft=mysqli_query($connection,$query);
                    //$countcdraft=mysqli_num_rows($commentdraft);
                   // $countcdraft=0;
                  //  while($row=mysqli_fetch_assoc($commentdraft))
                    //{
                     //  $countcdraft=++$countcdraft;
                        
                        
                    //}
                    
                    ?>
                    
                            <?php 
                 //$countap=poststatus("posts","post_status","Published");
                   // $query="SELECT * FROM posts WHERE post_status='Published'";
                  //  $countqap=mysqli_query($connection,$query);
                    //$countap=mysqli_num_rows($countqap);
                    
                    ?>
       
     <div class="row">
        
        <?php
		 
		if($_SESSION['username']==$Realadmin)
		 {?>
			 
			  <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
            
            
            <?php
            
             $element_text = ['All Posts', 'Active Posts', 'Drafted Posts', 'Categories', 'Users', 'Subscriber Users', 'Comments', 'Drafted Comments', 'Published Comments'];
             $element_count = [$countp, $countap, $countpd, $countca, $countu, $countusub, $countc, $countcdraft, $countcpublished]; 
            
            for($i =0;$i <9;$i++)
                
            {
                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                
                
            }
            
            ?>
            
            
         // ['Posts', 1000,],
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
			 
			 
			 
			 
		<?php } 
		 
		 else
		 
		 {
		 
		 
		 ?>
        
        
        
         
         <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
            
            
            <?php
            
             $element_text = ['All Posts', 'Active Posts', 'Drafted Posts', 'Categories', 'Comments', 'Drafted Comments', 'Published Comments'];
             $element_count = [$countp, $countap, $countpd, $countca, $countc, $countcdraft, $countcpublished]; 
            
            for($i =0;$i <7;$i++)
                
            {
                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                
                
            }
            
            ?>
            
            
         // ['Posts', 1000,],
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
       <?php  }?>
        <!-- <h1>Hello</h1>-->
         
         <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
         
     </div>
          
   
                 <!--Adding chart from google -->
     
     </div>
            <!-- /.container-fluid -->

     </div>
        <!-- /#page-wrapper -->
 
     </div>
    <!-- /#wrapper -->
<?php include "includes/admin_footer.php"; ?>
 
