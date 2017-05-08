<?php 
		$id = $_POST['Cid'];
		$inc_id = $_POST['inc_id'];
		$inc_type = $_POST['inc_type'];
		$inc_des = $_POST['inc_des'];
		$inc_outcome = $_POST['inc_outcome'];
		$owner_fault = $_POST['fault'];
		$inc_cost = $_POST['inc_cost'];
		$inc_resolved = $_POST['inc_resolved'];
	
	$other_fault = 0;
	if ($owner_fault==0){
		$other_fault = 1;
	} 
	
	$db_connection = new mysqli("localhost","root","12345","test");
	
	if ($db_connection->connect_error) {
	      die("Connection failed: ".$db_connection->connect_error);
	    }
  
	   		
	$add_query = "INSERT INTO insurableevent(incident_id,client_id,incident_type,description,outcome,owner_fault,other_fault,cost,resolved) VALUES ('$inc_id','$id','$inc_type','$inc_des', '$inc_outcome','$owner_fault','$other_fault','$inc_cost','$inc_resolved');";
	echo $add_query;
		
	$result = $db_connection->query($add_query); 
	
	//$add_query2= "select * from insurableevent where incident_id=$inc_id;";
	//$result2 = $db_connection->query($add_query2);
	//while ($row=$result2->fetch_assoc())
	//{
	//	echo "Result:".$result['incident_id'];	
	//} 

	echo "Incident added <br> <br>";
	echo '<form action="http://localhost/incidentadd.html" method="post">';
	echo '<input type="submit" value="Add Another Incident" name="Submit" /> </form>';
	echo '<form action="http://localhost/login.html" method="post">';
	echo '<input type="submit" value="Go Home" name="home" /> </form>';
	
?>
