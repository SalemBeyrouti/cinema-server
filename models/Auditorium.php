<?php

require_once "Model.php";

class Auditorium extends Model {

    protected static string $table = "auditoriums";

    protected static string $primary_key = "id";


    private int $id;
    private string $name;
    private int $seat_capacity;
    

    public function __construct(array $data) {
        $this->id = $data['id'] ?? 0;
        $this->name = $data['name'];
        $this->seat_capacity = $data['seat_capacity'];
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getSeatCapacity(): int {
        return $this->seat_capacity;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setSeatCapacity(int $seat_capacity): void {
        $this->seat_capacity = $seat_capacity;
    }


    public function toArray(): array {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "seat_capacity" => $this->seat_capacity
        ];
    }
}