<?php
session_start(); // start the session

if (isset($_SESSION['userid'])) {
  // user is already logged in, redirect to dashboard
  header('Location: dashboard.php');
  exit;
} else {
  // user is not logged in, allow access to login page
  // ...
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Neti Inventory</title>
	<link rel="icon" href="https://www.neti.com.ph/img/NETI%20logo.png">

	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
	.bg{

	 /* The image used */
	 background-image: url("/netiinv/img/back.jpg");

/* Full height */
height: 100vh;
margin: 0;
/* Center and scale the image nicely */
background-position: center;
background-repeat: no-repeat;
background-size: cover;
	}
	.logincard
	{
		
		height: 525px;	
background-color: rgba(105, 192, 250,0.5) !important;
-webkit-box-shadow: 1px 1px 23px 9px rgba(0,0,0,0.75);
-moz-box-shadow: 1px 1px 23px 9px rgba(0,0,0,0.75);
box-shadow: 1px 1px 23px 9px rgba(0,0,0,0.75);
width:450px;
	}
</style>
</head>
<body class="bg">
	<img class="wave" src="../img/wave.png">
	<div class="container">
		<div class="img">
			<img src="../img/bg.svg">
		</div>
		<div class="login-content">
			<div class="logincard">
			<img src="../img/neti.png">
			
		<form  method="POST" action="../includes/sessiontest.php" >
				<h2>Welcome</h2>
				<h5>NETI Inventory and Asset Management System</h5>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" name="txtUsername" class="input" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="txtPassword"  required class="input">
            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a>
            	<input type="submit" name="btnLogin" class="btn" value="Login">
				
            </form>
			</div>
        </div>
		
    </div>
    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>
