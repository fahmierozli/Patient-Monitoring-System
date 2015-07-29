<?php
	session_start();
	include("connectDB.php");
	$myTagID = $_SESSION['tagID'];
	$result = mysql_query( "SELECT * FROM bloodpressure WHERE tagID='$myTagID'"); 
	header("Content-type: application/x-msdownload");
	header("Content-Disposition: attachment; filename=bloodPressure.csv");
	header("Pragma: no-cache");
	header("Expires: 0");
	echo "Time,(Sys)mm Hg,(Dia)mm Hg\r\n"; //header	
	while($row2 = mysql_fetch_array($result))
	{
		echo "$row2[time],$row2[systolic],$row2[diastolic]\r\n"; //data
	}
	mysql_free_result( $result );
	mysql_close();	
?>