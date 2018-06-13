<?php

function connect_db($host, $user, $password, $db) {
	$con = new mysqli($host, $user, $password, $db);
	if ($con->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	return $con;
}

?>