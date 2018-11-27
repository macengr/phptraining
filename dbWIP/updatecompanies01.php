<?php

/* File: updatecompanies01.php
*  By:   Karlie Mac
*  Date: 28 Oct 2018
*
* This script UPDATEs values of field COUNTRY in table tCompany
* to 'United Kingdom' WHERE they have the value 'UK'
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
        // SQL to change country value from UK to United Kingdom 
        $company_SQLupdate = "UPDATE tCompany SET ";

        $company_SQLupdate .= "COUNTRY = 'United Kingdom' ";

        $company_SQLupdate .= "WHERE COUNTRY = 'UK' "; 

        if (mysqli_query($conn, $company_SQLupdate))  {	
            echo "UPDATE tCompany.COUNTRY - SUCCESSFUL.<br /><br />";
        } else {
            echo "UPDATE tCompany.COUNTRY - FAILED.<br /><br />" . mysqli_error($conn);
        }
    }

}

 ?>