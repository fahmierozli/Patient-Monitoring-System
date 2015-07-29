<?php
	session_start();
	include("connectDB.php");
	$userName=$_POST['userName'];
	$password=$_POST['password'];
	$result = mysql_query( "SELECT * FROM doctor WHERE userName='$userName' and password='$password'"); 
	$count=mysql_num_rows($result);
	if($count==1)
	{
		$row = mysql_fetch_array($result);
		$_SESSION['sessionName']=$row[ name ];
		header("location:dashboard.php");
	}
	else header("location:index.php");
	mysql_free_result( $result );
	mysql_close();	
?>