<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Check for empty fields
    if (empty($username) || empty($password)) {
        die('Both fields are required.');
    }

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'blog_system');

    // Check connection
    if ($conn->connect_error) {
        die('Database connection failed: ' . $conn->connect_error);
    }

    // Fetch the user from the database
    $sql = "SELECT * FROM authors WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['author_id'] = $user['id'];
            $_SESSION['author_name'] = $user['authorName'];
            echo "Login successful! Welcome, " . $_SESSION['author_name'] . ".";
            // Redirect to another page, e.g., dashboard.php
            header('Location: dashboard.php');
            exit;
        } else {
            echo 'Invalid username or password.';
        }
    } else {
        echo 'Invalid username or password.';
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>
