<?php
include "includes/header.php"; // includes header and background for fileuploading.php
?>
<!--******************************************************************
**********************************************************************
				FORM APPLICATION FOR UPLOADING PICTURE
**********************************************************************
*******************************************************************-->
<div class="flex-item1">
	<form method="post" enctype="multipart/form-data">
		<input type="file" name="profile_pic">
		<input type="submit" name="upload" value="Upload picture">	
	</form>
</div><br>
<a href="dashboard.php" style=" color: white">To the employee forum</a>
<?php
/*********************************************************************
**********************************************************************
			PHP CODE FOR UPLOADING PICTURE TOO DATABASE
**********************************************************************
*********************************************************************/
session_start();
if(isset($_POST["upload"])) {

	echo "<p style='color: white'>You are logged in as id number: " . $_SESSION["userid"] . "</p>";

	$target_folder = "userpics/";
	$target_name = $target_folder . basename("user-". $_SESSION["userid"].".jpg");

	// if statment, checks that user dont upload profile pic larger then 10mb.
	if($_FILES["profile_pic"]["size"] > 10000000){
		echo "File is exciding filesize limit! File maxsize is 10 megabyte";
		exit; // ending if statement in case if file is to big.
	}
	$type = pathinfo($target_name, PATHINFO_EXTENSION); // checking that picturefiles is only jpg.
	if($type != "jpg") {
		echo "Only JPG-files are allowed!";
		exit; // ending if statement if picturefiles is not jpg.
	}
	// Move picture to userpics folder.
	if(move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_name)) {
		// File upload went well
		echo "<p style='color: white'>File upload status: OK!</p>";

		$conn = new mysqli("localhost", "root", "", "dynweb_inl2");
		$query = "UPDATE users SET profile_url = '{$target_name}' WHERE id = '{$_SESSION["userid"]}'";
		$stmt = $conn->stmt_init();
		if($stmt->prepare($query)) {
			$stmt->execute();
			echo "<p style='color: white'>Profile picture updated.</p>";
			echo "<a href='dashboard.php' style='color: white'>Continue to forum</a>";
			$_SESSION["userpic"] = $target_name;
		}
		else {
			echo mysqli_error();
		}
	}
	else {			// If file upload went wrong.
		echo " File upload status: Failure. An error has occured!";
	}
}
?>