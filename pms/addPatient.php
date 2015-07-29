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

    <title>PMS (Patient Monitoring System) - Add Patient</title>

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
		<div class="col-sm-6">
			<?php
				date_default_timezone_set('Asia/Kuala_Lumpur');
				$today = date('d-m-Y H:i');  
				echo "<p align=right>$today</p>";
			?>
		</div> 
	</div>
	</div> 
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
				<h3 class="panel-title" align=center><b>ADD PATIENT</b></h3>
				</div>
				<div class="panel-body">
					<div class="row text-center">
					<form class="form-horizontal" method="post">
						<div class="form-group">
							<label for="patientID" class="col-sm-4 control-label">Patient ID</label>
							<div class="col-sm-6">
							<input type="text" class="form-control" name="patientID" id="patientID" placeholder="00000">
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="col-sm-4 control-label">Name</label>
							<div class="col-sm-6">
							<input type="text" class="form-control" name="name" id="name" placeholder="Name">
							</div>
						</div>
						<div class="form-group">
							<label for="IC" class="col-sm-4 control-label">IC/Passport</label>
							<div class="col-sm-6">
							<input type="text" class="form-control" name="IC" id="IC" placeholder="000000000000">
							</div>
						</div>
						<div class="form-group">
							<label for="gender" class="col-sm-4 control-label">Gender</label>
							<div class="col-sm-2">
							<div class="radio">
								<label><input type="radio" name="gender" id="genderM" value="M" checked><p align=left>Male</p></label>
							</div>
							</div>
							<div class="col-sm-2">
							<div class="radio">
								<label><input type="radio" name="gender" id="genderF" value="F"><p align=left>Female</p></label>
							</div>
							</div>
						</div>
						<div class="form-group">
							<label for="dateBirth" class="col-sm-4 control-label">Date of Birth</label>
							<div class="col-sm-4">
							<input type="date" class="form-control" name="dateBirth" id="dateBirth" placeholder="2000-01-01">
							</div>
							<label for="dateBirth" class="col-sm-2 control-label"><p align=left>YYYY-MM-DD</p></label>
						</div>
						<div class="form-group">
							<label for="dateAdmission" class="col-sm-4 control-label">Date of Admission</label>
							<div class="col-sm-4">
							<input type="date" class="form-control" name="dateAdmission" id="dateAdmission" placeholder="2000-01-01">
							</div>
							<label for="dateAdmission" class="col-sm-2 control-label"><p align=left>YYYY-MM-DD</p></label>
						</div>
						<div class="form-group">
							<label for="room" class="col-sm-4 control-label">Room</label>
							<div class="col-sm-6">
							<input type="text" class="form-control" name="room" id="room" placeholder="000">
							</div>
						</div>
						<div class="form-group">
							<label for="bed" class="col-sm-4 control-label">Bed</label>
							<div class="col-sm-6">
							<input type="text" class="form-control" name="bed" id="bed" placeholder="000">
							</div>
						</div>
						<div class="form-group">
							<label for="diagnosis" class="col-sm-4 control-label">Diagnosis</label>
							<div class="col-sm-6">
							<input type="text" class="form-control" name="diagnosis" id="diagnosis" placeholder="Fever">
							</div>
						</div>
						
						<div class="form-group">
							<label for="tagID" class="col-sm-4 control-label">Available Tag ID</label>
							<div class="col-sm-6">
							<select class="form-control" name="tagID" id="tagID">
							<?php
								include("connectDB.php");
								$result1 = mysql_query( "SELECT * FROM tagtracker"); 
								while ( $row1 = mysql_fetch_array( $result1 ))
								{
									if ( $row1[ status ] == 0 )
									{
										$i = $row1[ tagID ];
										echo "<option>$i</option>";
									}
								}
								mysql_free_result( $result1 );
								mysql_close();
							?>	
							</select>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-custom" formaction="addPatientRecord.php"><i class="glyphicon glyphicon-pencil"></i><b> ADD PATIENT</b></button>
						</div>
					</form>
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
