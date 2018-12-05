<?php
/*

*	File:		companySelect.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script defines an HTML form using a dropdown
* 		to select a company from tCompany
*		and passes tCompany.ID to companyListPeople.php
*
*
*=====================================
*/

{ 	
        $dbServername = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "alphacrm";

        $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

        if (!$conn) {
            echo "DB connection FAILED<br /><br />";
            $dbSuccess = false;
        } else {

            $tCompany_SQLselect = "SELECT  ";
            $tCompany_SQLselect .= "ID, preName, Name ";	
            $tCompany_SQLselect .= "FROM ";
            $tCompany_SQLselect .= "tCompany ";
            $tCompany_SQLselect .= "Order By Name ";

            $tCompany_SQLselect_Query = mysqli_query($conn, $tCompany_SQLselect);	
            
            echo '<form action="companyListPeople.php" method="post">';
    
            echo '<select name="companyID">';
            
                echo '<option value="0" label="coyvalue" selected="selected">..select company..</option>';

                while ($row = mysqli_fetch_array($tCompany_SQLselect_Query, MYSQLI_ASSOC)) {
                    $ID = $row['ID'];
                    $preName = $row['preName'];
                    $companyName = $row['Name'];

                    $RegType = $row['RegType'];
			    
			        $fullCoyName = trim($preName." ".$companyName." ".$RegType);
                    
                    echo '<option value="'.$ID.'">'.$fullCoyName.'</option>'; 
                }

                mysqli_free_result($tCompany_SQLselect_Query);
            
            echo '</select>';

            echo '<input type="submit" />';

            echo '</form>';

        }

    echo "<br /><hr /><br />";


    echo '<a href="../index.php">Quit - to homepage</a>';

    }

?>