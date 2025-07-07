<?php

require(__DIR__ . "/../models/Showtime.php");
require(__DIR__ . "/../connection/connection.php");
require_once(__DIR__ . "/BaseController.php");
require_once(__DIR__ . '/../services/ShowtimeService.php');

class ShowtimeController extends BaseController {

    public function createShowtime() {
        if (!$this->isPost()) {
            $this->error("only post");
        }

        $input = $this->jsonInput();

        if (!$this->requireFields($input, [
            "movie_id", "auditorium_id", "price", "start_time", "end_time"
        ]))
        return;

        $showtime = Showtime::insert($this->mysqli, [
            "movie_id" => $input["movie_id"], "auditorium_id" => $input["auditorium_id"], "price" => $input["price"], "start_time" => $input["start_time"], "end_time" => $input["end_time"], "created_at" => date("Y-m-d H:i:s"), "updated_at" => date("Y-m-d H:i:s")
        ]);

        $showtime
            ? $this->success($showtime->toArray())
            : $this->error("failed to create");
    }
    public function getShowtimes() {
        if (!$this->isGet()) {
            $this->error("only get");
            return;
        }

        if (!isset($_GET["id"])) {

            $showtimes = Showtime::all($this->mysqli);
            $result = array_map(fn($showtime)=> $showtime->toArray(), $showtimes);
            return $this->success($result);
        }

        $id = $_GET["id"];
        $showtime = Showtime::find($this->mysqli, $id);

        $showtime 
            ? $this->success($showtime->toArray())
            : $this->error("failed to find");
    }
    }


}