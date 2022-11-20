<?php
	$conn = new mysqli('localhost', 'root', '', 'onlinevoting');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>