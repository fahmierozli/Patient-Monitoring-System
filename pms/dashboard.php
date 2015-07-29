<?php
	session_start();
	if (!isset($_SESSION['sessionName'])) header("location:index.php"); 
	$timeout2 = 300; // 5 minutes
	$duration = time() - $_SESSION['timeout'];
	if($duration > $timeout2) 
	{
		session_destroy();
		header("location:timeOut.php");
	}
	$_SESSION['timeout'] = time();		
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

    <title>PMS (Patient Monitoring System) - Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">
	<link href="dist/css/animate.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
	<script src="assets/js/jquery.js"></script>
	<script>
		$(document).ready(function() 
		{
			$("#timeContainer").load("timeContainer.php");
			$("#dashboardContainer").load("dashboardContainer.php");
			var refreshId = setInterval(function() 
			{ 
				$("#timeContainer").load('timeContainer.php?randval='+ Math.random());
				$("#dashboardContainer").load('dashboardContainer.php?randval='+ Math.random());
			}, 60000);
		$.ajaxSetup({ cache: false });
		});
	</script>
  </head>

  <body>
	<div id="spin"></div>
    <div class="navbar navbar-inverse navbar-static-top">
      <div class="container">
		<div class="navbar-header">
		  
		  <a class="navbar-brand"><img src="images/PMSLogoSmall.png"></a>
		  <a class="btn btn-custom" href="dashboard.php"><i class="glyphicon glyphicon-signal"></i><b> DASHBOARD</b></a>
		  <a class="btn btn-custom" href="patientArchives.php"><i class="glyphicon glyphicon-user"></i><b> PATIENT ARCHIVES</b></a>
		  <a class="btn btn-custom" href="addUser.php"><i class="glyphicon glyphicon-user"></i><b> ADD USER</b></a>
		  <a class="btn btn-custom" href="addPatient.php"><i class="glyphicon glyphicon-user"></i><b> ADD PATIENT</b></a>
		  <a class="btn btn-custom" href="logOut.php"><i class="glyphicon glyphicon-pencil"></i><b> LOGOUT</b></a>
		 </div>
		 
      </div>
    </div>

    <div class="container">
	<div class="animated bounceInLeft">
	<div class="page-header">
	<div class="row">
		<div class="col-sm-6">
			<?php
				echo "<p align=left>" . $_SESSION['sessionName'] . "</p>";
			?>
		</div>  
		<div class="col-sm-6" id="timeContainer">
			
		</div> 
	</div>
	</div> 

	<div class="row">
		<div class="col-sm-4">
			<div class="panel panel-default">
				<div class="panel-heading">
				<h3 class="panel-title" align=center><b>SYSTEM STATUS</b></h3>
				</div>
				<div class="panel-body">
				<?php
					include("connectDB.php");
					$totalTagActive = 0; $totalTagInActive = 0;
					$totalPatientStable = 0; $totalPatientAtt = 0; $myPatientID = 0;
					$result1 = mysql_query( "SELECT * FROM tagtracker"); 
					while ( $row1 = mysql_fetch_array( $result1 ))
					{
						$totalTag++;
						if ( $row1[ status ] == 1 ) 
						{
							$totalTagActive++;
							$myPatientID = $row1[ patientID ];
							$result2 = mysql_query( "SELECT * FROM patient WHERE patientID='$myPatientID'"); 
							while ( $row2 = mysql_fetch_array( $result2 ))
							{
								if ( $row2[ healthStatus ] == 1 ) $totalPatientStable++;
								else if ( $row2[ healthStatus ] == 2 ) $totalPatientAtt++;
							}
						}	
						else if ( $row1[ status ] == 0 ) $totalTagInActive++; 
					}
					mysql_free_result( $result1 );
					mysql_free_result( $result2 );
					mysql_close();
					echo "<table class='table table-bordered'>";
					echo "<tr>";
					echo "<td align=left><p><b>Active Tag</b></p></td>";
					echo "<td align=left><p>$totalTagActive</p></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td align=left><p><b>In-Active Tag</b></p></td>";
					echo "<td align=left><p>$totalTagInActive</p></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td align=left><p><b>Patient Stable</b></p></td>";
					echo "<td align=left><p>$totalPatientStable</p></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td align=left><p><b>Patient Requires Attention</b></p></td>";
					echo "<td align=left><p>$totalPatientAtt</p></td>";
					echo "</tr>";
					echo "</table>";
				?>	
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
				<h3 class="panel-title" align=center><b>CURRENT PATIENTS LIST (ACTIVE TAG)</b></h3>
				</div>
				<div class="panel-body" id="dashboardContainer">
				
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
