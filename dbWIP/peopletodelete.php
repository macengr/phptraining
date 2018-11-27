<?php

/* File: peopletodelete.php
*  By:   Karlie Mac
*  Date: 28 Oct 2018
*
* This script CREATEs, then DELETEs records in table tPeople
* in the database alphacrm
*

=================================================
*/

{ // Connects to the database alphacrm
				
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "alphacrm";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    if (!$conn) {
        echo "DB connection FAILED<br /><br />";
        $dbSuccess = false;
    } else {
        		//	INSERT 4 deletable records into table tPeople 
			
		$person_SQLinsert = "INSERT INTO tPerson ( ";
		// $person_SQLinsert .=  "ID, ";
		$person_SQLinsert .=  "Salutation, ";
		$person_SQLinsert .=  "FirstName, ";
		$person_SQLinsert .=  "LastName, ";
		$person_SQLinsert .=  "CompanyID ";
		$person_SQLinsert .=  ") ";
		
		$person_SQLinsert .=  "VALUES ";
		
		{ // insert Person 1
			$person_SQLinsert .=  "(";
			//$person_SQLinsert .=  "'<autoincremented ID value>', ";
			$person_SQLinsert .=  "'Mr', ";
			$person_SQLinsert .=  "'Bill', ";
			$person_SQLinsert .=  "'Bloggs', ";
			$person_SQLinsert .=  "'' ";
			$person_SQLinsert .=  "), ";
		}
		{ // insert Person 2
			$person_SQLinsert .=  "(";
			//$person_SQLinsert .=  "'<autoincremented ID value>', ";
			$person_SQLinsert .=  "'Mrs', ";
			$person_SQLinsert .=  "'Wilhelmina', ";
			$person_SQLinsert .=  "'Bloggs', ";
			$person_SQLinsert .=  "'1' ";
			$person_SQLinsert .=  "), ";
		}
		{ // insert Person 3
			$person_SQLinsert .=  "(";
			//$person_SQLinsert .=  "'<autoincremented ID value>', ";
			$person_SQLinsert .=  "'Mrs', ";
			$person_SQLinsert .=  "'Hermione', ";
			$person_SQLinsert .=  "'Hermit', ";
			$person_SQLinsert .=  "'300' ";
			$person_SQLinsert .=  "), ";
		}
		{ // insert Person 4	
			$person_SQLinsert .=  "(";
			//$person_SQLinsert .=  "'<autoincremented ID value>', ";
			$person_SQLinsert .=  "'Ms', ";
			$person_SQLinsert .=  "'Sally', ";
			$person_SQLinsert .=  "'Smith', ";
			$person_SQLinsert .=  "'300' ";
			$person_SQLinsert .=  ") ";
		}
		
		
		if (mysqli_query($conn, $person_SQLinsert))  {	
			echo "INSERT INTO tPerson - SUCCESSFUL.<br /><br />";
		} else {
			echo "INSERT INTO tPerson - FAILED.<br /><br />";
		}


    }
}

?>