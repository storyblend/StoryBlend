<?php

include('connect.php');
include('session.php');

$errors = "";



/////////////////////
//CHECK USER INPUT//
///////////////////

//story name check
	if (!(empty($_POST['story_name']))){
    $story_name = $_POST['story_name'];
	}
else {
	$errors = "<br>Story name left blank";
}

//story description check
	if (!(empty($_POST['story_description']))) {
				$story_description = $_POST['story_description'];
			}
else {
	$errors = "<br>Story description left blank";
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

	$sql = "INSERT INTO story_list (created_by_id, story_name, story_description) VALUES ('$user_id', '$story_name', '$story_description')";

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
                        <a href="index.php">Home</a>
                    </li>
					<li>
                        <a href="welcome.php">Stories</a>
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
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">New Story</h2><hr>
						<form action = "" method = "post">
							<div class="form-group">

                            <h3>Story Name:</h3><input type="text" name="story_name" id="story_name" class="form-control" placeholder="Story Name">
							</div>
							<div class="form-group">
                            <label for="user" class="sr-only">user</label>
                            <h3>Description:</h3><input type="text" name="story_description" id="user" class="form-control" placeholder="Description">
							</div>


							<div class="form-group">

							</div>
							<div class="form-group">
							<br>
                            <input type="checkbox" name="random" value="Bike"> Random Collaborator<br><br>
							<input type="checkbox" name="friend" value="Bike"> Pick a friend<br><br>
							<h3>Share with user?</h3><input type="text" name="story_name" id="story_name" class="form-control" placeholder="Username"><br><br>
							
							</div>

											<input type="submit" id="btn-login" style="background-color:#ABB2B9;" class="btn btn-custom btn-lg btn-block" value="Create Story">
											</form>
			</div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->


    </div>
    <!-- /.banner -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="inde.php">Home</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Story Blend. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>