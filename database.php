<?php
class Database {
    private $servername = "localhost:3307";
    private $username = "root";
    private $password = "";
    private $db = "register";
    public $conn;

    // Constructor
    public function __construct(){
        $this->connect();
    }

    // Method to create connection with the database
    private function connect(){
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->db);

        if($this->conn->connect_error){
            die("Connection failed: " . $this->conn->connect_error);
        }
        echo "Connected successfully";
    }
    //function to get connection
    public function getConnection() {
        return $this->conn;
    }
}
?>
