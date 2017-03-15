<?php
   include('session.php');
   include('connect.php');
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

		    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    
    <link rel="stylesheet" href="style.css" type="text/css" />
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="chat.js"></script>
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
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
					
                    <h2 class="section-heading">Welcome, <?php echo $login_session; ?></h2>
                    <p class="lead">Your stories are displayed here:<br><br></p>
					
					<a href="create_story.php"><button class="btn btn-lg">Create New Story</button></a><br><br>
					
					
					
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#All">All Stories</a></li>
  <li><a data-toggle="tab" href="#mine">My Stories</a></li>
  <li><a data-toggle="tab" href="#shared">Shared With Me</a></li>
</ul>

<div class="tab-content">
  <div id="All" class="tab-pane fade in active">
    <h3>All Stories</h3>
<?php

$query = "SELECT * FROM `story_list` WHERE `created_by_id` = $user_id OR `shared_with` = '$login_session'";

$result = mysqli_query($con, $query);


    while($row = mysqli_fetch_assoc($result))
    {
        $story_name = $row['story_name'];
        $story_description = $row['story_description'];
		
		//SET UP TABLE
	echo "<table border='1' width='100%'><tr><td width='50%' style='padding:10px;'>";
		//ECHO VARIABLES
    echo "<a href='story.php?s=" . $row['id'] . "'>" . $story_name . "</a></td><td width='100%' style='padding:10px;'>" . $story_description  ."<br>";
		//CLOSE TABLE
	echo "</td></tr></table>";
    }

?>
  </div>
  <div id="mine" class="tab-pane fade">
    <h3>My Stories</h3>
<?php

$query = "SELECT * FROM `story_list` WHERE `created_by_id` = $user_id";

$result = mysqli_query($con, $query);


    while($row = mysqli_fetch_assoc($result))
    {
        $story_name = $row['story_name'];
        $story_description = $row['story_description'];
		
		//SET UP TABLE
	echo "<table border='1' width='100%'><tr><td width='50%' style='padding:10px;'>";
		//ECHO VARIABLES
    echo "<a href='story.php?s=" . $row['id'] . "'>" . $story_name . "</a></td><td width='100%' style='padding:10px;'>" . $story_description  ."<br>";
		//CLOSE TABLE
	echo "</td></tr></table>";
    }

?>
  </div>
  <div id="shared" class="tab-pane fade">
    <h3>Shared With Me</h3>
<?php

$query = "SELECT * FROM `story_list` WHERE `shared_with` = '$login_session'";

$result = mysqli_query($con, $query);


    while($row = mysqli_fetch_assoc($result))
    {
        $story_name = $row['story_name'];
        $story_description = $row['story_description'];
		
		//SET UP TABLE
	echo "<table border='1' width='100%'><tr><td width='50%' style='padding:10px;'>";
		//ECHO VARIABLES
    echo "<a href='story.php?s=" . $row['id'] . "'>" . $story_name . "</a></td><td width='100%' style='padding:10px;'>" . $story_description  ."<br>";
		//CLOSE TABLE
	echo "</td></tr></table>";
    }

?>
  </div>
</div>





                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
					<br><br>
        <script type="text/javascript" src="//www3.smartchatbox.com/shoutbox/start.php?key=754884332"></script>
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