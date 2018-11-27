<?php

/* File: alphacrmTableCreate.php
*  By:   Karlie Mac
*  Date: 22 Oct 2018
*
* This script CREATEs the tables tCompany and tPerson 
* in the database alphacrm
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
        echo "DB connection SUCCESSFUL<br /><br />";
                    //   SQL script to create table tCompany

            $createCoyTable_SQL = "CREATE TABLE alphacrm.tCompany ( ";
            $createCoyTable_SQL .= "ID INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY , ";
            $createCoyTable_SQL .= "preName VARCHAR( 50 ) , ";
            $createCoyTable_SQL .= "Name VARCHAR( 250 ) NOT NULL, ";
            $createCoyTable_SQL .= "RegType VARCHAR( 50 )  NULL, ";

            $createCoyTable_SQL .= "StreetA VARCHAR( 150 )  NULL, ";
            $createCoyTable_SQL .= "StreetB VARCHAR( 150 )  NULL, ";
            $createCoyTable_SQL .= "StreetC VARCHAR( 150 )  NULL, ";
            $createCoyTable_SQL .= "Town VARCHAR( 150 )  NULL, ";
            $createCoyTable_SQL .= "County VARCHAR( 150 )  NULL, ";
            $createCoyTable_SQL .= "Postcode VARCHAR( 50 )  NULL, ";

            $createCoyTable_SQL .= "COUNTRY VARCHAR( 250 ) NOT NULL ";
            $createCoyTable_SQL .= ")";
            
// Okay to here

            if (mysqli_query($conn, $createCoyTable_SQL)) {	
                echo "'Create TABLE tCompany' -  Successful.<br /><br />";
            } else {
                echo "Epic Failure";
            }

                        //   SQL script to create table tPerson 
            $createPersonTable_SQL = "CREATE TABLE alphacrm.tPerson ( ";
            $createPersonTable_SQL .= "ID INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY , ";
            $createPersonTable_SQL .= "Salutation VARCHAR( 20 ) , ";
            $createPersonTable_SQL .= "FirstName VARCHAR( 50 ) , ";
            $createPersonTable_SQL .= "LastName VARCHAR( 50 ) NOT NULL, ";
            $createPersonTable_SQL .= "CompanyID INT ( 11 ) NOT NULL ";
            $createPersonTable_SQL .= ")";

            if (mysqli_query($conn, $createPersonTable_SQL)) {	
                echo "'Create TABLE tPerson' -  Successful.<br /><br />";
            } else {
                echo "Epic Failure" . mysqli_error($conn);
            }

    }

/*
    if(mysqli_query($conn, $sql)){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
*/
}







?>