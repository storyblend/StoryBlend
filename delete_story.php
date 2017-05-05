<?php

include('connect.php');
include('session.php');

$errors = "";

///////////
//select story table//
/////////
$query_turn_select = "SELECT * FROM `story_list` WHERE `id` = " . $_GET['story'];
$result_turn_select = mysqli_query($con, $query_turn_select);
$row_turn_select = mysqli_fetch_assoc($result_turn_select);

if(($login_session == $row_turn_select['shared_with']) or ($login_session == $row_turn_select['created_by_id'])){
	
	}else{
		Header("location: welcome.php");
	}

///////////
//SUBMIT//
/////////

//Deletes the story information from SQL database
   if($_SERVER["REQUEST_METHOD"] == "POST") {
   
   if (empty($errors)) {
   
	// Check connection
	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	} 

	$sql = "DELETE story_list FROM story_list WHERE id= " . $_GET['story'] . "";
	
	if ($con->query($sql) === TRUE) {
	echo "S U C C E S S";
	} 
	else {
    echo "Error: " . $sql . "<br>" . $con->error;
	}

	$con->close();
   }
   else
   {
	   echo "$errors";
   }

}
?>
<?php

include('connect.php');
include('session.php');

$errors = "";

///////////
//SUBMIT//
/////////

//Deletes the posts in the story from the SQL database
   if($_SERVER["REQUEST_METHOD"] == "POST") {
   
   if (empty($errors)) {
   
	// Check connection
	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	} 

   	$sql2 = "DELETE posts FROM posts WHERE story_list_id= " . $_GET['story'] . "";
	
	if ($con->query($sql2) === TRUE) {
	header("Location: welcome.php");
	} 
	else {
    echo "Error: " . $sql2 . "<br>" . $con->error;
	}

	$con->close();
   }
   else
   {
	   echo "$errors";
   }

}
?>

<html>


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Story Blend - Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" style="float:right;">
                <div class="dropdown" style="float:right;">
							<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="margin-top:7px; margin-right:25px; width:100px;">Options
							<span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li><a href="welcome.php">Stories</a></li>
								<li><a href="about.php">About</a></li>
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</div>
               
            </div>
			 <a class="navbar-brand topnav" href="welcome.php">Story Blend</a>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
					<li style="width:170px;">
						
					</li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Header -->


    <!-- Page Content -->

	<a  name="about"></a>
    <div class="content-section-a" style="min-height:100%;margin-bottom:-150px;">

        <div class="container">
			<h2 class="section-heading">Are you sure you want to delete this entire story?</h2><hr>
			<form action = "" method = "post"> 
			<input type='submit' value="Delete" class="btn btn-danger">
			</form>
			<?php
			echo "<a href='story.php" . "?s=" . $_GET['story'] . "'>Nevermind</a>";
			?>
        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->


    </div>
    <!-- /.banner -->

 

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>