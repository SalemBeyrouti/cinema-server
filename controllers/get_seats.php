<?php
require_once 'BaseController.php';
require_once '../models/Seat.php';

class GetSeatsController extends BaseController {
    public function __construct() {
        parent::__construct();

        if (!$this->isGet()) {
            $this->respond(405, "Only get allowed");
        }

        if (!isset($_GET["id"])) {
            $seats = Seat::all($this->mysqli);
            $result = array_map(fn($seat) => $seat->toArray(), $seats);
            $this->respond(200, "Seats fetched", $result);
        }

        $id = (int)$_GET["id"];
        $seat = Seat::find($this->mysqli, $id);

        if (!$seat) {
            $this->respond(404, "Seat not found");
        }

        $this->respond(200, "Seat fetched", $seat->toArray());
    }
}

new GetSeatsController();
