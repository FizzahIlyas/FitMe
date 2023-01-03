<html>
    <head>
	<style>
	body 
	{
		background-image: url('geometric.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;  
		background-size: 1500px 600px;
	}
</style>
</head>
<body>

<H1><p style = "color:silver; font-family:bahnschrift" align = "middle"> ENTER DETAILS </p></H1>
<form action = "" method = "post">
	<label for = "CNIC" style = "color:silver; font-family:bahnschrift">CNIC: </label>
		<input type = "number" id = "CNIC" name = "CNIC" >
	<input type = "submit" value = "Submit" name = "submit">
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
				$CNIC = $_POST["CNIC"];
				$query = 
				"
				SELECT m.memberID, m.remainingSub, p.firstName, p.lastName, p.startDate
				FROM Person p JOIN Member m
				USING (CNIC)
				WHERE CNIC = $CNIC
				"
				;	
				$query_id = oci_parse($connect, $query);
				oci_execute($query_id);
				$row = oci_fetch_array($query_id, OCI_ASSOC+OCI_RETURN_NULLS);
					echo "<tr>\n";
					echo "<p style = \"color:silver; font-family:bahnschrift\">";
					echo "<br><br>Name: &nbsp".$row['FIRSTNAME']." ".$row['LASTNAME']."<br><br>Date Started: &nbsp".$row['STARTDATE']."<br><br>Member ID: &nbsp".$row['MEMBERID']."<br><br>Remaining Subscriptions: &nbsp".$row['REMAININGSUB']."<br></p>"; 
					echo "</tr>\n";
				//}
				echo "</table>\n";
			}
	} 
   else 
    {
		  die(
		  'Could not connect to Oracle: '
		  ); 
	} 
  
?>
