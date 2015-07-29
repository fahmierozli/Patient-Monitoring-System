<?php
session_start();
session_destroy();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">
	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

    <title>PMS (Patient Monitoring System) - LogOut</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">
	<link href="dist/css/animate.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
	
  </head>

  <body>
	<div id="spin"></div>
    <div class="navbar navbar-inverse navbar-static-top">
      <div class="container">
		<div class="navbar-header">
		  
		  <a class="navbar-brand"><img src="images/PMSLogoSmall.png"></a>
		 </div>
		 
      </div>
    </div>

    <div class="container">
	<div class="animated bounceInLeft">
	<div class="page-header">
		<div class="row text-center">
		<h1>THANK YOU FOR USING PATIENT MONITORING SYSTEM</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2">
			<div class="row text-center">
			<img src="images/PMSLogo.png"><br>
			<img src="images/UTPLogo.png">
			</div>	
		</div>  
		<div class="col-sm-3">
			<div class="row text-center">
			<img src="images/doctor1.png">
			</div>	
		</div>  
        <div class="col-sm-7">
			<div class="panel panel-default">
				<div class="panel-heading">
				<h3 class="panel-title" align=center><b>BACK TO LOGIN</b></h3>
				</div>
				<div class="panel-body">
					<div class="row text-center">
						<a class="btn btn-custom" href="index.php"><i class="glyphicon glyphicon-pencil"></i><b> BACK TO LOGIN</b></a>
					</div>	
				</div>
			</div>
		</div>  	
	</div>
	
	
    <hr>
      <footer>
	  <div class="row text-center">
      <p><small>Patient Monitoring System Version 0.50 &copy; UTP 2013</small></p>
	  </div>
      </footer>
	  </div>  
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
	<script src="dist/js/spin.js"></script>
	<script type="text/javascript">
var opts = {
  lines: 13, // The number of lines to draw
  length: 20, // The length of each line
  width: 10, // The line thickness
  radius: 30, // The radius of the inner circle
  corners: 1, // Corner roundness (0..1)
  rotate: 0, // The rotation offset
  direction: 1, // 1: clockwise, -1: counterclockwise
  color: '#000', // #rgb or #rrggbb or array of colors
  speed: 1, // Rounds per second
  trail: 60, // Afterglow percentage
  shadow: false, // Whether to render a shadow
  hwaccel: false, // Whether to use hardware acceleration
  className: 'spinner', // The CSS class to assign to the spinner
  zIndex: 2e9, // The z-index (defaults to 2000000000)
  top: 'auto', // Top position relative to parent in px
  left: 'auto' // Left position relative to parent in px
};
var target = document.getElementById('spin');
var spinner = new Spinner(opts).spin(target);

$(window).load(function(){
// Once the page is fully loaded, stop spinning
spinner.stop();
});
	</script>
  </body>
</html>
