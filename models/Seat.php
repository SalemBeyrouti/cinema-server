<?php

require_once("Model.php");

class Seat extends Model
{

    protected static string $table = "seats";

    private int $id;
    private int $auditorium_id;
    private string $row;
    private int $number;
    private ?string $created_at;
    private ?string $updated_at;

    public function __construct(array $data) {
        $this->id = $data["id"] ?? null;
        $this->auditorium_id = $data["auditorium_id"];
        $this->row  = $data["row"];
        $this->number = $data["number"];
        $this->created_at = $data["created_at"] ?? null;
        $this->updated_at = $data["updated_at"] ?? null;
    

    }

    public function toArray():array
    {
        return [
            "id" => $this->id,
            "auditorium_id" => $this->auditorium_id,
            "row" => $this->row,
            "number" => $this->number,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];



    }
}