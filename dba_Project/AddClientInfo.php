<?php
	$id = $_POST['ID'];
	$first = $_POST['fname'];
	$last = $_POST['lname'];
	$address = $_POST['adrs'];
	$state = $_POST['st'];
	$zip = $_POST['zp'];
	$email = $_POST['eml'];


	 $db_connection = new mysqli("localhost", "root", "12345", "test");
  
    if ($db_connection->error_no !=0) 
	{
      		echo "Connection failed: ".$db_connection->connect_error);
		exit();
    	}
	/*Query to Insert Client Profile entered from above */
   
	$add_query = "INSERT into client_profile (id,first_name,last_name,address,state,zip,email) VALUES ('$id','$first','$last','$address','$state','$zip','$email');";
	
	$result = $db_connection->query($add_query); 

	echo "Info added \n";
?>
