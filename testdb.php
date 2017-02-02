#!/usr/bin/php

<?php
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

$db->close();

echo "program complete\n";
?>
