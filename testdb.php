#!/usr/bin/php

<?php

class StudentAccess
{
private $db;
funtion_contruct()
{
	
}

}
$db = new mysqli("localhost","root","12345","Classes");

// comment
/* comment*/
// comment

if($db->connect_errno !=0)
{
	echo "Error".$db->connect_error.PHP_EOL;
	exit();
}

echo "connection successful".PHP_EOL;


$query = "select *from class;";

$queryresponse = $db -> query($query);
var_dump($queryresponse);

while($row = $queryresponse->fetch_assoc())
{
	print_r($row);
}

$db->close();


?>
