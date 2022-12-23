<?php 
  
  $mysqli = new mysqli("localhost", "root", "zerozero");
  
  // Check connection
  if ($mysqli->connect_errno)
  {
      echo "Failed to connect to MySQL: " . $mysqli->connect_error;
      exit();
  }
  
  $db = "events";
  // Create database
  $sql = "CREATE DATABASE events";
  if ($conn->query($sql) === TRUE)
  {
      echo "Database created successfully";
  } else {
      echo "Error creating database: " . $conn->error;
  }
  
  $conn = new mysqli($servername, $username, $password, $db);
  
  // Check connection
  if ($conn->connect_error)
  {
    die("Connection failed: " . $conn->connect_error);
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
?>