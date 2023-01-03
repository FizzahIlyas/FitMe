<html>
    <head>
	<style>
	body 
	{
		background-image: url('black.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;  
		background-size: 1500px 600px;
	}
</style>
</head>
    <body>
	
        <H1><p style = "color:grey; font-family:bahnschrift" align = "middle">Fitness Log </p></H1>
		
		
		<H2 style = "color:grey; font-family:arial">Enter your daily log: </H1>
		<form action = "" method = "post">
		<label for = "CNIC" style = "color:grey; font-family:verdana">&nbsp Enter CNIC: &nbsp </label>
				<input type = "number" id = "CNIC" name = "CNIC">
				<br><br>
		<label for = "height" style = "color:grey; font-family:verdana">&nbsp Height: &nbsp </label>
				<input type = "number" id = "height" name = "height">
				<br><br>
		<label for = "weight" style = "color:grey; font-family:verdana">&nbsp Weight: &nbsp </label>
		<input type = "number" id = "weight" name = "weight">
				<br><br>
		<label for = "caloricIntake" style = "color:grey; font-family:verdana">&nbsp Caloric Intake: &nbsp </label>
		<input type = "number" id = "caloricIntake" name = "caloricIntake">
				<br><br>
		<input type = "submit" name = "submit" value = "Submit Log">
		</form>
    </body>
</html>
<?php  

   $db_sid = 
"(DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = DESKTOP-K9M1EHT)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = mashaf)
    )
   )";  	
   $db_user = "system";   
   $db_pass = "Mashaf2899";    
   $connect = oci_connect($db_user, $db_pass, $db_sid); 
   if($connect) 
      {
		  if(isset($_POST["submit"]))
		  {
				$height = $_POST["height"];
				$weight = $_POST["weight"];
				$CNIC = $_POST["CNIC"];
				$caloricIntake = $_POST["caloricIntake"];
/*				$memberID = "";
				$query = "(SELECT memberID FROM Member WHERE CNIC = $CNIC)";	
				$queryID = oci_parse($connect, $query);
				$runselect = oci_execute($queryID);
				$row = oci_fetch_array($queryID, OCI_BOTH);
				echo "CNIC corresponds to: ".$row['MEMBERID']."<br>";
				$memberID = $row['MEMBERID'];
 				while($row = oci_fetch_array($queryID, OCI_BOTH)) 
				{ 
					echo "CNIC corresponds to: ".$row['MEMBERID']."<br>";
					$memberID = $row['MEMBERID'];
				}
				if($runselect)
				{
					echo "Link Successful for CNIC $CNIC <br>";				
				}
 */
				$query = "INSERT INTO fitnessLog(memberID, height, weight, caloricIntake)".
				"  VALUES((SELECT memberID FROM Member WHERE CNIC = $CNIC), $height, $weight, $caloricIntake)";
				$queryID = oci_parse($connect, $query);
				$runselect = oci_execute($queryID);
				if($runselect)
				{
					echo "<p style = \"color:grey; font-family:bahnschrift\">Log Registered</p>";
				}
		  }
		} 
   else 
      { die('Could not connect to Oracle: '); } 
?>