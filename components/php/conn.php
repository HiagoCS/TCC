<?php
	//Variables to connect into database
	$server = "localhost";
	$username = "root";
	$pass = "hiago@1504";
	$db = "tcc";

	//If connection failed returns error, else returns nothing
	$conn = new mysqli($server, $username, $pass, $db);
	if ($conn->connect_error) {
 	 die("Connection failed: " . $conn->connect_error);
	}
?>