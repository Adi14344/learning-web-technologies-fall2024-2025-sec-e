<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $authorName = trim($_POST['authorName']);
    $contactNo = trim($_POST['contactNo']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Check for null or empty values
    if (empty($authorName) || empty($contactNo) || empty($username) || empty($password)) {
        die('All fields are required.');
    }

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'blog_system');

    // Check connection
    if ($conn->connect_error) {
        die('Database connection failed: ' . $conn->connect_error);
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert data into the authors table
    $sql = "INSERT INTO authors (authorName, contactNo, username, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss', $authorName, $contactNo, $username, $hashedPassword);

    if ($stmt->execute()) {
        echo 'Signup successful! You can now log in.';
    } else {
        echo 'Error: ' . $stmt->error;
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>
