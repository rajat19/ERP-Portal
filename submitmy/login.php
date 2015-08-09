<!doctype html>
<html lang="en">
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <title>Nisani</title>
	<!--for background css file-->
	
	<!-- <link rel="stylesheet" type="text/css" href="css/loginstyle.css" /> -->
	

	<!--login css file-->
	<link href="css/style1.css" rel="stylesheet" type="text/css" media="all"/>
	
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/plugins/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	

   
	
	<meta charset="UTF-8">
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="css/loginstyle.css" />
	// <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	// <script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
	// <script src="js/jquery.backgroundPosition.js" type="text/javascript"></script>

	<script type="text/javascript">
		$(function(){
		
		  $('#midground').css({backgroundPosition: '0px 0px'});
		  $('#foreground').css({backgroundPosition: '0px 0px'});
		  $('#background').css({backgroundPosition: '0px 0px'});
		
			$('#midground').animate({
				backgroundPosition:"(-10000px -2000px)"
			}, 240000, 'linear');
			
			$('#foreground').animate({
				backgroundPosition:"(-10000px -2000px)"
			}, 120000, 'linear');
			
			$('#background').animate({
				backgroundPosition:"(-10000px -2000px)"
			}, 480000, 'linear');
			
		});
	</script>
	<style type="text/css">
	body {
			background-image:url(../images/background.png);
			}
	</style>
</head>
<body>
    			<?php
    				require 'php/connect.inc.php';
    				require 'php/core.inc.php';

    				if(!loggedin())
    				{
    					if(isset($_POST['username'])&&isset($_POST['password']))
		 					{
		 						echo $username=htmlentities($_POST['username']);
		 						echo $password=htmlentities($_POST['password']);
		 						if(!empty($username)&&!empty($password))
		 						{
		 							$query_select=mysqli_query($conn,"SELECT * FROM users WHERE username='".mysqli_real_escape_string($conn,$username)."' AND password='".mysqli_real_escape_string($conn,$password)."'");
		 							if($query_select)
		 							{
		 								echo $query_num_rows=mysqli_num_rows($query_select);
							            if($query_num_rows==0)
							                echo "Invalid username/password";
							            else if($query_num_rows==1)
							            {
							                // $user_id=mysql_result($query_run, 0,'userid');
							                $row=mysqli_fetch_array($query_select,MYSQLI_BOTH);
							                $id = $row['id'];
							                $usertype = $row['usertype'];
							                $branch = $row['branch'];
							                $_SESSION['id']=$id;
							                $_SESSION['branch']=$branch;
							                $_SESSION['usertype']=$usertype;
							                if($usertype < 2)
							                	header('Location:admin.php');
							                else
							                	header('Location:dashboard.php');
							            }
		 							}
		 							else 
		 								echo mysqli_error($conn);
		 						}
		 						else
		 						{
		 							echo "Wrong credentials";
		 						}
		 					}
		 			}

    				else if($_SESSION['usertype'] < 2)
    				{
    					header('Location:admin.php');
    				}
    				else
    					header('Location:dashboard.php');
		 			
    			?>
					<div id="header-wrap">
				<nav id="nav-main">


				<div id="background"></div>
					<div id="midground"></div>
					<div id="foreground"></div>
					<div id="big-wrapper"> </div>

							<!--header start here-->
	<div class="login">
		 <div class="login-main">
		 		<div class="login-top">
		 			<img src="images/head-img.png" alt=""/>
		 			<form action="login.php" method="POST">
		 			<h1>Login <span class="anc-color"> to your account</span> </h1>
		 			<input type="text" placeholder="Username" required="" name="username">
		 			<input type="password" placeholder="Password" required="" name="password">
		 			<div class="login-bottom">
		 			<input type="submit" value="Login" />
		 			</div>	
		 			</form>
		 		</div>
		 		
		 	</div>
  </div>
  </nav>
<script type="text/javascript">

				// $(document).ready(function disableRightClick(){
				// 	 $(document).bind("contextmenu",function(e){
				// 		 return false;
				// 	 });
				// });

				</script>
</body>
</html>