<?php
/*************************************
**************************************
	Destroys sessions and cookie
	after loging out from
	dashboard.php
**************************************
*************************************/
if(isset($_GET["logout"]) ) {
	session_start();
	session_destroy();
	unset($_COOKIE["username"]);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>index.html</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet"> <!-- fonts from googlefont for header an login page -->
	<link rel="stylesheet" type="text/css" href="css/normalize.css"> <!-- nomalize css -->
	<link rel="stylesheet" type="text/css" href="css/mainstyle.css"> <!-- local css -->
	<link rel="stylesheet" type="text/css" href="responsive_indexstyle"><!-- responsive css -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<header class="start-banner">
		<div class="banner-items">
			<img src="./images/Weyland-Yutani.jpg">
			<h1 class="item-1">Weyland-Yutani Corporation</h1>
			<img src="./images/Weyland-Yutani.jpg" class="item-2">
		</div> <!-- banner-items-->
	</header><!-- start-banner -->
	<header>
		<div class="flex-head">
			<h2>Welcome to Weyland-Yutanis Bio-Division</h2>
		</div><!-- .flex-head -->
	</header>
	<main>
	<!--*********************************************************************
		*********************************************************************
						Registrating form application 
		*********************************************************************
		*********************************************************************-->
		<div class="flex-container">
		<div class="flex-item1">
				<p>Not an employee? Create a account!</p>
				<form action="login_registration.php" method="post">
					<fieldset class="regform">
						<legend class="create-title">Create account</legend>
						Firstname: <br>
						<input type="text" name="fname"><br>
						Lastname: <br>
						<input type="text" name="Lname"><br>
						E-mail/Username: <br>
						<input type="email" name="email"><br>
						Password: <br>
						<input type="password" name="password"><br>
						<input class="button-account" type="submit" name="submit" value="Create account">
					</fieldset><!-- .regform -->
				</form>
			</div><!-- flex-item1 -->
			<!--*******************************************************************
			***********************************************************************
						Login form application
			***********************************************************************
			********************************************************************-->
			<div class="flex-item2">
				<p>Already an employee? Please Login!</p>
				<form action="login_registration.php" method="post">
					<fieldset class="regform">
						<legend class="login-title">Login</legend>
						Username/Email: <br>
						<input type="text" name="username"><br>
						Password: <br>
						<input type="password" name="Password"><br>
						<input class="button-login" type="submit" name="Login" value="Login">
					</fieldset><!-- .regform -->
				</form>
			</div><!-- flex-item2 -->		
		</div><!--flex-container -->
	</main>
	<footer class="footer-end">
		<div class="footer-flex">
			<p>&copy
			<?php 
			$design_name = "Anders Gustavsson";
			echo "Design by "; echo $design_name ."." . " " . "Last modified: "; echo date("F d, Y");
			?>
			</p>
		</div> <!-- .footer-flex -->
	</footer> <!-- .footer-end -->
</body>
</html>