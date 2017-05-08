		
<?php
	
	$db_connection = new mysqli("localhost","root","12345","test");
  	if ($db_connection->connect_error) {
		die("Connection failed: " . $db_connection->connect_error);
	}
		
	$add_query = "Select vehicle_name, count(*) from vehicle group by vehicle_name having count(*)>2 order by count(*) DESC;";
	$result = $db_connection->query($add_query);

	echo "<h4> Accident Prone Vehicles </h4>";
	
	if(empty($result))
	{
		echo "No Vehicle has more than 1 Incident";
	}
	else
	{
		while ($row=$result->fetch_assoc()) 
		{
			echo "&nbsp; &nbsp; Vehicle: ".$row["vehicle_name"]."<br>";
			echo "&nbsp; &nbsp; No. of Incidents: ".$row["count(*)"]."<br><br>";
		}	
	}
	
	
	echo '<form action="http://localhost/profile.html" method="post">';
	echo '<input type="submit" value="Client Profile" name="Submit" /></form>';		
	echo '<form action="http://localhost/login.html" method="post">';
	echo '<input type="submit" value="Go Home" name="home" /> </form>';

?>
