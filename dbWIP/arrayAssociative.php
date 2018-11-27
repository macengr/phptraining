<?php
	
/*
*	File:		arrayAssociative.php
*	By:			Karlie Mac
*	Date:		2018-11-03
*
*	This script demonstrates an Associative Array
*=====================================
*/	
	
$dbConnection = array(
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'alphacrm'
); 

echo "The hostname for our dbConnection is: ".$dbConnection['hostname'];
echo "<br /><br />";

echo "The database we connect to: ".$dbConnection['database'];
echo "<br /><br />";


//$dbConnected = @mysqli_connect($hostname, $username, $password);
$dbConnected = @mysqli_connect(
						$dbConnection['hostname'], 
						$dbConnection['username'], 
						$dbConnection['password']
						);

//$dbSelected = @mysqli_select_db($databaseName,$dbConnected);						
$dbSelected = @mysqli_select_db(
						$dbConnection['database'],
						$dbConnected
						);
?>