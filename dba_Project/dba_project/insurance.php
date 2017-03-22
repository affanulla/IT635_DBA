		
<?php
	$id = $_POST['id'];
	$db_connection = new mysqli("localhost","root","12345","test");
  		if ($db_connection->connect_error) {
	      		die("Connection failed: " . $db_connection->connect_error);
	    	}
		
	$add_query = "SELECT COUNT(*), SUM(owner_fault), SUM(other_fault), SUM(cost), SUM(resolved) FROM insurableevent WHERE client_id=$id;";
	$result = $db_connection->query($add_query);
	echo "<h4> Insurance Cost Estimation </h4>";
	echo "Customer ID: ".$id."<br> <br>";
	echo "<u> Incident Details </u> <br>";
	 
	while ($row=$result->fetch_assoc())
	{
		echo "&nbsp; &nbsp; Total number of incidents: ".$row['COUNT(*)']."<br>";
		echo "&nbsp; &nbsp; Your fault: ".$row['SUM(owner_fault)']."<br>";
		echo "&nbsp; &nbsp; Other party's fault: ".$row['SUM(other_fault)']."<br>";
		echo "&nbsp; &nbsp; Total cost: $".$row['SUM(cost)']."<br>";
		echo "&nbsp; &nbsp; Resolved: ".$row['SUM(resolved)']."<br><br>";
	 	echo "Monthly Insurance cost: $".($row['COUNT(*)'] + $row['SUM(cost)']) / (12 *($row['SUM(owner_fault)'] + $row['SUM(resolved)']));
	 }
?>
