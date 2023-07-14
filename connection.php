<?php
$server_name = 'localhost';
$user_name = 'root';
$password = '';
$databse_name = 'mydb';

// Create connection
$conn = new mysqli($server_name, $user_name, $password, $databse_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS Usertable (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(250) NOT NULL UNIQUE,
firstname VARCHAR(50) NOT NULL,
lastname VARCHAR(50) NOT NULL,
email VARCHAR(50),
password VARCHAR(255) NOT NULL,
`activationcode` varchar(255) NOT NULL,
`status` int(11) NOT NULL,
created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
  //echo "Table Usertable created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

?>