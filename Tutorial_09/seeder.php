<?php
require 'carbontest.php';

use Carbon\Carbon;

$mysqli = new mysqli("localhost", "root", "zerozero");

// Check connection
if ($mysqli->connect_errno)
{
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Create database
$sql = "CREATE DATABASE events";
if ($conn->query($sql) === TRUE)
{
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// sql to create table
$sql = "CREATE TABLE EventList (
    id INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    content text NULL,
    is_published boolean,
    created_datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE)
{
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}



function getRandomString($length)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';

    for ($i = 0; $i < $length; $i++) {
        $string .= $characters[mt_rand(0, strlen($characters) - 1)];
    }

    return $string;
}

// prepare and bind
$stmt = $mysqli->prepare("INSERT INTO EventList (title, content, is_published, created_datetime) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $title, $content, $is_published, $date);



// set parameters and execute

for ($i = 1; $i < 2005; $i++)
{
    $title = getRandomString(5);
    $content = getRandomString(150);
    $is_published = rand(0, 1);
    $date = Carbon::today()->subDays(rand(0, 365));


    $stmt->execute();
}

echo "New records created successfully";

$stmt->close();
$mysqli->close();
