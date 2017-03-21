<?php
			$id= $_POST['Cid'];
			$vehicle_id = $_POST['vehicle_id'];
			$vehicle_name = $_POST['vehicle_name'];
			$vehicle_number = $_POST['vehicle_number'];
			$vehicle_state = $_POST['vehicle_state'];

			$db_connection = new mysqli("localhost", "root", "12345", "test");
  
	if ($db_connection->connect_error) 
	{
	      die("Connection failed: ". $db_connection->connect_error);
	}
				
	$add_query = "INSERT INTO vehicle (vehicle_id,client_id,vehicle_name,vehicle_number,state) VALUES ('$vehicle_id','$id','$vehicle_name','$vehicle_number','$vehicle_state');";
				
			$result = $db_connection->query($add_query); 

				echo "Vehicle Information Added ";
?>
