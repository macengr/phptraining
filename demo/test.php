<?php

/*

*	File:			
*	By:			TMIT
*	Date:		
*
*	This script 
*
*
*=====================================
*/

{ // Connect and Test MySQL and specific DB (return $dbSuccess = T/F)
				
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "alphacrm";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    if (!$conn) {
        echo "DB connection FAILED<br /><br />";
        $dbSuccess = false;
    } else {
        echo "success";
	
	}	//		END ($dbSuccess)
}

?>