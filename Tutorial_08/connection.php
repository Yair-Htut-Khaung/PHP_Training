<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db = "yair_htut_khaung";



$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE `EventList` (
    id INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    content text NULL,
    is_published boolean,
    created_datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE)
{
    echo "Table created successfully";
} else {
    // echo "Error creating table: " . $conn->error;
}