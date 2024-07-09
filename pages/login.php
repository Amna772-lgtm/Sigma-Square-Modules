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
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <div class="container">
        <div class="form-container" id="login-form">
            <h1>Login</h1>
            <form method="POST" id="login">
                <input type="hidden" name="action" value="login">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="abc@gmail.com" required>
                    <span id="email-error" class="error-message"></span>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="login-password" name="password" placeholder="Enter your password"
                        required>
                    <span id="password-error" class="error-message"></span>
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
    <script src="../js/login.js"></script>
</body>

</html>