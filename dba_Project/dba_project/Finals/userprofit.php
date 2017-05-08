		
<?php
	$id = $_POST['id'];
	$pass = $_POST['pass'];

	$db_connection = new mysqli("localhost","root","12345","test");
  	if ($db_connection->connect_error) {
		die("Connection failed: " . $db_connection->connect_error);
	}

	$auth_query = "Select exists (select * from vehicle where client_id =$id AND passcode =MD5('$pass')) as Value;";
	$result3 = $db_connection->query($auth_query);
	$value = NULL;	
	while ($row=$result3->fetch_assoc()) 
	{
		$value=$row['Value'];
		//echo "Value: ".$value;
	}

	if ($value == 1)
	{
		$add_query = "SELECT COUNT(*), SUM(owner_fault), SUM(other_fault), SUM(cost), SUM(resolved) FROM insurableevent WHERE client_id=$id;";
		$add_vehicleQuery = "Select count(client_id) from vehicle where client_id=$id;";	
		$result = $db_connection->query($add_query);
		$result2 = $db_connection->query($add_vehicleQuery);
	
		echo "<h4> Customer Profit </h4>";
		echo "Customer ID: ".$id."<br> <br>";
	
		$vehicles = NULL;
		$tc = Null;
		$mi = Null;
		while ($row=$result2->fetch_assoc()) 
		{
			$vehicles=$row['count(client_id)'];
		}	
		
		if ($vehicles == 0)
		{
			echo "&nbsp; &nbsp; No Vehicles Registered Under This Customer <br> <br>";	
		}
		
		else
		{	
			echo "<table cellspacing='1' cellpadding='2' border='4'>";
			echo "<tr><th>Vehicles</th>";
			echo "<th>Incidents</th>";
			echo "<th>Total Cost</th>";
			echo "<th>Monthly Insurance</th>";
			echo "<th>Percentage Difference</th></tr>";
	
			while ($row=$result->fetch_assoc())
			{	
				$tc = $row['SUM(cost)'];
				$mi = ($vehicles*($row['COUNT(*)'] + $row['SUM(cost)']) / (12 *($row['SUM(owner_fault)'] + $row['SUM(resolved)'] + $row['SUM(other_fault)'])));
				echo "<tr> <td align = 'center'>".$vehicles."</td>";
				echo "<td align = 'center'>".$row['COUNT(*)']."</td>";
				echo "<td align = 'center'>$".$tc."</td>";
				echo "<td align = 'center'>$".round($mi,2)."</td>";
				echo "<td align = 'center'>".round(($mi/$tc)*100,2)."%</tr> </table> <br>";
				echo "&nbsp; You pay only ".round(($mi/$tc)*100,2)."% of the total cost every month!! <br> <br>"; 
	
			}

		}
		echo '<form action="http://localhost/profile.html" method="post">';
		echo '<input type="submit" value="Client Profile" name="Submit" /></form>';
	}

	else
	{
		echo "Please Check Your Passcode! <br> <br>";
		echo '<form action="http://localhost/profile.html" method="post">';
		echo '<input type="submit" value="Go Back" name="Submit" /></form>';
	}	
	
			
	echo '<form action="http://localhost/login.html" method="post">';
	echo '<input type="submit" value="Go Home" name="home" /> </form>';
	
?>
