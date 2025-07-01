<?php

require("../connection/connection.php");

$mysqli = connect();

$query = "CREATE TABLE bookings
(id INT AUTO_INCREMENT PRIMARY KEY, user_id INT NOT NULL, seat_id INT NOT NULL, movie_id INT NOT NULL, booking_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP, FOREIGN KEY (user_id) REFERENCES users(id), FOREIGN KEY (seat_id) REFERENCES seats(id), FOREIGN KEY (movie_id) REFERENCES movies(id))";

if ($mysqli->query($query)) {
    echo "Booking created";
    
} else {
    echo "Error creating booking" . $mysqli->error;
}