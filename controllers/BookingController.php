<?php

require(__DIR__ . "/../models/Booking.php");
require(__DIR__ . "/../connection/connection.php");

require_once(__DIR__ . "/BaseController.php");
require_once(__DIR__ . '/../services/BookingService.php');

class BookingController extends BaseController {

    public function createBooking() {
        if (!$this->isPost()) {
            $this->error("only post");
        }

        $input = $this->jsonInput();

        if(!$this->requireFields($input, [
            "user_id", "showtime_id", "seat_id"
        ])) return;

        $booking = Booking::insert($this->mysqli, [
            "user_id" => $input["user_id"],
            "seat_id" => $input["seat_id"],
            "showtime_id" => $input["showtime_id"],
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s")
            
        ]);

        $booking 
            ? $this->success($booking->toArray())
            : $this->error("failed to create");
    }

    public function getBookings() {
        if (!$this->isGet()) {
            $this->error("only get");
            return;
        }

        if (!isset($_GET["id"])) {

            $bookings = Booking::all($this->mysqli);
            $result = array_map(fn($booking)=> $booking->toArray(), $bookings);
            return $this->success($result);
        }

        $id = $_GET["id"];
        $booking = Booking::find($this->mysqli, $id);

        if(!$booking) {
            return $this->error("booking not found");
        }

        $this->success($booking->toArray());
    }
}