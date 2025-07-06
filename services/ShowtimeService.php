<?php


class ShowtimeService {
    public static function showtimesToArray($showtimes_db) {
        $results = [];

        foreach ($showtimes_db as $st ) {
            $results [] = $st->toArray();
        }

        return $results;
    }

}