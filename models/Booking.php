<?php

require_once("Model.php");

class Booking extends Model {

    protected static string $table = "bookings";
    protected static string $primary_key = "id";

    private int $id;
    private int $userid;
    private int $seatid;
    private int $movieid;
    private string $bookingtime;

    public function __construct(array $data) {
        $this->id = $data['id'] ?? 0;
        $this->userid = $data['user_id'];
        $this->seatid = $data['seat_id'];
        $this->movieid = $data['movie_id'];
        $this->bookingtime = $data['booking_time'];
    }

    public function getID(): int {
        return $this->id;
    }

    public function getUserid(): int {
        return $this->userid;
    }

    public function getSeatid(): int {
        return $this->seatid;
    }

    public function getMovieid(): int {
        return $this->movieid;
    }

    public function getBookingtime(): string {
        return $this->bookingtime;
    }

    public function setUserid(int $userid): void {
        $this->userid = $userid;
    }

    public function setSeatid(int $seatid): void {
        $this->seatid = $seatid;
    }

    public function setMovieid(int $movieid): void {
        $this->movieid = $movieid;
    }

    public function setBookingtime(string $bookingtime): void {
        $this->bookingtime = $bookingtime;
    }

    public function toArray(): array {
        return [
            "id" => $this->id,
            "userid" => $this->userid,
            "seatid" => $this->seatid,
            "movieid" => $this->movieid,
            "bookingtime" => $this->bookingtime
        ];
    }
}
