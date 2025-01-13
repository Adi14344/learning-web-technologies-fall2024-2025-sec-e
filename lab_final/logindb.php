<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "database";
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) 
	{
    	echo "Not connected";
	}