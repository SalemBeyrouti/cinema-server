<?php

    require_once("Model.php");

    class Showtime extends Model
    {
        
    protected static string $table = "showtimes";

    private int $id;

    private ?int $movie_id;


    private ?int $auditorium_id;

    private ?int $price;

    private ?string $start_time;

    private ?string $end_time;

    private ?string $created_at;

    private ?string $updated_at;


    public function __construct(array $data) {

        $this->id = $data["id"] ?? 0;
        $this->movie_id = $data["movie_id"] ?? null;
        $this->auditorium_id = $data["auditorium_id"]  ?? null;
        $this->price = $data["price"] ?? null;
        $this->start_time = $data["start_time"] ?? null;
        $this->end_time = $data["end_time"] ?? null;
        $this->created_at = $data["created_at"] ?? null;
        $this->updated_at = $data["updated_at"] ?? null;

    }

    public function toArray():array
    {
        return[
            "id" => $this->id,
            "movie_id" => $this->movie_id,
            "auditorium_id" => $this->auditorium_id,
            "price" => $this->price,
            "start_time" => $this->start_time,
            "end_time" => $this->end_time,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }

    public function getStartTime(): ?string
    {
        return $this->start_time;

    }

    public function getEndTime(): ?string
    {
        return $this->end_time;
    }
    
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }
    
}
