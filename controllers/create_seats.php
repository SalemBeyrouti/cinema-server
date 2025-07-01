<?php
require_once 'BaseController.php';
require_once '../models/Seat.php';

class CreateSeatsController extends BaseController {
    public function __construct() {
        parent::__construct();

        if (!$this->isPost()) {
            $this->respond(405, "only post request");
        }

        $input = $this->jsonInput();

        if (!$this->requireFields($input, ["movie_id", "rows", "seats_per_row"])) return;

        $movie_id = (int) $input["movie_id"];
        $rows = $input["rows"]; 
        $seats_per_row = (int) $input["seats_per_row"];

        $created = [];

        foreach ($rows as $row) {
            for ($i = 1; $i <= $seats_per_row; $i++) {
                $data = [
                    "movie_id" => $movie_id,
                    "row" => $row,
                    "number" => $i,
                    "is_booked" => false
                ];

                $seat = Seat::insert($this->mysqli, $data);
                $created[] = $seat->toArray();
            }
        }

        $this->respond(201, "Seats created successfully", $created);
    }
}

new CreateSeatsController();
