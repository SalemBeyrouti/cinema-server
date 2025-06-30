<?php

require("../connection/connection.php");

$mysqli = connect();

$query = "CREATE TABLE movies
 (id INT AUTO_INCREMENT PRIMARY KEY, title VARCHAR (255) NOT NULL,description TEXT NOT NULL, genre VARCHAR(255) NOT NULL, duration INT NOT NULL, poster_url TEXT NOT NULL, release_date DATE NOT NULL, is_active BOOLEAN DEFAULT TRUE, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";


if ($mysqli->query($query)) {
    echo "Movies table created";
} else {
    echo "Error creating table" . $mysqli->error;
}