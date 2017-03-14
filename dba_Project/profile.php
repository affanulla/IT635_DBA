<?php
	$id = $_POST['user_id'];
	 $db_connection = new mysqli("localhost", "root", "12345", "test");
  
    if ($db_connection->error_no !=0) 
	{
      		echo "Connection failed: ".$db_connection->connect_error);
		exit();
    	}

	/*Query to search Client Info from DB*/
	$add_query = "SELECT * FROM client_profile WHERE id='$id';";
	$result = $db_connection->query($add_query); 

	if ($result->num_rows> 0) 
	{
	<form action="/home/affanubuntu/IT635Project/insurance.php" method="POST">
		<input type="text" value="ID" name="id"> <br><br>
		<input type="submit" value="Add Vehicle" name="vehicle" />
		<input type="submit" value="Add Incident" name="incident" />
		<input type="submit" value="Insurance Cost" name="cost" />
		<input type="submit" value="Update Incident" name="update" />
	</form>
	}
	else
	{
		echo "User does not exist!!";
	}
?>


