<?php

require(__DIR__ . "/../models/Booking.php");
require(__DIR__ . "/../models/Movie.php");
require(__DIR__ . "/../models/Showtime.php");
require(__DIR__ . "/../connection/connection.php");
require_once(__DIR__ . "/BaseController.php");
require_once(__DIR__ . '/../services/RecommendationService.php');

class RecommendationController extends BaseController {

    public function getRecommendations() {
        if (!$this->isGet()) return $this->error("only get");

        if (!isset($_GET["user_id"])) return $this->error("user id required");

        $bookings = Booking::where($this->mysqli, "user_id", $_GET["user_id"]);

        $recommendations = RecommendationService::recommendByUserBookings($bookings);

        return $this->success(array_map(fn($movie) => $movie->toArray(), $recommendations));
    }
    
}