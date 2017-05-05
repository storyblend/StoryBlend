<?php
   include('session.php');
   include('connect.php');
$story_id = $_GET['s'];
$query_public = "SELECT * FROM `story_list` WHERE `id` = '$story_id'";
$result_public = mysqli_query($con, $query_public);
$user_info_select = mysqli_fetch_assoc($result_public);
$public = $user_info_select['public'];


	// Check connection
	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}
	
	//Change notification value from 1 to 0 or vice versa
	if ($public == 0) {
		$set_public_to = 1;
	}
	elseif ($public == 1) {
		$set_public_to = 0;
	}
	
	$query_public_alter = "UPDATE story_list SET public = '$set_public_to' WHERE id = '$story_id'";

	if (!mysqli_query($con, $query_public_alter)) {
    echo "Error updating record: " . mysqli_error($con);
	} 
	header('Location: story.php?s=' . $story_id);
?>