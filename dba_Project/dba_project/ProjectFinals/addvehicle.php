<?php
	$id= $_POST['Cid'];
	$pass= $_POST['pass'];
	$vehicle_id = $_POST['vehicle_id'];
	$vehicle_name = $_POST['vehicle_name'];
	$vehicle_number = $_POST['vehicle_number'];
	$vehicle_state = $_POST['vehicle_state'];

	$db_connection = new mysqli("localhost", "root", "12345", "test");
  
	if ($db_connection->connect_error) 
	{
	      die("Connection failed: ". $db_connection->connect_error);
	}
				
	$add_query = "INSERT INTO vehicle (vehicle_id,client_id,vehicle_name,vehicle_number,state,passcode) VALUES ('$vehicle_id','$id','$vehicle_name','$vehicle_number','$vehicle_state','$pass');";
	$add_query2 = "update vehicle  set passcode=MD5(passcode) Where vehicle_id=$vehicle_id;";
	
			
	$result = $db_connection->query($add_query); 
	$result = $db_connection->query($add_query2);

	echo "Vehicle Information Added <br> <br>";
	echo '<form action="http://localhost/vehicleadd.html" method="post">';
	echo '<input type="submit" value="Add Another Vehicle" name="Submit" /> </form>';
	echo '<form action="http://localhost/login.html" method="post">';
	echo '<input type="submit" value="Go Home" name="home" /> </form>';
?>
