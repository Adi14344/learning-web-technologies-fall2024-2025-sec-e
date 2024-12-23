<!-- ----------------------------START_PHP----------------------- -->
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

	if ($_SERVER['REQUEST_METHOD'] == "POST") 
	{
    	$email = $_POST['mail'];
    	$password = $_POST['pass'];

    if (!empty($email) && !empty($password) && !is_numeric($email)) 
    {
        $query = "SELECT * FROM datatable WHERE mail = '$email'";
        $result = mysqli_query($conn, $query);

        if ($result) 
        {
            if ($result && mysqli_num_rows($result) > 0) 
            {
                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['pass'] == $password) 
                {
                    header("Location: index.php");
                    die;
                }
            }
        }
    } 
    else 
    {
        echo "Wrong user or password";
    }
}

?>
<!-- ----------------------------END_PHP----------------------- -->

<!-- ----------------------------START_HTML----------------------- -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FROM LOGIN AND REGISTER</title>
	
</head><center>

<body>
<!-- ----------------------------START_CSS----------------------- -->
	<style type="text/css">
	body
	{
		display: flex;
		justify-content: center;
		align-items: center;
		background: url(10.jpg);
		background-size: cover;
		width: 40%;
		height: 100vh;
		font-family: sans-serif;
		margin: auto;
		margin-top: 20px;
		font-size: bold 20px;
		color: white;

	}
	#login
	{
		background-color: transparent;
 		backdrop-filter: blur(2px);
		border-radius: 60px;
		margin: auto;
		width: 300px;
		padding: 10px;
	}

	input[type="submit"]
	{
		width: 70px;
		height: 25px;
		border: 1px solid green;
		background-color: skyblue;
		color: black;
		font-size: 18px;
		cursor: pointer;
	}

	input[type="submit"]:hover
	{
		color: white;
		background: rgb(13, 211, 247, 1.0);
	}

	p
	{
		font-size: 13px;
		color: white;
	}
	</style>
<!-- ----------------------------END_CSS----------------------- -->

	<div id="login">
	<div class="login">
	<fieldset>
	<legend><h1>login</h1></legend>

	<form method="POST">
			<label>Email</label>
			<br>
			<input type="email" name="mail" required>
			<br></br>
			<label>Password</label>
			<br>
			<input type="Password" name="pass" required>
			<br></br>
			<input type="submit" name="" value="Submit">
		</fieldset>
	</form>
		<p>Not have an account? <a href="signup.php">Signup here!!</p>
</body>
</html>
<!-- ----------------------------END_HTML----------------------- -->
