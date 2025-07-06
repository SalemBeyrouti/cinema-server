<?php

require(__DIR__ . "/../models/Seat.php");
require(__DIR__ . "/../connection/connection.php");
require_once(__DIR__ . "/BaseController.php");
require_once(__DIR__ . '/../services/SeatService.php');

class SeatController extends BaseController {

    public function createSeat() {
        if (!$this->isPost()) {
            $this->error("only post");
        }

        $input = $this->jsonInput();

        if(!$this->requireFields($input, [
            "auditorium_id", "row", "number"
        ])) return;

        $seat = Seat::insert($this->mysqli, [
            "auditorium_id" => $input["auditorium_id"],
            "row" => $input["row"],
            "number" => $input["number"],
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s")
            
        ]);

        $seat 
            ? $this->success($seat->toArray())
            : $this->error("failed to create");
    }

    public function getSeats() {
        if (!$this->isGet()) {
            $this->error("only get");
            return;
        }

        if (!isset($_GET["id"])) {

            $seats = Seat::all($this->mysqli);
            $result = array_map(fn($seat)=> $seat->toArray(), $seats);
            return $this->success($result);
        }

        $id = $_GET["id"];
        $seat = Seat::find($this->mysqli, $id);

        if(!$seat) {
            return $this->error("seat not found");
        }

        $this->success($seat->toArray());
    }
}
