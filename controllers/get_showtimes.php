<?php
require_once 'BaseController.php';
require_once '../models/Showtime.php';

class GetShowtimeController extends BaseController {
    public function __construct() {
        parent::__construct();

        if (!$this->isGet()) {
            $this->respond(405, "Only get allowed");
        }

        if (!isset($_GET["id"])) {
            $showtimes = Showtime::all($this->mysqli);
            $result = array_map(fn($showtime) => $showtime->toArray(), $showtimes);
            $this->respond(200, "showtimes fetched", $result);
            return;
        }

        $id = (int)$_GET["id"];
        $showtime  = Showtime::find($this->mysqli, $id);

        if (!$showtime) {
            $this->respond(404, "showtime not found");
        }

        $this->respond(200, "showtime fetched", $showtime->toArray());
    }
}

new GetShowtimeController();
