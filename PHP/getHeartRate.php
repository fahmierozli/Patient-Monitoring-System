<?php
	session_start();
	include("connectDB.php");

	$myPATID = $_SESSION['patientID'];
	$result = mysql_query( "SELECT * FROM heartrate WHERE patientID='$myPATID'"); 
	header("Content-type: application/x-msdownload");
	header("Content-Disposition: attachment; filename=heartRate.csv");
	header("Pragma: no-cache");
	header("Expires: 0");
	echo "Time,BPM\r\n"; //header	
	while($row2 = mysql_fetch_array($result))
	{
		echo "$row2[time],$row2[bpm]\r\n"; //data
	}
	mysql_free_result( $result );
	mysql_close();	
?>