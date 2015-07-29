<?php  
	$dbhost = 'localhost'; 
	$dbuser = 'root'; 
	$dbpass = ''; 
	$dbname = 'pms'; 
	//$dbuser = ''; 
	//$dbpass = ''; 
	//$dbname = '';
	$mysql = mysql_connect($dbhost,$dbuser,$dbpass);
	mysql_select_db($dbname);	
?>