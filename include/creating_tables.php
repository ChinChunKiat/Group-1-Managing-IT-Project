<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pasti_nyala_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to create a table named 'users'
$sql = "CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL
)";

// Execute query and check for success
if ($conn->query($sql) === TRUE) {
    echo "Table 'users' created successfully<br>";
} else {
    echo "Error creating table 'users': " . $conn->error . "<br>";
}

// SQL query to create a table named 'admins'
$sql .= "CREATE TABLE admins (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL
)";

// Execute query and check for success
if ($conn->query($sql) === TRUE) {
    echo "Table 'admins' created successfully<br>";
} else {
    echo "Error creating table 'admins': " . $conn->error . "<br>";
}

// SQL query to create a table named 'user_information'
$sql .= "CREATE TABLE user_information (
    user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    age INT,
    email VARCHAR(255),
    gender VARCHAR(10),
    UID VARCHAR(20),
    department VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

// Execute query and check for success
if ($conn->query($sql) === TRUE) {
    echo "Table 'user_information' created successfully<br>";
} else {
    echo "Error creating table 'user_information': " . $conn->error . "<br>";
}

// CREATE TABLE Module (
//     module_id INT AUTO_INCREMENT PRIMARY KEY,
//     module_name VARCHAR(255) NOT NULL,
//     module_code VARCHAR(20) NOT NULL,
//     module_description TEXT,
//     department_id INT,
//     FOREIGN KEY (department_id) REFERENCES Department(department_id)
// );
// Close connection
$conn->close();
?>
