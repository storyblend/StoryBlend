<?php
   include("connect.php");
   session_start();
$errors = "";
  /////////////////////////////////////////////////////////////////
 //////////////////////LOGIN CHECK////////////////////////////////
/////////////////////////////////////////////////////////////////
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myemail = mysqli_real_escape_string($con,$_POST['email']);
      $mypassword = mysqli_real_escape_string($con,$_POST['pass']); 
      
      $sql = "SELECT email FROM user_info WHERE email = '$myemail' and password = '$mypassword';";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myemail;
         
         header("location: welcome.php");
      }else {
         $errors = "<p style='color:red'>Your Login Name or Password is invalid</p>";
      }
   }
?>
<html lang="en">

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
								<li><a href="#top">Top</a></li>
								<li><a href="#about">About</a></li>
								<li><a href="#login">Login</a></li>

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
    <a name="top"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Story Blend</h1>
                        <h3>A place for creative authors to collaborate around the globe</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="#login" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-pencil" style="margin-right:10px;"></i><span class="network-name">Start Blending</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->

	<a  name="about"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">A new way to write:<br>How you want.</h2>
                    <p style="text-indent: 40px" class="lead">Storyblend! Blend it up like an actual blender with Storyblend. Blend with your friends! Blend with random people! Blend at home! Blend on the go! Your stories will blend so well that you'll make a sweet, sweet, story smoothie.</p><p style="text-indent: 40px" class="lead">This innovative system enables easy collaboration on creative writing. The turn-based writing can blend writing styles of many people for countless story outcomes. Communicating and writing stories connects diverse people in a unique way by sharing the appreciation of ideas and and the timeless value of story writing.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="img/ipad.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->


    <!-- /.content-section-a -->

	<a  name="login"></a>
    <div class="banner">

        <div class="container">

            <div class="row">
                <div class="col-lg-5">
                    <h2>Login to Start Writing:</h2><hr>
					<?php echo "$errors" ?>
					<form action = "" method = "post">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Password</label>
                            <input type="password" name="pass" id="key" class="form-control" placeholder="Password">
                        </div>
                        <input type="submit" id="btn-login" style="background-color:#ABB2B9;" class="btn btn-custom btn-lg btn-block" value="Log in">
                    </form><br>
					<h4>Don't have an account? <a href="create_account.php" style="color:#ABB2B9;">Make one</a></h4>
                </div>
                <div class="col-lg-6">
                </div>
            </div>
<br><br>
        </div>
        <!-- /.container -->
		

    </div>
    <!-- /.banner -->


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
