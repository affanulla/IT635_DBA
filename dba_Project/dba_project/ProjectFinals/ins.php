<?php
	
/*Updating `insurableevent` table */
	$cd = $_POST['cd'];
	$inc_resolved = $_POST['inc_resolved'];
	
	$db_connection = new mysqli("localhost", "root", "12345", "test");
	if ($db_connection->connect_error) {
		die("Connection failed: " . $db_connection->connect_error);
    	}
	
	$add_query = "UPDATE insurableevent SET resolved='$inc_resolved' WHERE incident_id='$cd';";
	$result = $db_connection->query($add_query); 

	echo "Incident info updated <br><br>";
	echo '<form action="http://localhost/profile.html" method="post">';
	echo '<input type="submit" value="Client Profile" name="Submit" /></form>';		
	echo '<form action="http://localhost/login.html" method="post">';
	echo '<input type="submit" value="Go Home" name="home" /> </form>';

?>
