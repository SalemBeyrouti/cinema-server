<?php

require("../connection/connection.php");

$mysqli = connect();

$query = "CREATE TABLE seats
(id INT AUTO_INCREMENT PRIMARY KEY, movie_id INT NOT NULL, row VARCHAR(10) NOT NULL, number INT NOT NULL, is_booked BOOLEAN DEFAULT FALSE, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, FOREIGN KEY (movie_id) REFERENCES movies(id))";


if ($mysqli->query($query)) {
    echo "Seats table created";
    
} else {
    echo "Error creating table" . $mysqli->error;
}