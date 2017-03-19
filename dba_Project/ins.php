<?php
	if(isset($_POST['add_incident']))
	{
		$id = $_POST['Cid'];
		$inc_id = $_POST['inc_id'];
		$inc_type = $_POST['inc_type'];
		$inc_des = $_POST['inc_des'];
		$inc_outcome = $_POST['inc_outcome'];
		$owner_fault=$_POST['owner_fault'];
		$other_fault=$_POST['other_fault'];
		$inc_cost = $_POST['inc_cost'];
		$inc_resolved = $_POST['inc_resolved'];

		$db_connection = new mysqli("localhost", "root", "12345", "test");
  
	    if ($db_connection->error_no !=0) 
		{
      			echo "Connection failed: ".$db_connection->connect_error);
			exit();
		}
		
	    $add_query = "INSERT INTO insurableevent(incident_id,client_id,incident_type,description,outcome,owner_fault,other_fault,cost,resolved) VALUES ('$inc_id', '$id', '$inc_type', '$inc_des', '$inc_outcome', '$owner_fault', '$other_fault', '$inc_cost', '$inc_resolved');";
		$result = $db_connection->query($add_query); 

		echo "Incident info added\n";
	}		

/*Updating `insurableevent` table */
	if(isset($_POST['update_incident']))
	{
		$cd = $_POST['cd'];
		$inc_resolved = $_POST['inc_resolved'];
		
		$db_connection = new mysqli("localhost", "root", "12345", "test");
		if ($db_connection->error_no !=0) 
		{
      			echo "Connection failed: ".$db_connection->connect_error);
			exit();
		}
		
		$add_query = "UPDATE insurableevent SET resolved='$inc_resolved' WHERE incident_id='$cd';";
		$result = $db_connection->query($add_query); 

		echo "Incident info updated\n";

	}

?>
