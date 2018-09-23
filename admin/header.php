<?php include('../libs/common.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>SolutionsCulture</title>

	<!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

	<header>
		<nav class="navbar">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	        </div>
	        <div id="navbar" class="collapse navbar-collapse">
	          <ul class="nav navbar-nav" style="width: 100%">
	            <li><a href="http://www.solutionsculture.com/" target="_blank"><img src="images/logo.png" alt="logo" class="img-responsive" style="width:250px"></a></li>
	            <li>
	            	<a class="business_case" href="index.php">Admin <br>Home</a>
	            </li>
	            <li class="dropdown admin_dropdown">
		          <a id="drop4" role="button" data-toggle="dropdown" href="#">Admin <b class="caret"></b></a>
		          <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop4">
		            <!-- <li role="presentation"><a role="menuitem" tabindex="-1" href="change_password.php">Change password</a></li>
		            <li role="presentation"><a role="menuitem" tabindex="-1" href="change_email.php">Change email</a></li> -->
		            <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Logout</a></li>
		          </ul>
		        </li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>
	</header>
