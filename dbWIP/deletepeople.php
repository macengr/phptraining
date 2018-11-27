<?php

/* File: deletepeople.php
*  By:   Karlie Mac
*  Date: 28 Oct 2018
*
* This script DELETEs people in table tCompany
* that we added in peopletodelete.php
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
        	/*
	    $people_SQLdelete = "DELETE FROM tPerson WHERE LastName = 'Bloggs'"; 
        
        if (mysqli_query($conn, $people_SQLdelete))  {	
            echo "DELETE tPerson  - SUCCESSFUL.<br /><br />";
        } else {
            echo "DELETE tPerson  - FAILED.<br /><br />";
        }*/

        $people_SQLdelete = "DELETE FROM tPerson WHERE CompanyID > '200'"; 
	
        if (mysqli_query($conn, $people_SQLdelete))  {	
            echo "DELETE tPerson  - SUCCESSFUL.<br /><br />";
        } else {
            echo "DELETE tPerson  - FAILED.<br /><br />";
        }
    }

}

?>