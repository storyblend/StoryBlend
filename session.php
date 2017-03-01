<?php
   include('connect.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($con,"SELECT username, user_id FROM user_info WHERE email = '$user_check' "); //used to SELECT email
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username']; //used to be email
   $user_id = $row['user_id'];

   
   if(!isset($_SESSION['login_user'])){
      header("location:welcome.php");
   }
?>