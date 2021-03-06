<?php

include('connect.php');


$query = "SELECT * FROM `user_info`";

$result = mysqli_query($con, $query);

$row = mysqli_fetch_assoc($result);




$errors = "";

/////////////////////
//CHECK USER INPUT//
///////////////////

//username and email check

	if (!(empty($_POST['user']))){
		while($row = mysqli_fetch_assoc($result)) {
			if ($row['username'] != $_POST['user']){
				$username = $_POST['user'];
			} 
			else {
				$errors = "<br><br><br><p style='color:red'>Username already in use.</p>";
			}
			
		if ((!(empty($_POST['email']))) && ($row['email'] != $_POST['email'])){
			$email = $_POST['email'];
		}
			elseif ($row['email'] != $_POST['email']){
				$errors = "<p style='color:red'>Email already in use.</p>";
			} 
			else {
				$errors = "<p style='color:red'>Email left blank.</p>";
			}
		
		}

	}

else {
	$errors = "<p style='color:red'>Username left blank</p>";
}

//password check
	if (!(empty($_POST['pass']))) {
				if (($_POST['pass']) == ($_POST['pass_confirm'])){
				$password = $_POST['pass'];
			}
		else {
		$errors = "<p style='color:red'>Passwords don't match.</p>";
			}
	}
else {
	$errors = "<p style='color:red'>Password left blank.</p>";
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
	//Inserts the account information into the SQL database.
	$sql = "INSERT INTO user_info (email, username, password) VALUES ('$email', '$username', '$password')";

	//Redirects the page on account creation
	if ($con->query($sql) === TRUE) {
    header('Location: account_success.php');
	} else {
    echo "Error: " . $sql . "<br>" . $con->error;
	}

	$con->close();
   }
   else
   {

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
                <a class="navbar-brand topnav" href="index.php">Story Blend</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
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
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Create Account</h2>
					<?php echo $errors; ?>
					<p>Already have one? <a href="index.php#login">Login</a></p><hr>
						<form action = "" method = "post">
							<div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <h3>Email:</h3><input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
							</div>
							<div class="form-group">
                            <label for="user" class="sr-only">user</label>
                            <h3>Username:</h3><input type="text" name="user" id="user" class="form-control" placeholder="Username">
							</div>
							<div class="form-group">
							<h3>Password:</h3><label for="key" class="sr-only">Password</label>
                            <input type="password" name="pass" id="key" class="form-control" placeholder="Password">
							</div>
							<div class="form-group">
							<h3>Confirm Password:</h3><label for="key" class="sr-only">Password</label>
                            <input type="password" name="pass_confirm" id="key" class="form-control" placeholder="Password">
							</div>
							<input type="submit" id="btn-login" style="background-color:#ABB2B9;" class="btn btn-custom btn-lg btn-block" value="Create Account">
						</form>
                </div>
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