<?php
	session_start();
	include("connectDB.php");
	$doctorID=$_POST["doctorID"];
	$userName=$_POST["userName"];
	$password=$_POST["password"];
	$realName=$_POST["realName"];
	$phone=$_POST["phone"];
	
	$result1 = mysql_query( "SELECT * FROM doctor" );	
	$query1 = "INSERT INTO `".$dbname."`.`doctor` (`ID`, `doctorID`, `userName`, `password`, `name`, `phone` ) VALUES (NULL, \"".$doctorID."\", \"".$userName."\", \"".$password."\", \"".$realName."\", \"".$phone."\" );";
	
	//successful add records redirect to successful record page else failed record page
	if (mysql_query($query1))
	{
		header("location:successfullRecord.php");
	}
	else
	{
		header("location:failedRecord.php");
	}
	mysql_free_result( $result1 );
	mysql_close();
?>
