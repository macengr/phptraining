<?php
/*

*	File:		selectJoinWHERE_Demo.php
*	By:			TMIT
*	Date:		2010-06-02
*
*	This script demonstrates SQL SELECT 
*		using tPerson LEFT OUTER JOIN tCompany
*		with SQL WHERE clause
*		and SQL ORDER BY clause
*		
*
*=========================================================================
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
	
        $tPerson_SQLselect = "SELECT  ";
        $tPerson_SQLselect .= "tPerson.ID, tPerson.Salutation, ";	
        $tPerson_SQLselect .= "tPerson.FirstName, tPerson.LastName, ";	
        $tPerson_SQLselect .= "tCompany.preName, tCompany.Name ";	
        $tPerson_SQLselect .= "FROM ";
        $tPerson_SQLselect .= "tPerson ";	
        $tPerson_SQLselect .= "LEFT OUTER JOIN tCompany ON ";
        $tPerson_SQLselect .= "tPerson.CompanyID = tCompany.ID ";
		
		$tPerson_SQLselect .= "WHERE ";						// <----  This is new
		$tPerson_SQLselect .= "tCompany.ID IS NULL ";
		$tPerson_SQLselect .= "ORDER BY ";
		$tPerson_SQLselect .= "tPerson.LastName ASC, tPerson.FirstName ASC ";

        $tPerson_SQLselect_Query = mysqli_query($conn, $tPerson_SQLselect); 	

        echo "<table border='1'>";
            
            echo "<tr>";
            
                echo "<td>#</td>";
                echo "<td>Salutation</td>";
                echo "<td>FirstName</td>";
                echo "<td>LastName</td>";
                echo "<td>Company</td>";
        
            echo "</tr>";

        
        $indx = 1;	
        while ($row = mysqli_fetch_array($tPerson_SQLselect_Query, MYSQLI_ASSOC)) {
            
            $Salutation = $row['Salutation'];
            $FirstName = $row['FirstName'];
            $LastName = $row['LastName'];
            $CompanypreName = $row['preName'];
            $CompanyName = $row['Name'];
            
            $CompanyFullName = trim($CompanypreName." ".$CompanyName);
            
            echo "<tr>";
            
                echo "<td>".$indx."</td>";       //  this is NOT  tPerson.ID
                echo "<td>".$Salutation."</td>";
                echo "<td>".$FirstName."</td>";
                echo "<td>".$LastName."</td>";
                echo "<td>".$CompanyFullName."</td>";
        
            echo "</tr>";

            $indx++;
            
        }
        
        echo "</table>";	


        mysqli_free_result($tPerson_SQLselect_Query);		
    }

}

?>