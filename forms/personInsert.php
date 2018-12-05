<?php
/*

*	File:		personInsert.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script INSERTS the supplied fields to tPerson
*	if INSERT is OK then use header to return to companyPeopleEdit
*	else report error
*
*
*=====================================
*/

{ 		//	Secure Connection Script
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "alphacrm";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    if (!$conn) {
        echo "DB connection FAILED<br /><br />";
        $dbSuccess = false;
    } else {

            $Salutation = $_POST["Salutation"];	
            $FirstName = $_POST["FirstName"];	
            $LastName = $_POST["LastName"];	
            $Tel = $_POST["Tel"];	
            $companyID = $_POST["companyID"];	
        
            $tPerson_SQLinsert = "INSERT INTO tPerson (";			
            $tPerson_SQLinsert .=  "Salutation, ";
            $tPerson_SQLinsert .=  "FirstName, ";
            $tPerson_SQLinsert .=  "LastName, ";
            $tPerson_SQLinsert .=  "Tel, ";	
            $tPerson_SQLinsert .=  "companyID ";
            $tPerson_SQLinsert .=  ") ";
            
            $tPerson_SQLinsert .=  "VALUES (";
            $tPerson_SQLinsert .=  "'".$Salutation."', ";
            $tPerson_SQLinsert .=  "'".$FirstName."', ";
            $tPerson_SQLinsert .=  "'".$LastName."', ";
            $tPerson_SQLinsert .=  "'".$Tel."', ";	
            $tPerson_SQLinsert .=  "'".$companyID."' ";
            $tPerson_SQLinsert .=  ") ";


            if (mysqli_query($conn, $tPerson_SQLinsert))  {	
            
                header("Location: companyPeopleEdit.php?companyID=".$companyID);
                
            } else {
                
                echo '<span style="color:red; ">FAILED to add new person.</span><br /><br />';
                echo "<br /><hr /><br />";
                echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                echo '<a href="../index.php">Quit - to homepage</a>';
                
            }	

    }
}
?>