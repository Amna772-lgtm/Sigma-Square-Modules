<?php
require_once "database.php";

class Register {
    private $conn;

    public function __construct(){
        $db = new Database();   // Creating an object of the Database class
        $this->conn = $db->conn;
    }

    public function register($name, $email, $password) {
        // Hash the password to store in database
        $hashpwd = password_hash($password, PASSWORD_DEFAULT);

        //SQL statement using prepared statements for inserting data
        $stmt = $this->conn->prepare('INSERT INTO user (name, email, password) VALUES (?, ?, ?)');
        if ($stmt === false) {
            die('Prepare failed: ' . $this->conn->error);
        }

        // Bind parameters to the placeholders
        $stmt->bind_param('sss', $name, $email, $hashpwd);

        // Execute the statement (query)
        if ($stmt->execute()) {
            return 'User registered successfully';
        } else {
            return 'Failed to register user: ' . $stmt->error;
        }
    }

    // Function to check if user already exists or not
    public function isUserExists($email) {
        $checkUser = "SELECT email FROM user WHERE email = ? LIMIT 1";
        $stmt = $this->conn->prepare($checkUser);
        if ($stmt === false) {
            die('Prepare failed: ' . $this->conn->error);
        }

        // Bind parameters to the placeholders
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();

        //check no of records
        if ($stmt->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    //function to check login functionality
    public function login($email, $password) {
        // Prepare the SQL statement for login 
        $stmt = $this->conn->prepare('SELECT password FROM user WHERE email = ? LIMIT 1');
        if ($stmt === false) {
            die('Prepare failed: ' . $this->conn->error);
        }
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();

        // Verify the password of user trying to login
        if ($stmt->num_rows > 0 && password_verify($password, $hashedPassword)) {
            return true;
        } else {
            return false;
        }
    }
}
?>
