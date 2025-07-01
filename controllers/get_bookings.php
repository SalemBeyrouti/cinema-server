<?php
require_once 'BaseController.php';
require_once '../models/Booking.php';

class GetBookingsController extends BaseController {

    public function __construct() {
        parent::__construct();

         if (!$this->isGet()) {
            $this->respond(405, "Only get allowed");
        }

        if (!isset($_GET["id"])) {
            $bookings = Booking::all($this->mysqli);
            $result = array_map(fn($booking) => $booking->toArray(), $bookings);
            $this->respond(200, "bookings fetched", $result);
        }

        $id = (int)$_GET["id"];
        $booking = Booking::find($this->mysqli, $id);

        if (!$booking) {
            $this->respond(404, "Booking not found");
        }

        $this->respond(200, "booking fetched", $booking->toArray());
    }
}

new GetBookingsController();