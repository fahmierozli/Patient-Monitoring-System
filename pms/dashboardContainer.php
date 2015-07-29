<?php
	include("connectDB.php");
	$alertDoctor = 0;
	$patientList = array();
	$i = 0;
	echo "<form action='patient.php' method='post'>";
	echo "<table class='table table-bordered'>";
	echo "<tr>";
	echo "<td align=left><p> </p></td>";
	echo "<td align=center><p><b>Tag ID</b></p></td>";
	echo "<td align=center><p><b>Patient ID</b></p></td>";
	echo "<td align=center><p><b>Patient Name</b></p></td>";
	echo "<td align=center><p><b>Status</b></p></td>";
	echo "</tr>";
	$result1 = mysql_query( "SELECT * FROM tagtracker WHERE status='1'"); 
	while ( $row1 = mysql_fetch_array( $result1 ))
	{
		$patientList[$i] = $row1[ patientID ];
		$result2 = mysql_query( "SELECT * FROM patient WHERE patientID='$patientList[$i]'"); 
		while ( $row2 = mysql_fetch_array( $result2 ))
		{
			if ( $row2[ healthStatus ] == 1 ) echo "<tr>";
			else if ( $row2[ healthStatus ] == 2 ) echo "<tr class='danger'>";
			echo "<td align=left><input type='radio' name='patientList' value='$patientList[$i]'>";
			echo "<td align=left><p>" . $row1[ tagID ] . "</p></td>";
			echo "<td align=left><p>" . $row1[ patientID ] . "</p></td>";
			echo "<td align=left><p>" . $row2[ name ] . "</p></td>";
			if ( $row2[ healthStatus ] == 1 ) echo "<td align=left><p class='text-success'>Stable</p></td>";
			else if ( $row2[ healthStatus ] == 2 ) 
			{
				echo "<td align=left><p class='text-danger'><marquee behavior='scroll' direction='up' scrollamount='3' height='30'><b>Requires Attention</b></marquee></p></td>";
				$alertDoctor = 1;
			}	
			echo "</tr>";
		}	
		$i++;
	}
	mysql_free_result( $result1 );
	mysql_free_result( $result2 );
	mysql_close();
	echo "</table>";
	if ( $alertDoctor == 1 ) echo "<audio src='alert.mp3' autoplay='true' loop='3'><p>Your browser does not support the audio element.</p></audio>";
	echo "<button type='submit' class='btn btn-custom' name='submit' value=$i class='hidden'><b>Show Patient Data</b></button>";
	echo "</form>";
?>