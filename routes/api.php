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
];