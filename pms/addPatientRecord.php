<?php
	session_start();
	include("connectDB.php");
	$patientID=$_POST["patientID"];
	$name=$_POST["name"];
	$IC=$_POST["IC"];
	$gender=$_POST["gender"];
	$dateBirth=$_POST["dateBirth"];
	$dateAdmission=$_POST["dateAdmission"];
	$room=$_POST["room"];
	$bed=$_POST["bed"];
	$diagnosis=$_POST["diagnosis"];
	$tagID=$_POST["tagID"];
	$healthStatus = 1;
	
	//dateDischarge will be assigned dateAdmission at first
	$result1 = mysql_query( "SELECT * FROM patient" );	
	$query1 = "INSERT INTO `".$dbname."`.`patient` (`ID`, `patientID`, `name`, `IC`, `gender`, `dateBirth`, `dateAdmission`, `dateDischarge`, `room`, `bed`, `diagnosis`, `healthStatus` ) 
		VALUES (NULL, \"".$patientID."\", \"".$name."\", \"".$IC."\", \"".$gender."\", \"".$dateBirth."\", \"".$dateAdmission."\", \"".$dateAdmission."\", \"".$room."\", \"".$bed."\", \"".$diagnosis."\", \"".$healthStatus."\" );";
	
	//successful add records redirect to successful record page else failed record page
	if (mysql_query($query1))
	{
		$query2 = mysql_query("UPDATE tagtracker SET status='$healthStatus', patientID='$patientID'  WHERE tagID='$tagID'");
		if (mysql_query($query2))
		{
			mysql_free_result( $result1 );
			mysql_close();
			echo "Patient:OK, Tag:OK";
			header("location:successfullRecord.php");
		}
		else
		{
			mysql_free_result( $result1 );
			mysql_close();
			echo "Patient:OK, Tag:Not OK";
			header("location:successfullRecord.php"); 
		}
	}
	else 
	{ 
		mysql_free_result( $result1 );
		mysql_close();
		echo "Patient:Not OK, Tag:Not OK";
		header("location:successfullRecord.php"); 
	}
	
?>
