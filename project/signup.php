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

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $gender = $_POST['gender'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $email = $_POST['mail'];
    $password = $_POST['pass'];

    if (!empty($email) && !empty($password) && filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        $query = "INSERT INTO datatable(first_name, last_name, gender, number, address, mail, pass) VALUES ('$firstname', '$lastname', '$gender', '$number', '$address', '$email', '$password')";

        $result = mysqli_query($conn, $query);

        if ($result) 
        {
            echo "Successfully registered!!";
        }
    } 
    else 
    {
        echo "Please Enter Some Valid Information!!";
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

<body>
<!-- ----------------------------START_CSS----------------------- -->
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
	#signup
	{
		background-color: transparent;
 		backdrop-filter: blur(2px);
		border-radius: 60px;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	input[type="submit"]
	{
		width: 70px;
		height: 25px;
		border: 1px solid white;
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

	h1
	{
		color: whitesmoke;
	}

	p
	{
		font-size: 13px;
		color: white;
	}
	</style>
<!-- ----------------------------END_CSS----------------------- -->

	<div id="signup">
	<div class="signup">

		<center>
		<fieldset>
		<legend><h1>Sign up</h1></legend>
		<!-- <h4>it's free & only a minute!</h4> -->

		<form method="POST">
			<label>First Name</label>
			<br>
			<input type="text" name="first_name" required>
			<br></br>
			<label>Last Name</label>
			<br>
			<input type="text" name="last_name" required>
			<br></br>
			<label>Gender</label>
			<br>
			<input type="text" name="gender" required>
			<br></br>
			<label>Contact</label>
			<br>
			<input type="tel" name="number" required>
			<br></br>
			<label>Address</label>
			<br>
			<input type="text" name="address" required>
			<br></br>
			<label>Email</label>
			<br>
			<input type="email" name="mail" required>
			<br></br>
			<label>Password</label>
			<br>
			<input type="Password" name="pass" required>
			<br></br>

			<legend><input type="submit" name="" value="Submit"></legend>
		</fieldset>
		</form>
			<p>Already have an account?<br> 
				<a href="login.php">login Here</a>
			</p>
			<p>By clicking the sign up button, you agree to our<br>
				<a href=""> Terms and Condition </a> and
				<a href="#">policy privacy</a>
			</p>
		</center>

</body>
</html>
<!-- ----------------------------END_HTML----------------------- -->
