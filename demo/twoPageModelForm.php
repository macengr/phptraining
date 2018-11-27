<?php
/*

*	File:		twoPageModelForm.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script defines an HTML form using php 
*	to allow data to be sent to twoPageModelOutput.php
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

        echo '<form action="twoPageModelOutput.php" method="post">';
		
        echo '		Enter First Name: ';
        echo '		<input type="text" name="personFirstName" />';
        
        echo '		Enter Last Name: ';
        echo '		<input type="text" name="personLastName" />';
        
        echo '		<br /><br />';
    

        echo '<input type="submit" />';
            
        echo '</form>';



    }

}

?>