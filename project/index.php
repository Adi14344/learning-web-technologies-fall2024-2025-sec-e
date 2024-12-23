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
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FROM LOGIN AND REGISTER</title>
</head>
<body>
	<style type="text/css">	
	body
	{
		background: url(10.jpg);
		background-size: cover;		
		display: flex;
		justify-content: center;
		align-items: center;
		width: 20%;
		height: 50%;
		font-family: sans-serif;
		margin: auto;
		margin-top: 5px;
		font-size:  bold 10px;
		color: whitesmoke;
	}

	h1
	{
		font-size: 150px;
		color: whitesmoke;
	}

	a
	{
		font-size: 60px;
	}
	</style>

	<h1>Welcome</h1>
	<a href="login.php">logout</a>
</body>
</html>