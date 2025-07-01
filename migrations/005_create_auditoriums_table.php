<?php

require("../connection/connection.php");

$mysqli = connect();

$query = "CREATE TABLE auditoriums
(id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
seat_capacity INT DEFAULT 30,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";


if ($mysqli->query($query)) {
    echo "Auditorium table created";
    
} else {
    echo "Error creating table" . $mysqli->error;
}
