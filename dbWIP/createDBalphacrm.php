<?php

/* File: createDBalphacrm.php
*  By:   Karlie Mac
*  Date: 19 Oct 2018
*
* This script CREATEs the database alphacrm
*
*

=================================================
*/

{ // CREATEs the database alphacrm
				
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword);

    if (!$conn) {
            echo "DB connection FAILED<br /><br />";
            $dbSuccess = false;
    } else {
            $dbName = "alphacrm";
            $create_SQL = "CREATE DATABASE ".$dbName;
            
            if (mysqli_query($conn, $create_SQL))  {	
                echo "'CREATE DATABASE ".$dbName."' -  Successful.";
            } else {
                echo "'CREATE DATABASE ".$dbName."' - Failed.";
            }
    }

}








?>