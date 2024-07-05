<?php
require_once("database.php");
require_once("register.php");
require_once("user.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Form validation using JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('register').addEventListener('submit', function (e) {

                // Get form elements' data using getElementById
                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;
                const confpassword = document.getElementById('confpassword').value;
                const emailError = document.getElementById('email-error');
                const passwordError = document.getElementById('password-error');
                const confpasswordError = document.getElementById('confpassword-error');
                const nameError = document.getElementById('name-error');

                let valid = true;

                // Name validation
                if (name.trim() === '') {
                    nameError.textContent = 'Name is required';
                    valid = false;
                } else {
                    nameError.textContent = '';
                }

                // Email validation check
                if (!validateEmail(email)) {
                    emailError.textContent = 'Please enter a valid email';
                    valid = false;
                } else {
                    emailError.textContent = '';
                }

                // Check for password validation
                if (!validatePassword(password)) {
                    passwordError.textContent = 'Password must be at least 8 characters long and contain at least one capital letter, one special character, and one number.';
                    valid = false;
                } else {
                    passwordError.textContent = '';
                }

                // Check both passwords are the same
                if (password !== confpassword) {
                    confpasswordError.textContent = 'Passwords do not match';
                    valid = false;
                } else {
                    confpasswordError.textContent = '';
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
                return re.test(password); // Test password value
            }
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="form-container" id="register-form">
            <h1>Register</h1>
            <form method="POST" id="register">
                <div class="input-group">
                    <label for="register-name">Name</label>
                    <input type="text" id="name" name="name" required>
                    <span id="name-error" class="error-message"></span>
                </div>
                <div class="input-group">
                    <label for="register-email">Email</label>
                    <input type="email" id="email" name="email" required>
                    <span id="email-error" class="error-message"></span>
                </div>
                <div class="input-group">
                    <label for="register-password">Password</label>
                    <input type="password" id="password" name="password" required>
                    <span id="password-error" class="error-message"></span>
                </div>
                <div class="input-group">
                    <label for="register-confpassword">Confirm Password</label>
                    <input type="password" id="confpassword" name="confpassword" required>
                    <span id="confpassword-error" class="error-message"></span>
                </div>
                <button type="submit">Register</button>
            </form>
        </div>
    </div>
</body>
</html>
