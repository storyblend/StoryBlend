<?php
   include('session.php');
   include('connect.php');
   
   
   
   



//Select story_list table
$query_turn_select = "SELECT * FROM `story_list` WHERE `id` = " . $_GET['s'] . "";
$result_turn_select = mysqli_query($con, $query_turn_select);


$row_turn_select = mysqli_fetch_assoc($result_turn_select);
    


	


  /////////////////////////////////////////////////////////////////////////////
 /////////////////////////////SUBMIT POST/////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

/////////////////////
//CHECK USER INPUT//
///////////////////

//post check
	if (!(empty($_POST['post_input']))){
    $post = $_POST['post_input'];
	}
else {
	$errors = "<br><br><br>Post is blank";
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


	$stmt = $con->prepare("INSERT INTO posts (author, post, story_list_id, owned_by_id) VALUES (?,?,?,?)");
	$stmt->bind_param("ssii", $login_session, $post, $_GET['s'], $user_id);

	$stmt->execute();
	$stmt->close();
	header('Location: #');




  /////////////////////////
 /////CHANGE THE TURN/////
/////////////////////////


	//Figure out whos turn it is and change it
	if ($row_turn_select['turn'] == $row_turn_select['created_by_id']) {
		$set_turn_to = $row_turn_select['shared_with'];
	}
	elseif ($row_turn_select['turn'] == $row_turn_select['shared_with']) {
		$set_turn_to = $row_turn_select['created_by_id'];
	}
	
	$query_turn_alter = "UPDATE story_list SET turn = '$set_turn_to' WHERE id = " . $_GET['s'] . "";
	
	if (mysqli_query($con, $query_turn_alter)) {
    echo "Record updated successfully";
	} else {
	echo "Error updating record: " . mysqli_error($con);
	}

}	
}

?>

<!DOCTYPE html>

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
                <a class="navbar-brand topnav" href="welcome.php">Story Blend</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
					<li style="width:170px;">
						<div class="dropdown">
							<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="margin-top:7px; width:100px;">Options
							<span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li><a href="welcome.php">Stories</a></li>
								<li><a href="about.php">About</a></li>
								<li><a href="logout.php">Logout</a></li>
								<li>
								<?php
								echo "<a href='delete_story.php?story=" . $_GET['s'] . "'>Delete Story</a>";
								?>
								</li>
								<li>
								<?php
								echo "<a href='print.php?s=" . $_GET['s'] . "'>Print</a>";
								?>
								</li>
							</ul>
						</div>
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
  /////////////////////////////////////////////////////////////////////////////
 /////////////////////////////ECHO POSTS//////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////


///////////////////
//Select from DB//
///////////////// 
$query = "SELECT * FROM posts WHERE story_list_id = " . $_GET['s'] . "";
$result = mysqli_query($con, $query);



//PROFANITY FILTER

function ReplaceBadWords($comment){
$badword = array();
$replacementword = array();
$wordlist = "cock|ass|shit|fuck"; // replace with the list of bad words from attached rar file
$words = explode("|", $wordlist);
foreach ($words as $key => $word) {
$badword[$key] = $word;
$replacementword[$key] = addStars($word);
$badword[$key] = "/\b{$badword[$key]}\b/i";
}
$comment = preg_replace($badword, $replacementword, $comment);
return $comment;
}

function addStars($word) {
$length = strlen($word);
return substr($word, 0, 1) . str_repeat("*", $length - 2) . substr($word, $length - 1, 1);
}


//SET VARIABLES
while($row = mysqli_fetch_assoc($result)) {

$post = $row['post'];
$time = $row['timestamp'];

$year = substr($time, 0, 4);
$month = substr($time, 5, 2);
$day = substr($time, 8, 2);
$hour = substr($time, 11, 2);
$minute = substr($time, 14, 2);

$post = ReplaceBadWords($post);

//ECHO VARIABLES

echo "<p style='margin:10px;'>" . $post . "</p>";
if ($row['author'] == $login_session) {
echo "<a style='float:right;' href='delete.php?p=" . $row['id_post'] . "&story=" . $_GET['s'] . "'>Delete</a><br>";
}
echo "<p width='100%' style='text-align:right;font-size:12px;margin:10px;'>" . $row['author'] . " - " . $month . "/" . $day . "/" . $year . " at " . $hour . ":" . $minute . "</p><hr>";

}

?>

<br><br>

<form action = "" method = "post">

<?php
  /////////////////////////////////////////////////////////////////////////////
 /////////////////////////////CHECK TURN//////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

//Check if it is their turn
if ($row_turn_select['turn'] == $login_session)
{
echo "<textarea name='post_input' style='width:100%;' rows='10'></textarea> <br><br><input type='submit' id='btn-login' style='background-color:#ABB2B9;' class='btn btn-custom btn-lg btn-block' value='Add to Story'>";
} else {
	echo "<h2 style='color:red;'>It is not your turn</h2><br><a href='welcome.php'>Go back to stories</a>";
}

?>


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