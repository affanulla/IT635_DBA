		
<?php
	$id = $_POST['id'];
	$db_connection = new mysqli("localhost", "root", "12345", "test");
  		if ($db_connection->connect_error) {
	      		die("Connection failed: " . $db_connection->connect_error);
	    	}
		
	$add_query = "SELECT COUNT(*), SUM(owner_fault), SUM(other_fault), SUM(cost), SUM(resolved) FROM insurableevent WHERE client_id=$id;";
	$result = $db_connection->query($add_query); 
	while ($row=$result->fetch_assoc())
	{
		echo "\n Total number of incidents: ".$row["COUNT(*)"];
		echo "\n Your fault: ".$row["SUM(owner_fault)"];
		echo "\n Other party's fault: ".$row["SUM(other_fault)"];
		echo "\n Total cost: ".$row["SUM(cost)"];
		echo "\n Resolved: ".$row["SUM(`resolved`)"];
	 	echo "\n Your monthly cost will be: ".($row["COUNT(*)"] + $row["SUM(cost)"]) / (12 *($row["SUM(owner_fault)"] + $row["SUM(resolved)"]));
	 }
?>
