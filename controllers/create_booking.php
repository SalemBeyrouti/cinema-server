<?php
require_once 'BaseController.php';
require_once '../models/Booking.php';

class CreateBookingController extends BaseController {
    public function __construct() {
        parent::__construct();

        if (!$this->isPost()) {
            $this->respond(405, "only post allowed");
        }

        $input = $this->jsonInput();

        if (!$this->requireFields($input, ["userid", "seatid", "movieid", "bookingtime"])) return;

        $booking = Booking::insert($this->mysqli, [
            "user_id" => $input["userid"],
            "seat_id" => $input["seatid"],
            "movie_id" => $input["movieid"],
            "booking_time" => $input["bookingtime"]
        ]);

        if ($booking) {
            $this->respond(201, "Booking created successfully", $booking->toArray());
        } else {
            $this->respond(400, "Booking creation failed");
        }
    }
}

new CreateBookingController();
