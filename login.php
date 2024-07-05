<?php
require_once("database.php");
require_once("register.php");
require_once("userlogin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('login').addEventListener('submit', function (e) {
                //get form data using getelementbyid
                const email = document.getElementById('email').value;
                const password = document.getElementById('login-password').value;
                const emailError = document.getElementById('email-error');
                const passwordError = document.getElementById('password-error');
                
                let valid = true;

                //checks for valid email and password
                if (!validateEmail(email)) {
                    emailError.textContent = 'Please enter a valid email';
                    valid = false;
                } else {
                    emailError.textContent = '';
                }

                if (!validatePassword(password)) {
                    passwordError.textContent = 'Password must be at least 8 characters long and contain at least one capital letter, one special character, and one number.';
                    valid = false;
                } else {
                    passwordError.textContent = '';
                }

                if (!valid) {
                    e.preventDefault();
                }
            });

            // Function to validate email format using regular expression
            function validateEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }

            // Function to validate password format using regular expression
            function validatePassword(password) {
                const re = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+{}:;<>,.?~\\/-])[A-Za-z\d!@#$%^&*()_+{}:;<>,.?~\\/-]{8,}$/;
                return re.test(password);
            }
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="form-container" id="login-form">
            <h1>Login</h1>
            <form method="POST" id="login">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                    <span id="email-error" class="error-message"></span>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="login-password" name="password" required>
                    <span id="password-error" class="error-message"></span>
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
