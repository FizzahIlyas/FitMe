<html>
    <head>
	<style>
	body 
	{
		background-image: url('27263.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;  
		background-size: 1500px 600px;
	}
</style>
</head>
<body>

<H1><p style = "color:maroon; font-family:bahnschrift" align = "middle"> EXERCISES </p></H1>
<form action = "" method = "post">
	<label for = "name" style = "color:darkred; font-family:bahnschrift">Name of exercise: </label>
		<input type = "text" id = "name" name = "name" >
		<br><br>
	<label for = "reps" style = "color:darkred; font-family:bahnschrift">Number of reps: </label>
		<input type = "number" id = "reps" name = "reps" >
		<br><br>
	<label for = "noOfSets" style = "color:darkred; font-family:bahnschrift">Number of sets: </label>
		<input type = "number" id = "noOfSets" name = "noOfSets" >
		<br><br>
	<label for = "muscleGroup" style = "color:darkred; font-family:bahnschrift">Muscle Group used: </label>
		<input type = "text" id = "muscleGroup" name = "muscleGroup" >
		<br><br>
	<label for = "equipment" style = "color:darkred; font-family:bahnschrift">Equipment needed: </label>
		<input type = "text" id = "equipment" name = "equipment" >
		<br><br>
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
				$name = $_POST["name"];
                $reps = $_POST["reps"];
				$noOfSets = $_POST["noOfSets"];
				$muscleGroup = $_POST["muscleGroup"];
				$equipment = $_POST["equipment"];

				$query="INSERT INTO Exercise VALUES('$name', $reps, $noOfSets, '$muscleGroup', '$equipment')";
				
				$query_id = oci_parse($connect, $query);
				$runselect = oci_execute($query_id);
				if($runselect)
				{
					echo "<p style = \"color:maroon; font-family:bahnschrift\">Exercise registered.</p>";
				}
		  }
		} 
   else 
      { die('Could not connect to Oracle: '); } 
  
?>
