<?php
/*

*	File:			select_Demo.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script demnstrates SQL SELECT
*		and use of        mysql_fetch_array
*
*
*=====================================
*/

{ 		//	Secure Connection Script
		// include('../../htconfig/dbConfig.php');  <- object with db data



    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "alphacrm";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    if (!$conn) {
        echo "DB connection FAILED<br /><br />";
        $dbSuccess = false;
    } else {
	
        $tPerson_SQLselect = "SELECT  ";
        $tPerson_SQLselect .= "ID, Salutation, FirstName, LastName, CompanyID ";	
        $tPerson_SQLselect .= "FROM ";
        $tPerson_SQLselect .= "tPerson ";			//	<< table name

        
        $tPerson_SQLselect_Query = mysqli_query($conn, $tPerson_SQLselect); 	

        $indx = 1;	
        while ($row = mysqli_fetch_array($tPerson_SQLselect_Query, MYSQLI_ASSOC)) {
            $Salutation = $row['Salutation'];
            $FirstName = $row['FirstName'];
            $LastName = $row['LastName'];
            $CompanyID = $row['CompanyID'];
            
            echo $indx." - ".$Salutation." ".$FirstName." ".$LastName." [Company ".$CompanyID."]<br />";

            $indx++;
            
        }
        
        mysqli_free_result($tPerson_SQLselect_Query);	
    }

}