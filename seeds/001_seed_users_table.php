<?php

require("../connection/connection.php");

$stmt = $mysqli->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");


$users = [
    ['Salem Beyrouti', 'salem_beyrouti@hotmail.com', password_hash('123456', PASSWORD_DEFAULT)],
    ['Charbel Daoud', 'charbel_daoud@hotmail.com', password_hash('qwerty', PASSWORD_DEFAULT)],
    ['Taha Taha', 'taha_taha@hotmail.com', password_hash('password', PASSWORD_DEFAULT)]
];


foreach ($users as $user) {
    $stmt->bind_param("sss", $user[0], $user[1], $user[2]);
    $stmt->execute();
}

echo "Users table seeded successfully";

