<?php

require("../connection/connection.php");

$mysqli = connect();


$query = "CREATE TABLE snacks 
(id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR (255) NOT NULL, price DECIMAL(6,2) NOT NULL, Image_url TEXT, qunatity INT NOT NULL DEFAULT 0, created_at DATETIME DEFAULT CURRENT_TIMESTAMP, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

if ($mysqli->query($query)) {
    echo "Movies table created";
} else {
    echo "Error creating table" . $mysqli->error;
}