<?php
	if (isset($_POST['vehicle']))
	{
		$id = $_POST['id'];
		<form action="/home/affanubuntu/IT635Project/ins.php" method="post">	
			Client ID:      <input type="text" value=$id name="Cid" /> <br><br>
			Vehicle ID:     <input type="Text" name="vehicle_id" /> <br><br>
			Vehicle name:   <input type="Text" name="vehicle_name" /> <br><br>
			Vehicle Number: <input type="Text" name="vehicle_number" /> <br><br>
			State purchased:<input type="Text" name="vehicle_state" /> <br><br>
			<input name="add_vehicle" type="submit" />
		</form>
	}


	if (isset($_POST['incident']))
	{
		$id = $_POST['id'];
		<form action="/home/affanubuntu/IT635Project/ins.php" method="post">	
			Client ID:      <input type="text" value="<?php echo $id?>" name="Cid" /> <br><br>
			Incident ID:     <input type="number" name="inc_id" /> <br><br>
			Incident type:   <input type="Text" name="inc_type" /> <br><br>
			Description:   <input type="Text" name="inc_des" /> <br><br>
			Outcome:   <input type="Text" name="inc_outcome" /> <br><br>
			Your fault? : <input type="radio" name="owner_fault" 
		if (isset($owner_fault) && $owner_fault=="Yes"); value=1>Yes <input type="radio" name="owner_fault" 
		if (isset($owner_fault) && $owner_fault=="No"); value=0>No <br><br> />
		Other party fault? : <input type="radio" name="other_fault" 
			if (isset($other_fault) && $other_fault=="Yes"); value=1>Yes <input type="radio" name="other_fault" 
			if (isset($other_fault) && $other_fault=="No"); value=0>No <br><br>			  

		Cost:     <input type="number" name="inc_cost" /> <br><br>
		Resolved:   <input type="radio" name="inc_resolved"
				if (isset($resolved) && $inc_resolved=="Yes"); value=1>Yes />
			<input type="radio" name="inc_resolved" 
			if (isset($resolved) && $inc_resolved=="No"); value=0>No <br><br> />
			<input name="add_incident" type="submit" />
		</form>
	}

	if(isset($_POST['update']))
	{
		$id = $_POST['id'];
		<form action="/home/affanubuntu/IT635Project/ins.php" method="post" >
	  	 Incident id: <select id="cd" name="cd">
	   $db_connection = new mysqli("localhost", "root", "12345", "test");		  
	   if ($db_connection->error_no !=0) 
		{
      			echo "Connection failed: ".$db_connection->connect_error);
			exit();
    		}
	   $query="SELECT incident_id FROM insurableevent WHERE client_id='$id';";
	   $result=$db_connection->query($query);            
	    while ($row=$result->fetch_assoc()) 
	 	{
	        	$incd_id=$row["incident_id"];
	                echo "<option > $incd_id </option>";            
	   	}  
		       </select>		        
	
	 Resolved: <input type="radio" name="inc_resolved" if (isset($resolved) && $inc_resolved=="Yes"); value=1>Yes
		   <input type="radio" name="inc_resolved" if (isset($resolved) && $inc_resolved=="No"); value=0>No <br><br>
	    			   	   <input name="update_incident" value="Update" type="submit" />
	    	</form>   	
	}

	if(isset($_POST['cost']))
	{
	$id = $_POST['id'];
	$db_connection = new mysqli("localhost", "root", "", "test");
  		if ($db_connection->error_no !=0) 
		{
      			echo "Connection failed: ".$db_connection->connect_error);
			exit();
    		}		
	$add_query = "SELECT COUNT(*), SUM(`owner_fault`), SUM(`other_fault`), SUM(`cost`), SUM(`resolved`) FROM insurableevent WHERE client_id=$id;";
	$result = $db_connection->query($add_query); 
	while ($row=$result->fetch_assoc())
	{
		echo "Total number of incidents: ".$row["COUNT(*)"].<br> 
		"Your fault: ".$row["SUM(`owner_fault`)"].<br>
		"Other party's fault: ".$row["SUM(`other_fault`)"].<br>
		"Total cost: ".$row["SUM(`cost`)"].<br> 
		"Resolved: ".$row["SUM(`resolved`)"]."<br><br>";
	 	echo "Your monthly cost will be: ".($row["COUNT(*)"] + $row["SUM(`cost`)"]) / (12 *($row["SUM(`owner_fault`)"] + $row["SUM(`resolved`)"]));
	 }
	}
?>
