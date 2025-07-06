<?php


class BookingService {
    public static function bookingsToArray($booking_db) {
        $results = [];

        foreach ($booking_db as $b ) {
            $results [] = $b->toArray();
        }

        return $results;
    }

}