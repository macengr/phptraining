<?php
/*

*	File:		twoPageModelOutput.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script collects data from twoPageModelForm.php
*	and processes it
*
*
*=====================================
*/

{ 	//	Secure Connection Script
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "alphacrm";
    
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    
    if (!$conn) {
        echo "DB connection FAILED<br /><br />";
        $dbSuccess = false;
    } else {

        $personFirstName = $_POST["personFirstName"];
        $personLastName = $_POST["personLastName"];
    
        echo "The name you entered was: ".$personFirstName." ".$personLastName;

	


}

}

echo "<br /><hr /><br />";

echo '<a href="twoPageModelForm.php">Go Back</a>';


?>