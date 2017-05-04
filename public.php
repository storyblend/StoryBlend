<?php
   include('session.php');
   include('connect.php');
$query_public = "SELECT * FROM `story_info` WHERE `id` = " . $_GET['s'] . "";
$result_public = mysqli_query($con, $query_public);
$story_info_select = mysqli_fetch_assoc($result_public);
$public = $story_info_select['public'];

	// Check connection
	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}
	
	//Change notification value from 1 to 0 or vice versa
	if ($public == 0) {
		$set_public_to = 1;
	}
	else {
		$set_public_to = 2;
	}
	
	$query_public_alter = "UPDATE story_list SET public = '$set_public_to' WHERE id = " . $_GET['s'];

	if (!mysqli_query($con, $query_public_alter)) {
    echo "Error updating record: " . mysqli_error($con);
	} 
	//header("Location: story.php?s=" . $_GET['s']);

	echo $public;
?>