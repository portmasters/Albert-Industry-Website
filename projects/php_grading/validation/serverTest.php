<?php	
	//server test
	$host = 'host';
	$database = 'database';
	$db_username = 'user';
	$db_password = 'password';
	$conn = new mysqli($host, $db_username, $db_password, $database);

	if($conn -> connect_error)

	{
		die("Connection failed: ".$conn -> connect_error);
	}
?>