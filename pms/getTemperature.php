<?php
	session_start();
	include("connectDB.php");
	$myTagID = $_SESSION['tagID'];
	$result = mysql_query( "SELECT * FROM temperature WHERE tagID='$myTagID'"); 
	header("Content-type: application/x-msdownload");
	header("Content-Disposition: attachment; filename=temperature.csv");
	header("Pragma: no-cache");
	header("Expires: 0");
	echo "Time,Celcius\r\n"; //header	
	while($row2 = mysql_fetch_array($result))
	{
		echo "$row2[time],$row2[temperature]\r\n"; //data
	}
	mysql_free_result( $result );
	mysql_close();	
?>