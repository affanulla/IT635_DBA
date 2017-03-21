<?php
	$id = $_POST['ID'];
	$first = $_POST['fname'];
	$last = $_POST['lname'];
	$address = $_POST['adrs'];
	$state = $_POST['st'];
	$zip = $_POST['zp'];
	$email = $_POST['eml'];


	 $db_connection = new mysqli("localhost", "root", "12345", "test");
  
	if ($db_connection->connect_error) {
      die("Connection failed: " . $db_connection->connect_error);
    }

    	/*Query to Insert Client Profile. Values from AddClient form */
   
	$add_query = "INSERT into client_profile (id,first_name,last_name,address,state,zip,email) VALUES ('$id','$first','$last','$address','$state','$zip','$email');";
	
	$result = $db_connection->query($add_query); 

	echo "Client Information added \n";
	echo '<form action="http://localhost/index.html" method="post">';
		echo '<input type="submit" value="Go Home" name="home" /> </form>';

?>

