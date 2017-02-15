<!--**************************************************************************
******************************************************************************
			PHP CODE FOR REGISTRATING USER TO DATABASE
******************************************************************************
***************************************************************************-->
<?php
session_start();
if(isset($_POST["submit"])) { // Check if you have clicked the submit button

	if (!empty($_POST["email"]) && isset($_POST["password"]) ) { // Checks if user has filled in email and password
		
		// Takes away all the html tag with the function strip_tags
		// Variables is temporary within if statement
		$un = strip_tags($_POST["email"]); 
		$up= strip_tags($_POST["password"]);
		$uf = strip_tags($_POST["fname"]); 
		$ul= strip_tags($_POST["Lname"]);

		$up = password_hash($up, PASSWORD_DEFAULT); // hashing password

		// Establish connection to data base

		$conn = new mysqli("localhost", "root", "", "dynweb_inl2");

		$query = "INSERT INTO users VALUES (NULL, '$un', '$up', '$uf', '$ul', NULL)";

		mysqli_query($conn, $query);
		echo "Success! Employee has been registred.<br>"; // messages for user
		echo "<a href='index.php'>Please return to login page</a><br>";
		echo "and login yourself!<br>";
		echo "End of message";
	}
}
?>
<!--****************************************************************************************************
********************************************************************************************************
				PHP CODE FOR LOGGING IN USER!
********************************************************************************************************
******************************************************************************************************-->
<?php
if(isset($_POST["Login"])) {

	if(!empty($_POST["username"]) && !empty($_POST["Password"]) ){
		//Establish connection to database
		$conn = new mysqli("localhost", "root", "", "dynweb_inl2");

		$user = mysqli_real_escape_string($conn, $_POST["username"]);
		$pass = mysqli_real_escape_string($conn, $_POST["Password"]);

		$stmt = $conn->stmt_init(); // A variable $stmt containing $conn variable  initiating.

		if($stmt->prepare("SELECT * FROM users WHERE username = '{$user}' ")) { //if statement, $stmt variable with the function prepare(), search for username and select user.
			
			$stmt->execute(); // execute $stmt variable with the function execute()

			$stmt->bind_result($id, $un, $up, $uf, $ul, $pic); // $stmt variable binding other variables to database.
			$stmt->fetch(); // fetch result from database 

			$_SESSION["userid"] = $id;			// session variables containing user info.
			$_SESSION["username"] = $un;
			$_SESSION["userpassword"] = $up;
			$_SESSION["firsname"] = $uf;
			$_SESSION["lastname"] = $ul;
			$_SESSION["userpic"] = $pic;

			if($id != 0 && password_verify($pass, $up) ) { // if statement, checks if id is not empty and verifying password.
				// sends user to fileupload.php
				include "includes/header.php";
				echo "<p style='color: white'>As a company policy! We strongly recommend for every new employees</p>";
				echo "<p style='color: white'>to upload their picture for identification in case of</p>";
				echo "<p style='color: white'>'unforseen' accidents.</p>";
				echo "<a href='fileupload.php' style='color: white'>Continue to file uploading</a><br>";
				echo "<p style='color: white'>Already uploaded your picture?</p>";
				echo "<a href='dashboard.php' style='color: white'>Continue to forum</a><br>";
				echo "<p style='color: white'>End of message!</p>";
				// name of the cookie, value of cookie, experationtime
				//3600 sec = 1 hour -> 8 * 3600 = 8 h but in sec
				// time() actual time for today.
				setcookie("username", $un, time() + (3600 * 8));
				$_SESSION["username"] = $uf;
			}
		}
	}
	else {
		// else statement, message to user if login failed.
		echo "Failed to login!" . " " . "Could not find any employee by that name or with that password!<br>";
		echo "Check if you have misspelled username or password?";
		echo "<br><a href='index.php'>Please try again!</a>";
	}
}

?>