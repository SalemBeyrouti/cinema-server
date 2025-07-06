<?php

require(__DIR__ . "/../models/Movie.php");
require(__DIR__ . "/../connection/connection.php");
require_once(__DIR__ . "/../services/ResponseService.php");
require_once(__DIR__ . "/BaseController.php");
require_once(__DIR__ . '/../services/MovieService.php');

class MovieController extends BaseController {

    public function createMovie() {
        if (!$this->isPost()) {
            $this->respond(401, "only post");
        }

        $input = $this->jsonInput();

        if (!$this->requireFields($input, [
            "title", "description", "genre", "poster_url", "release_date", "duration"
        ])) return;

        $movie = Movie::create($this->mysqli, $input);

        if(!$movie) {
            $this->respond(402, "failed to create");
            return;
        }
        $this->respond(201, "movie created", $movie->toArray());
       
    }


    public function getMovies() {
        if (!$this ->isGet()) {
            $this->respond(400, "only get");
        }
    

    if (!isset($_GET['id'])) {
        $movies = Movie::all($this->mysqli);
        
        $movies_array = MovieService::moviesToArray($movies);
        $this->respond(200, "Movies fetched", $movies_array);
        return;
    }
    $id = $_GET["id"];
    $movie = Movie::find($this->mysqli, $id);

    if(!$movie) {
        $this->respond(400, "movie not found");
        return;
    }
    $this->respond(200, "movie fetched", $movie->toArray());
    }



    
}