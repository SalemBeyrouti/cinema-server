<?php

$db_host = "localhost";
$db_name = "cinema_booking";
$db_user = "root";
$db_pass = null;


$mysqli= new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
function connect() {
    global $mysqli;
    return $mysqli;
}