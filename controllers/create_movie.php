<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

require ("../models/Movie.php");
require ("../connection/connection.php");

$response = [];
$response["status"] = 200;

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    $response["status"] = 405;
    $response["message"] = "cant do that";
    echo json_encode($response);
    return;

}

$input = json_decode(file_get_contents("php://input"), true);


$required_fields = ["title", "description", "genre", "duration", "poster_url", "release_date"];

foreach($required_fields as $field) {
    if (!isset($input[$field])   ||  empty($input[$field])) {

        $response["status"] = 400;
        $response["message"] = "cant do that";
        echo json_encode($response);
        return;
    }

}

$movie = Movie::insert($mysqli, $input);
$response["movie"] = $movie->toArray();

echo json_encode($response);
return;



