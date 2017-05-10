<h2> <i> Vehicle Insurance System </i> </h2>

<?php

	$user = $_POST['user'];
	$pass = $_POST['pass'];

	if ($user == "admin" AND $pass == "12345")
	{
		echo "<u><i>Login Successful</i></u><br><br>";		
		echo '<form action="http://localhost/login.html" method="post">';
		echo '<input type="submit" value="Client Data" name="Submit" /></form>';
	}
	else 
	{
		echo "Check Your Credentials <br> <br>";
		echo '<form action="http://localhost/index.html" method="post">';
		echo '<input type="submit" value="Go Back" name="Submit" /></form>';
	}

?>
