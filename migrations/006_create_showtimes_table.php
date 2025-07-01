<?php

require("../connection/connection.php");

$mysqli = connect();

$query = "CREATE TABLE showtimes
(id INT AUTO_INCREMENT PRIMARY KEY,
movie_id int NOT NULL,
auditorium_id INT NOT NULL,
price INT NOT NULL,
start_time DATETIME NOT NULL ,
end_time DATETIME NOT NULL ,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
FOREIGN KEY (movie_id) REFERENCES movies(id),
FOREIGN KEY (auditorium_id) REFERENCES auditoriums(id))";


if ($mysqli->query($query)) {
    echo "Auditorium table created";
    
} else {
    echo "Error creating table" . $mysqli->error;
}
