<?php
   include('session.php');
   include('connect.php');
$query_notify = "SELECT * FROM `user_info` WHERE `username` = '$login_session'";
$result_notify = mysqli_query($con, $query_notify);
$user_info_select = mysqli_fetch_assoc($result_notify);
$notify = $user_info_select['notifications'];


if ($notify == 1) {
	$notify_button_display = 'Off';
}
elseif ($notify == 0) {
	$notify_button_display = 'On';
}
else {
	$notify_button_display = 'Frickin heck this is broken';
}



	// Check connection
	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}
	
	//Change notification value from 1 to 0 or vice versa
	if ($notify == 0) {
		$set_notify_to = 1;
	}
	elseif ($notify == 1) {
		$set_notify_to = 0;
	}
	
	$query_notify_alter = "UPDATE user_info SET notifications = '$set_notify_to' WHERE username = '$login_session'";

	if (!mysqli_query($con, $query_notify_alter)) {
    echo "Error updating record: " . mysqli_error($con);
	} 
	header('Location: welcome.php');
?>