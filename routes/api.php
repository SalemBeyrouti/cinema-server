<?php
return [
 "/create_movies" =>    ["controller" => "MovieController",  "method" => "createMovie"],

 "/get_movies" => ["controller" => "MovieController",     "method" => "getMovies"],

 "/create_bookings" =>    ["controller" => "BookingController",  "method" => "createBooking"],

 "/get_bookings" => ["controller" => "BookingController",     "method" => "getBookings"],
    
 "/create_showtimes" =>    ["controller" => "ShowtimeController",  "method" => "createShowtime"],

  "/get_showtimes" =>    ["controller" => "ShowtimeController",  "method" => "getShowtimes"],

  "/create_seats" =>    ["controller" => "SeatController",  "method" => "createSeat"],

   "/get_seats" =>    ["controller" => "SeatController",  "method" => "getSeats"],

 "/register" =>    ["controller" => "UserController",  "method" => "registerUser"],

  "/login" =>    ["controller" => "UserController",  "method" => "loginUser"],

    "/get_users" =>    ["controller" => "UserController",  "method" => "getUsers"],

    "/create_snack" =>    ["controller" => "SnackController",  "method" => "createSnack"],

    "/get_snacks" =>    ["controller" => "SnackController",  "method" => "getSnacks"],

    "/get_recommendations" =>    ["controller" => "RecommendationController",  "method" => "getRecommendations"],


];