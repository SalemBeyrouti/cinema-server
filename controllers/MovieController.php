<?php

require(__DIR__ . "/../models/Movie.php");
require(__DIR__ . "/../connection/connection.php");
require_once(__DIR__ . "/../services/ResponseService.php");
require_once(__DIR__ . "/BaseController.php");
require_once(__DIR__ . '/../services/MovieService.php');

class MovieController extends BaseController {

    public function createMovie() {
        if (!$this->isPost()) {
            $this->error("only post");
        }

        $input = $this->jsonInput();

        if (!$this->requireFields($input, [
            "title", "description", "genre", "poster_url", "release_date", "duration"
        ])) return;

        $movie = Movie::create($this->mysqli, $input);

        $movie 
            ? $this->success($movie->toArray())
            : $this->error("failed to create");
       
    }


    public function getMovies() {
        if (!$this ->isGet()) {
            $this->error( "only get");
        }
    

    if (!isset($_GET['id'])) {
        $movies = Movie::all($this->mysqli);

        return $this->success(MovieService::moviesToArray($movies));
        

    }
    $id = $_GET["id"];
    $movie = Movie::find($this->mysqli, $id);

    $movie 
        ? $this->success($movie->toArray())
        : $this->error("failed to create");
    }



    
}