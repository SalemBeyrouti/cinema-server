<?php
require ("../connection/connection.php");
require ("../models/Movie.php");

$response = [];
$response ["status"] = 200;

if (!isset($_GET["id"])){

    $movies = Movie::all( $mysqli); 
    $response["movies"] = [];

    foreach($movies as $m) {

        $response["movies"][] = $m->toArray();

    }
    echo json_encode($response);
    return;
}

$id = $_GET["id"];
$movie = Movie::find($mysqli, $id);
$response["movie"] = $movie->toArray();

echo json_encode($response);
return;