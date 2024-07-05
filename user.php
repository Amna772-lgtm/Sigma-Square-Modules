<?php
require_once "register.php";
require_once "database.php";


// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Create an instance of the Register class
    $register = new Register();

    // Check if the user already exists
    if ($register->isUserExists($email)) {
        echo "<script>alert('User already exists'); window.location.href = 'signup.php';</script>";
    } else {
        // Register the user
        $result = $register->register($name, $email, $password);

        // Check if the registration was successful
        if ($result === 'User registered successfully') {
            // Redirect to login page
            header('Location: login.php');
            exit();
        } else {
            echo $result;
        }
    }
} else {
    echo "";
}
?>
