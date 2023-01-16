<?php

$servername = "localhost";
$username = "root";
$password = "root";
$db = "user";



$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE UserList (
    id INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    email VARCHAR(255),
    phone VARCHAR(255),
    userpassword VARCHAR(255),
    useraddress VARCHAR(255),
    userprofile VARCHAR(255) NULL
    )";

if ($conn->query($sql) === TRUE)
{
    echo "Table UserList created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
//file create
if (!is_dir('../Tutorial_10/uploads'))
{
    mkdir('../Tutorial_10/uploads', 0777, true);
    echo "suc";
}
