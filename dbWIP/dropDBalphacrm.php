<?php

/* File: dropDBalphacrm.php
*  By:   Karlie Mac
*  Date: 19 Oct 2018
*
* This script DROPs the database alphacrm
*
*

=================================================
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
            $dbName = "alphacrm";
            $drop_SQL = "DROP DATABASE ".$dbName;
            
            if (mysqli_query($conn, $drop_SQL))  {	
                echo "'DROP DATABASE ".$dbName."' -  Successful.";
            } else {
                echo "'DROP DATABASE ".$dbName."' - Failed.";
            }
    }

}

?>
