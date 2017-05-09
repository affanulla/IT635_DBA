<?php

	$emp = $_POST['emp'];
	
try
	{
		$mdb = new MongoDB\Driver\Manager("mongodb://affan:12345@ds133331.mlab.com:33331/vehicleinsurance");
		$connect = new MongoDB\Driver\Command(['ping' => 1]);
		$mdb -> executeCommand('db', $connect);
		
		$employee = array ('Name'=>$emp);
		$query = new MongoDB\Driver\Query($employee);
		$results = $mdb->executeQuery("vehicleinsurance.favvehicles",$query);
		
		$name = Null;
		$place = Null;
		$vehiown = Null;
		$v1 = Null;
		$v2 = Null;
		$v3 = Null;

		foreach ($results as $output) 
		{
			$name = $output->Name;
			$place = $output->Place;
			$vehiown = $output->VehiclesOwned;
			$v1 = $output->Vehicle1;
			$v2 = $output->Vehicle2;
			$v3 = $output->Vehicle3;
		}
		
		echo "<h4> Employee Exotics </h4>";
		echo "Name: ".$name."<br>"."Place: ".$place."<br>"."Vehicles Owned: ".$vehiown."<br> <br>";
		echo "&nbsp; &nbsp; &nbsp;".$v1."<br> &nbsp; &nbsp; &nbsp;".$v2."<br> &nbsp; &nbsp; &nbsp;".$v3."<br><br>";

		echo '<form action="http://localhost/profile.html" method="post">';
		echo '<input type="submit" value="Go Back" name="Submit" /></form>';
	}
catch(exception $e)
	{
		echo $e;	
	}
?>
