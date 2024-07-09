<?php
/**
 * User authentication initialization.
 *
 * This file includes all necessary files for handling user authentication
 * 
 *
 * @package    Module_Task
 * 
 */

require_once "../php/includes.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <div class="container">
        <div class="form-container" id="register-form">
            <h1>Register</h1>
            <form method="POST" id="register">
                <input type="hidden" name="action" value="register">
                <div class="input-group">
                    <label for="register-name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>
                    <span id="name-error" class="error-message"></span>
                </div>
                <div class="input-group">
                    <label for="register-email">Email</label>
                    <input type="email" id="email" name="email" placeholder="abc@gmail.com" required>
                    <span id="email-error" class="error-message"></span>
                </div>
                <div class="input-group">
                    <label for="register-password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    <span id="password-error" class="error-message"></span>
                </div>
                <div class="input-group">
                    <label for="register-confpassword">Confirm Password</label>
                    <input type="password" id="confpassword" name="confpassword" placeholder="Enter password again"
                        required>
                    <span id="confpassword-error" class="error-message"></span>
                </div>
                <button type="submit">Register</button>
            </form>
        </div>
    </div>
    <script src="../js/signup.js"></script>
</body>

</html>