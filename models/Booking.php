<?php

require_once("Model.php");

class Booking extends Model {

    protected static string $table = "bookings";
    protected static string $primary_key = "id";

    private int $id;
    private int $user_id;
    private int $showtime_id;
    private int $seat_id;
    private string $created_at;
    private string $updated_at;

    public function __construct(array $data) {
        $this->id = $data['id'] ?? 0;
        $this->user_id = $data['user_id'];
        $this->showtime_id = $data['showtime_id'];
        $this->seat_id = $data['seat_id'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }

    public function getID(): int {
        return $this->id;
    }

    public function getUserid(): int {
        return $this->user_id;
    }

    public function getShowtimeId(): int {
        return $this->showtime_id;
    }

    public function getSeatId(): int {
        return $this->seat_id;
    }

    public function getCreatedAt(): string {
        return $this->created_at;
    }

    public function getUpdatedAt(): string {
       return $this->updated_at;
    }

    public function setUserId(int $user_id): void {
        $this->user_id = $user_id;
    }

    public function setShowtimeId(int $showtime_id): void {
        $this->showtime_id = $showtime_id;
    }

    public function setSeatId(int $seat_id): void {
        $this->seat_id = $seat_id;
    }

    public function setCreatedAt(string  $created_at): void {
        $this->created_at = $created_at;
    }
    public function setUpdatedAt(string  $updated_at): void {
        $this->updated_at = $updated_at;
    }

    public function toArray(): array {
        return [
            "id" => $this->id,
            "user_id" => $this->user_id,
            "showtime_id" => $this->showtime_id,
            "seat_id" => $this->seat_id,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }
}
