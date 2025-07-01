<?php

require_once("Model.php");

class Seat extends Model
{

    protected static string $table = "seats";

    private int $id;
    private int $movie_id;
    private string $row;
    private int $number;
    private bool $is_booked;
    private ?string $created_at;
    private ?string $updated_at;

    public function __construct(array $data) {
        $this->id = $data["id"] ?? null;
        $this->movie_id = $data["movie_id"];
        $this->row  = $data["row"];
        $this->number = $data["number"];
        $this->is_booked = $data["is_booked"];
        $this->created_at = $data["created_at"] ?? null;
        $this->updated_at = $data["updated_at"] ?? null;
    

    }

    public function toArray():array
    {
        return [
            "id" => $this->id,
            "movie_id" => $this->movie_id,
            "row" => $this->row,
            "number" => $this->number,
            "is_booked" => $this->is_booked,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];



    }
}