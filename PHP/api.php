<?php
	include("connectDB.php");

$hostname_myconnex = $dbhost;
$database_myconnex = $dbname;
$username_myconnex = $dbuser;
$password_myconnex = $dbpass;
// Create connection
$con=mysqli_connect($hostname_myconnex,$username_myconnex,$password_myconnex,$database_myconnex);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


$tags=$_GET['tags'];
$bpm=$_GET['bpm'];

$tt = mysqli_query($con,"SELECT * FROM tagtracker WHERE tagID='$tags'");
$row = mysqli_fetch_array($tt);
$patid=$row['patientID'];




mysqli_query($con,"INSERT INTO heartrate (tagID, bpm, patientID)
VALUES ('$tags', '$bpm','$patid')") ;


$patient = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM patient WHERE patientID='$patid'"));


echo $patient['name'];
?>