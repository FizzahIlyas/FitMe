<html>
    <head>
	<style>
	body 
	{
		background-image: url('89250.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;  
		background-size: cover;
	}
</style>
</head>
    <body>
	
        <H1><p style = "color:maroon; font-family:bahnschrift" align = "middle">FIT-ME</p></H1>
		
		<H2 style = "color:darkred; font-family:verdana">GYM MEMBERSHIP FORM</H1>
		
		<form action = " " method = "post">
		<label for = "firstName" style = "color:maroon; font-family:verdana">&nbsp First name: &nbsp</label>
			<input type = "text" id = "firstName" name = "firstName">
			<br><br>
		<label for = "middleName" style = "color:maroon; font-family:verdana">&nbsp Middle name: &nbsp</label>
			<input type = "text" id = "middleName" name = "middleName">
			<br><br>
		<label for = "lastName" style = "color:maroon; font-family:verdana">&nbsp Last name: &nbsp</label>
			<input type = "text" id = "lastName" name = "lastName">
			<br><br>
		<label for = "CNIC" style = "color:maroon; font-family:verdana">&nbsp CNIC Number: &nbsp </label>
			<input type = "CNIC" id = "CNIC" name = "CNIC" >
			<br><br>
		<label for = "startDate" style = "color:maroon; font-family:verdana">&nbsp Start date: &nbsp</label>
			<input type = "startDate" id = "startDate" name = "startDate">
			<br><br>
		<label for = "feesPayable" style = "color:maroon; font-family:verdana">&nbsp Amount of Fees Payable: &nbsp</label><br>
			<input type = "radio" id = "4500" name = "feesPayable" value = "4500">
			<label for = "4500" style = "color:maroon; font-family:verdana">Rs 4,500 - 1 Month</label>
			&nbsp <br>
			<input type = "radio" id = "12000" name = "feesPayable" value = "12000">
			<label for = "12000" style = "color:maroon; font-family:verdana">Rs 12,000 - 3 Months</label>
			&nbsp <br>
			<input type = "radio" id = "40000" name = "feesPayable" value = "40000">
			<label for = "40000" style = "color:maroon; font-family:verdana">Rs 40,000 - 12 Months</label>
			&nbsp <br>
			<br><br>
		<label for = "remainingSub" style = "color:maroon; font-family:verdana">&nbsp Subscription Remaining: &nbsp</label><br>
			<input type = "radio" id = "1" name = "remainingSub" value = "1">
			<label for = "1" style = "color:maroon; font-family:verdana">1 Month</label>
			&nbsp <br>
			<input type = "radio" id = "2" name = "remainingSub" value = "2">
			<label for = "2" style = "color:maroon; font-family:verdana">2 Months</label>
			&nbsp <br>
			<input type = "radio" id = "3" name = "remainingSub" value = "3">
			<label for = "3" style = "color:maroon; font-family:verdana">3 Months</label>
			&nbsp <br>
			<input type = "radio" id = "4" name = "remainingSub" value = "4">
			<label for = "4" style = "color:maroon; font-family:verdana">4 Months</label>
			&nbsp <br>
			<input type = "radio" id = "5" name = "remainingSub" value = "5">
			<label for = "5" style = "color:maroon; font-family:verdana">5 Months</label>
			&nbsp <br>
			<input type = "radio" id = "6" name = "remainingSub" value = "6">
			<label for = "6" style = "color:maroon; font-family:verdana">6 Months</label>
			&nbsp <br>
			<input type = "radio" id = "7" name = "remainingSub" value = "7">
			<label for = "7" style = "color:maroon; font-family:verdana">7 Month</label>
			&nbsp <br>
			<input type = "radio" id = "8" name = "remainingSub" value = "8">
			<label for = "8" style = "color:maroon; font-family:verdana">8 Months</label>
			&nbsp <br>
			<input type = "radio" id = "9" name = "remainingSub" value = "9">
			<label for = "9" style = "color:maroon; font-family:verdana">9 Months</label>
			&nbsp <br>
			<input type = "radio" id = "10" name = "remainingSub" value = "10">
			<label for = "10" style = "color:maroon; font-family:verdana">10 Months</label>
			&nbsp <br>
			<input type = "radio" id = "11" name = "remainingSub" value = "11">
			<label for = "11" style = "color:maroon; font-family:verdana">11 Months</label>
			&nbsp <br>
			<input type = "radio" id = "12" name = "remainingSub" value = "12">
			<label for = "12" style = "color:maroon; font-family:verdana">12 Months</label>
			&nbsp <br>
			<br><br>
		<input type = "submit" value = "submit" name = "submit">
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
				$firstName = $_POST["firstName"];
				$middleName = $_POST["middleName"];
				$lastName = $_POST["lastName"];
				$CNIC = $_POST["CNIC"];
				$startDate = $_POST["startDate"];
         		$feesPayable = $_POST["feesPayable"];
				$remainingSub = $_POST["remainingSub"];
				echo "<p style = \"color:maroon; font-family:bahnschrift\">Hello, ".$firstName." ".$lastName."</p><br>";
					
				$personQuery = "INSERT INTO Person(CNIC, startDate, firstName, middleName, lastName) 
						VALUES('$CNIC', '$startDate', '$firstName', '$middleName', '$lastName')";
				$query2 = oci_parse($connect, $personQuery);
				$runQuery2 = oci_execute($query2);
				if($runQuery2)
				{
					echo "<p style = \"color:maroon; font-family:bahnschrift\">Person entry has been registered.</p><br>";
				}
				
				$memberQuery = "INSERT INTO Member(memberID, CNIC, feesPayable, remainingSub) 
						VALUES(member_ID.nextval, '$CNIC', '$feesPayable', '$remainingSub')";
				$query1 = oci_parse($connect, $memberQuery);
				$runQuery1 = oci_execute($query1);
				if($runQuery1)
				{
					echo "<p style = \"color:maroon; font-family:bahnschrift\">Member form has been registered.</p><br>";
				}
				$commitQuery = "COMMIT";
				$query2 = oci_parse($connect, $commitQuery);
				$runQuery2 = oci_execute($query2);
			  	
		  }
		} 
   else 
      { die('Could not connect to Oracle: '); } 
?>