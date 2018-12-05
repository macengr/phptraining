<?php
/*

*	File:			personEditForm.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script defines an HTML form to load person details
*	and POST changed fields back to this form and UPDATE
*	If UPDATE is good then use header(Location: ...
*	to return to the companyPeopleEdit form
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

		$thisScriptName = "personEditForm.php";

		

	$saveClicked = isset($_POST["saveClicked"]) ? $_POST["saveClicked"] : null; //
	

	
	{	//	SAVE button was clicked 
		if (isset($saveClicked)) {
			unset($saveClicked);
			
			$companyID = $_POST["companyID"];	
			
			$personID = $_POST["personID"];	
			$Salutation = $_POST["Salutation"];	
			$FirstName = $_POST["FirstName"];	
			$LastName = $_POST["LastName"];	
			$Telephone = $_POST["Telephone"];	
	
			$tPerson_SQLupdate = "UPDATE tPerson SET ";			
			$tPerson_SQLupdate .=  "Salutation = '".$Salutation."', ";
			$tPerson_SQLupdate .=  "FirstName = '".$FirstName."', ";
			$tPerson_SQLupdate .=  "LastName = '".$LastName."', ";
			$tPerson_SQLupdate .=  "Tel = '".$Telephone."' ";
			$tPerson_SQLupdate .=  "WHERE ID = '".$personID."' "; 	
	
			if (mysqli_query($conn, $tPerson_SQLupdate))  {	
				echo header("Location: companyPeopleEdit.php?companyID=".$companyID);
			} else {
				echo '<span style="color:red; ">FAILED to update the company.</span><br /><br />';
				
			}				
		}	
	//	END:  SAVE button was clicked 	ie. if (isset($saveClicked))
	}		
	
	{	//  Get the details of the person selected 
			$personID = $_GET["personID"];	
					
			$tPerson_SQLselect = "SELECT * ";
			$tPerson_SQLselect .= "FROM ";
			$tPerson_SQLselect .= "tPerson ";
			$tPerson_SQLselect .= "WHERE ID = '".$personID."' ";
			
			$tPerson_SQLselect_Query = mysqli_query($conn, $tPerson_SQLselect);	
			
			while ($row = mysqli_fetch_array($tPerson_SQLselect_Query, MYSQLI_ASSOC)) {
				$current_Salutation = $row['Salutation'];
				$current_FirstName = $row['FirstName'];
				$current_LastName = $row['LastName'];
				$current_Tel = $row['Tel'];
				
				$companyID = $row['CompanyID'];
				 
			}
			
			mysqli_free_result($tPerson_SQLselect_Query);			
	//  END: Get the details of the person selected 
	}

	echo '<h2 style="font-family: arial, helvetica, sans-serif;" >
				Person EDIT Form
			</h2>';
	
	{	//		FORM postPerson 
		echo '<form name="postPerson" action="'.$thisScriptName.'" method="post">';
		
				echo '<input type="hidden" name="personID" value="'.$personID.'"/>';
				echo '<input type="hidden" name="companyID" value="'.$companyID.'"/>';
				echo '<input type="hidden" name="saveClicked" value="1"/>';
				echo("companyID".$companyID."<br><br>");
				echo '
				<table>
					<tr>
						<td>Salutation</td>
						<td><input type="text" name="Salutation" value="'.$current_Salutation.'"/></td>
					</tr>
					<tr>
						<td>FirstName</td>
						<td><input type="text" name="FirstName" value="'.$current_FirstName.'"/></td>
					</tr>
					<tr>
						<td>LastName</td>
						<td><input type="text" name="LastName" value="'.$current_LastName.'"/></td>
					</tr>
					<tr>
						<td>Telephone</td>
						<td><input type="text" name="Telephone" value="'.$current_Tel.'"/></td>
					</tr>
					<tr>
						<td></td>
						<td align="right"><input type="submit"  value="Save" /></td>
					</tr>
				</table>
				';
					
		echo '</form>';
	//	END:	FORM postPerson 
	}
	
	echo "<br /><hr /><br />";
	
	echo '<a href="companyPeopleEdit.php?companyID='.$companyID.'">Return to Company/People List</a>';
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo '<a href="../index.php">Quit - to homepage</a>';

		


	}
}

?>