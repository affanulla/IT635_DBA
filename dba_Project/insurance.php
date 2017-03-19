		<form action="http://localhost/addvehicle.php" method="post">	
			Client ID:      <input type="text" name="Cid" /> <br><br>
			Vehicle ID:     <input type="Text" name="vehicle_id" /> <br><br>
			Vehicle name:   <input type="Text" name="vehicle_name" /> <br><br>
			Vehicle Number: <input type="Text" name="vehicle_number" /> <br><br>
			State purchased:<input type="Text" name="vehicle_state" /> <br><br>
			<input name="add_vehicle" type="submit" />
		</form>
	<?php
	


	if (isset($_POST['incident']))
	{
		$id = $_POST['id'];
		?>
		<form action="http://localhost/ins.php" method="post">	
			Client ID:      <input type="text" value="id" name="Cid" /> <br><br>
			Incident ID:     <input type="number" name="inc_id" /> <br><br>
			Incident type:   <input type="Text" name="inc_type" /> <br><br>
			Description:   <input type="Text" name="inc_des" /> <br><br>
			Outcome:   <input type="Text" name="inc_outcome" /> <br><br>
			Your fault? : <input type="radio" name="owner_fault" 
		<?php if (isset($owner_fault) && $owner_fault=="Yes");?> value=1>Yes 
					<input type="radio" name="owner_fault" 
		<?php if (isset($owner_fault) && $owner_fault=="No");?> value=0>No <br><br>
		Other party fault? : <input type="radio" name="other_fault" 
		<?php	if (isset($other_fault) && $other_fault=="Yes");?> value=1>Yes 
					<input type="radio" name="other_fault" 
		<?php	if (isset($other_fault) && $other_fault=="No");?> value=0>No <br><br>			  

		Cost:     <input type="number" name="inc_cost" /> <br><br>
		Resolved:   <input type="radio" name="inc_resolved"
			<?php	if (isset($resolved) && $inc_resolved=="Yes");?> value=1>Yes 
			<input type="radio" name="inc_resolved" 
			<?php if (isset($resolved) && $inc_resolved=="No");?> value=0>No <br><br> 
			<input name="add_incident" type="submit" />
		</form>
	<?php
	}

	if(isset($_POST['update']))
	{
		$id = $_POST['id'];
		?>
		<form action="http://localhost/ins.php" method="post" >
	  	 Incident id: <select id="cd" name="cd">
	   <?php
			            $db_connection = new mysqli("localhost", "root", "", "test");		  
						    if ($db_connection->connect_error) 
						    {
						      die("Connection failed: " . $db_connection->connect_error);
						    }
	   $query="SELECT incident_id FROM insurableevent WHERE client_id='$id';";
	   $result=$db_connection->query($query);            
	    while ($row=$result->fetch_assoc()) 
	 	{
	        	$incd_id=$row["incident_id"];
	                echo "<option > $incd_id </option>";            
	   	}  
		?>
		  </select>		        
	 Resolved: <input type="radio" name="inc_resolved" <?php if (isset($resolved) && $inc_resolved=="Yes");?> value=1>Yes
		   <input type="radio" name="inc_resolved" <?php if (isset($resolved) && $inc_resolved=="No");?> value=0>No <br><br>
	    			   	   <input name="update_incident" value="Update" type="submit" />
	    	</form>
		<?php   	
	}

	if(isset($_POST['cost']))
	{
	$id = $_POST['id'];
	$db_connection = new mysqli("localhost", "root", "12345", "test");
  		if ($db_connection->connect_error) {
	      		die("Connection failed: " . $db_connection->connect_error);
	    	}
		
	$add_query = "SELECT COUNT(*), SUM(owner_fault), SUM(other_fault), SUM(cost), SUM(resolved) FROM insurableevent WHERE client_id=$id;";
	$result = $db_connection->query($add_query); 
	while ($row=$result->fetch_assoc())
	{
		echo "\n Total number of incidents: ".$row["COUNT(*)"];
		echo "\n Your fault: ".$row["SUM(owner_fault)"];
		echo "\n Other party's fault: ".$row["SUM(other_fault)"];
		echo "\n Total cost: ".$row["SUM(cost)"];
		echo "\n Resolved: ".$row["SUM(`resolved`)"];
	 	echo "\n Your monthly cost will be: ".($row["COUNT(*)"] + $row["SUM(cost)"]) / (12 *($row["SUM(owner_fault)"] + $row["SUM(resolved)"]));
	 }
	}
?>
