<?php
require_once "BaseController.php";
require_once "../models/Movie.php";

class CreateMovieController extends BaseController {
    public function __construct() {
        parent::__construct();

        if (!$this->isPost()) {
            $this->respond(405, "Only POST allowed");
        }

        $input = $this->jsonInput();

        if (!$this->requireFields($input, ["title", "description", "genre", "poster_url", "release_date", "duration"])) return;

        $movie = Movie::insert($this->mysqli, $input);

        $this->respond(200, "Movie created", $movie->toArray());
    }
}

new CreateMovieController();
