<?php
require_once "database.php";
require_once "register.php";


// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Create an instance of the Register class
    $register = new Register();

    // Check if the user exists and the password is correct
    if ($register->login($email, $password)) {
        echo "<script>alert('Successfully logged in'); window.location.href = 'welcomepg.php';</script>";
    } else {
        echo "<script>alert('Invalid email or password'); window.location.href = 'login.php';</script>";
    }
} else {
    echo "";
}
?>