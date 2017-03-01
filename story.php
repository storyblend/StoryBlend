<?php
   include('session.php');
   include('connect.php');

   
///////////////////
//Select from DB//
///////////////// 
$query = "SELECT * FROM posts WHERE story_list_id = " . mysql_real_escape_string($_GET['id']) . "";
$result = mysqli_query($con, $query);




/////////////////////
//CHECK USER INPUT//
///////////////////

//post check
	if (!(empty($_POST['post_input']))){
    $post = $_POST['post_input'];
	}
else {
	$errors = "<br>Post is blank";
}


///////////
//SUBMIT//
/////////


   if($_SERVER["REQUEST_METHOD"] == "POST") {
   
   if (empty($errors)) {
   
	// Check connection
	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	} 

	$sql = "INSERT INTO posts (post, story_list_id, owned_by_id) VALUES ('$post', '" . mysql_real_escape_string($_GET['id']) . "', '$user_id')";

	if ($con->query($sql) === TRUE) {
    header('Location: welcome.php');
	} else {
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
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="#">Story Blend</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="welcome.php">Stories</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>



    <!-- Page Content -->

	<a  name="about"></a>
    <div class="content-section-a" style="min-height:100%;margin-bottom:-150px;">

        <div class="container">
            <div class="row">
	<br><br>
			
<?php
	
while($row = mysqli_fetch_assoc($result))

{

$post = $row['post'];
$time = $row['timestamp'];

$year = substr($time, 0, 4);
$month = substr($time, 5, 2);
$day = substr($time, 8, 2);
$hour = substr($time, 11, 2);
$minute = substr($time, 14, 2);



//ECHO VARIABLES
echo "<pre style='white-space:pre-wrap;border:0px;background-color:transparent;font-family:arial;'>" . htmlspecialchars($post) . "</pre>";
echo "<p width='100%' style='text-align:right;'>" . $month . "/" . $day . "/" . $year . " at " . $hour . ":" . $minute . "</p><hr>";

}

?>

<br><br>

<form action = "" method = "post">
<textarea name="post_input" style="width:100%;" rows="10"></textarea>
<br><br><input type="submit" id="btn-login" style="background-color:#ABB2B9;" class="btn btn-custom btn-lg btn-block" value="Add to Story">
</form>



            </div>

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