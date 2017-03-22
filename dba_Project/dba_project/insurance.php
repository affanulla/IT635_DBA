		
<?php
	$id = $_POST['id'];

	$db_connection = new mysqli("localhost","root","12345","test");
  	if ($db_connection->connect_error) {
		die("Connection failed: " . $db_connection->connect_error);
	}
		
	$add_query = "SELECT COUNT(*), SUM(owner_fault), SUM(other_fault), SUM(cost), SUM(resolved) FROM insurableevent WHERE client_id=$id;";
	$add_vehicleQuery = "Select count(client_id) from vehicle where client_id=$id;";	
	$result = $db_connection->query($add_query);
	$result2 = $db_connection->query($add_vehicleQuery);

	echo "<h4> Insurance Cost Estimation </h4>";
	echo "Customer ID: ".$id."<br> <br>";
	echo "<u> Incident Details </u> <br>";
	
	$vehicles = NULL;
	while ($row=$result2->fetch_assoc()) 
	{
		$vehicles=$row['count(client_id)'];
		echo "&nbsp; &nbsp; Vehicles Owned: ".$row['count(client_id)']."<br>";
	}	
	
	if ($vehicles == 0)
	{
		echo "&nbsp; &nbsp; No Vehicles Registered Under This Customer <br> <br>";	
	}
	
	else
	{
		while ($row=$result->fetch_assoc())
		{		
			echo "&nbsp; &nbsp; Total number of incidents: ".$row['COUNT(*)']."<br>";
			echo "&nbsp; &nbsp; Your fault: ".$row['SUM(owner_fault)']."<br>";
			echo "&nbsp; &nbsp; Other party's fault: ".$row['SUM(other_fault)']."<br>";
			echo "&nbsp; &nbsp; Total cost: $".$row['SUM(cost)']."<br>";
			echo "&nbsp; &nbsp; Resolved: ".$row['SUM(resolved)']."<br><br>";
	 		echo "Your Monthly Insurance cost= $".($vehicles*($row['COUNT(*)'] + $row['SUM(cost)']) / (12 *($row['SUM(owner_fault)'] + $row['SUM(resolved)'] + $row['SUM(other_fault)'])))."<br><br>";
	 	}
	}	
	echo '<form action="http://localhost/profile.html" method="post">';
	echo '<input type="submit" value="Client Profile" name="Submit" /></form>';		
	echo '<form action="http://localhost/index.html" method="post">';
	echo '<input type="submit" value="Go Home" name="home" /> </form>';

?>
