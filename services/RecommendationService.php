<?php

class RecommendationService
{
    public static function recommendByUserBookings(array $bookings): array
    {
        $genreCount = [];

        foreach ($bookings as $booking) {
            $showtime = $booking->getShowtime();
            if (!$showtime) continue;

            $movie = $showtime->getMovie(); 
            if (!$movie) continue;

            $genre = $movie->getGenre(); 
            $genreCount[$genre] = ($genreCount[$genre] ?? 0) + 1;
        }

        if (empty($genreCount)) return [];

        arsort($genreCount);
        $topGenre = array_key_first($genreCount);

        $recommended = [];
        foreach ($bookings as $booking) {
            $showtime = $booking->getShowtime();
            if (!$showtime) continue;

            $movie = $showtime->getMovie();
            if ($movie && $movie->getGenre() === $topGenre) {
                $recommended[$movie->getID()] = $movie; 
            }
        }

        return array_values($recommended);
    }
}