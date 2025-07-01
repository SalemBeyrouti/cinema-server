<?php
require_once 'BaseController.php';
require_once '../models/Movie.php';

class GetMoviesController extends BaseController {
    public function __construct() {
        parent::__construct();

        if (!$this->isGet()) {
            $this->respond(405, "Only GET requests are allowed");
        }

        if (!isset($_GET["id"])) {
            $movies = Movie::all($this->mysqli);
            $result = array_map(fn($movie) => $movie->toArray(), $movies);
            $this->respond(200, "movies fetched", $result);
        }

        $id = (int)$_GET["id"];
        $movie = Movie::find($this->mysqli, $id);

        if (!$movie) {
            $this->respond(404, "Movie not found");
        }

        $this->respond(200, "Movie fetched", $movie->toArray());
    }
}

new GetMoviesController();
