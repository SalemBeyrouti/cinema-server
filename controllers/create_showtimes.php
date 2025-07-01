<?php
require_once "BaseController.php";
require_once "../models/Showtime.php";

class CreateShowtimeController extends BaseController {
    public function __construct() {
        parent::__construct();

        if (!$this->isPost()) {
            $this->respond(405, "only post allowed");
        }

        $input = $this->jsonInput();

        if (!$this->requireFields($input, ["movie_id", "auditorium_id", "price", "start_time", "end_time"])) return;

        $showtime = Showtime::insert($this->mysqli, $input);

        $this->respond(200, "Showtime created", $showtime->toArray());
    }
}

new CreateShowtimeController();
