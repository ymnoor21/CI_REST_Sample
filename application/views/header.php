<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">

	    
		<title><?php echo $title; ?></title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-3.3.1/dist/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-3.3.1/dist/css/bootstrap-theme.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">

		<script src="<?php echo base_url();?>assets/js/jquery/jquery.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="<?php echo base_url();?>assets/css/bootstrap-3.3.1/dist/js/bootstrap.min.js"></script>

		<script type="text/javascript" src="<?php echo base_url();?>assets/css/bootstrap-3.3.1/js/transition.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/css/bootstrap-3.3.1/js/collapse.js"></script>

        <script>
            var apitesterurl = "<?php echo $this->_apitesterBaseURL; ?>";
        </script>

        <script type="text/javascript" src="<?php echo base_url();?>assets/js/usermanager.js"></script>
	</head>
	<body>

		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	      	<div class="container">
		        <div class="navbar-header">
		          	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
		          	</button>
		          	<a class="navbar-brand" href="#">Project name</a>
		        </div>
		        <div id="navbar" class="collapse navbar-collapse">
		          	<ul class="nav navbar-nav">
			            <li class="active"><a href="#">Home</a></li>
			            <li><a href="#about">About</a></li>
			            <li><a href="#contact">Contact</a></li>
		          	</ul>
		        </div><!--/.nav-collapse -->
	      	</div>
	    </nav>