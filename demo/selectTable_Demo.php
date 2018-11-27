<?php
/*

*	File:		selectTable_Demo.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script demonstrates SQL SELECT rendered in an  HTML Table 
*
*======================================================================
*/

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

        
		echo "<table border='1'>";
			
			echo "<tr>";
			
				echo "<td>#</td>";
				echo "<td>Salut</td>";
				echo "<td>FirstName</td>";
				echo "<td>LastName</td>";
				echo "<td>Company</td>";
		
			echo "</tr>";

		
		$indx = 1;	
		while ($row = mysqli_fetch_array($tPerson_SQLselect_Query, MYSQLI_ASSOC)) {
			$Salutation = $row['Salutation'];
			$FirstName = $row['FirstName'];
			$LastName = $row['LastName'];
			$CompanyID = $row['CompanyID'];
			
			echo "<tr>";
			
				echo "<td>".$indx."</td>";       //  this is NOT  tPerson.ID
				echo "<td>".$Salutation."</td>";
				echo "<td>".$FirstName."</td>";
				echo "<td>".$LastName."</td>";
				echo "<td>".$CompanyID."</td>";
		
			echo "</tr>";

			$indx++;
			
		}
		
		echo "</table>";
        
        mysqli_free_result($tPerson_SQLselect_Query);		
}

?>