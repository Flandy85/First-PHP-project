<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>dashboard.php</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet"> <!-- fonts from googlefont for header -->
	<link rel="stylesheet" type="text/css" href="css/normalize.css"> <!-- nomalize css -->
	<link rel="stylesheet" type="text/css" href="css/dashboardstyle.css"> <!-- local css -->
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
	<main class="section-container">
		<div>
			<div class="section1">
				<h1><?php echo "Welcome " . $_SESSION["firsname"] . "!"; ?></h1> <!-- h1 tag with php code: Welcome¨message to user with username from session variable -->
			</div>
			<div class="section2">
				<h2><img src="http://image.spreadshirtmedia.net/image-server/v1/compositions/24360260/views/1,width=190,height=190,appearanceId=2,version=1464252866.png/weyland-yutani-engineer-polo-shirt-front-and-back-print_design.png" style="width: 80px; height: 40px; margin-top: 0;"> Identification Card</h2>
				<img src="<?php echo $_SESSION["userpic"]; ?>" alt="Picture of user"> <!-- img tag shows picture that user uploaded in fileupload.php with php code -->
				<?php
				echo "<br>";											/* php section echoing message to user: users id and users firstname*/
				echo "Employee id: " . $_SESSION["userid"] . "<br>";
				echo  "Name: " . $_SESSION["firsname"] . "<br>";
				?>
			</div>
			<div class="section3">
				<a href="fileupload.php">Want to change your profile picture?</a><br>
				<?php
				echo "Otherwise log out!<br>";
				echo "End of message<br>";
				?>
			</div>
			<div class="logout">
				<a href="index.php?logout">Log out</a>
			</div>
		</div>
		<div class="section4">
				<h2>About The Company</h2>
				<p>Weyland-Yutani is the largest company whitin: Space-exploration, Science-reasearch and Robotics. With our recent contract with United Systems Colonial Marines, the company has become the largest manufacturer and supplier of arms to the USMC. You as a new employee in our newly established department Bio-Division, we strongly recommend to upload a picture of yourself in our system at eventual "mishaps" or "accidents" so we can identify you, and compensate your family if your accident has a fatal outcome.
				</p>
				<p>Your directive at Bio-Division are to locate and find new forms of life such as recent discovery of Xenomorphs. In case of detection of this life form, the following priorities are ABSOLUTE!<br>
			   1. Locate and capture lifeform<br>
			   2. Bring back life form by any means nessesscary to Company labs.<br>
			   3.All other are priorities rescinded.<br><br>
				Once again we welcome you to our company where everyone is replaceable.
				Have a great day.<br><br>
				Weyland-Yutani: Building better worlds.<br>
				End of message.
			</p>
		</div>
		<div class="img">
			<img src="https://i.kinja-img.com/gawker-media/image/upload/s--J0fwDf_9--/c_scale,fl_progressive,q_80,w_800/p8zusa6g8smjwrlazxdk.jpg">
		</div>
	</main>
</body>
</html>