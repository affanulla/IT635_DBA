<?php
	$id = $_POST['ID'];
	echo "Incidents registered under Customer: ".$id; 		
	$db_connection = new mysqli("localhost","root","12345","test");		  
	if ($db_connection->connect_error) {
		die("Connection failed: " . $db_connection->connect_error);
    	}
	
	$query="SELECT incident_id FROM insurableevent WHERE client_id=$id;";
	$result=$db_connection->query($query);  
		
	echo '<form action="http://localhost/ins.php" method="post">';
	echo 'Incident id: <select id="cd" name="cd"><br><br>';   
	while ($row=$result->fetch_assoc()) 
	{
		$incd_id=$row['incident_id'];
		echo "<option> $incd_id </option>";            
	}  

	echo '</select><br><br>';		        
	echo 'Resolved: <input type="radio" name="inc_resolved" value=1>Yes';
	echo '<input type="radio" name="inc_resolved" value=0>No <br>';
	echo '<input name="update_incident" value="Update" type="submit"/></form><br>';

	echo '<form action="http://localhost/profile.html" method="post">';
	echo '<input type="submit" value="Client Profile" name="Submit" /></form>';
	echo '<form action="http://localhost/index.html" method="post">';
	echo '<input type="submit" value="Go Home" name="home" /> </form>';
?>
