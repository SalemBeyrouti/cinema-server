<?php
require_once  ("../connection/connection.php");
require_once ("../models/User.php"); 


class BaseController {
    protected $mysqli;

    public function __construct() {
        $this->mysqli = connect();
        if($this->mysqli->connect_errno) {
            $this->respond("error", "DB connection failed: " . $this->mysqli->connect_error);

        }
    }

    protected function respond($status, $data) {
        header("Content-type: application/json");
        echo json_encode(
            [
                "status" => $status,
                "data" => $data
            ]
            );
            exit;
    }
}



