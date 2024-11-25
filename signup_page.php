<?php
session_start();
 
if (isset($_POST['submit'])) {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $gender = trim($_POST['gender']);
    $contact = trim($_POST['contact']);
    $address = trim($_POST['address']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
 
    
    if (empty($first_name) || empty($last_name) || empty($gender) || empty($contact) || empty($address) || empty($email) || empty($password)) {
        echo "Please fill out all fields.";
    } else {
        // Store the user data in session (in real applications, store this in a database)
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['gender'] = $gender;
        $_SESSION['contact'] = $contact;
        $_SESSION['address'] = $address;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = password_hash($password, PASSWORD_DEFAULT); // Secure password hash
        echo "Registration successful! You can now <a href='login_page.html'>login here</a>.";
    }
} else {
    // If the form is not submitted, show an error
    echo "Invalid request.";
}
?>