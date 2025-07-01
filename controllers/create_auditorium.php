<?php
echo "Controller is running.<br>";
require_once 'BaseController.php';
require_once '../models/Auditorium.php';
echo "Model loaded.<br>";
class CreateAuditoriumController extends BaseController {
    public function __construct() {
        parent::__construct();

        if (!$this->isPost()) {
            $this->respond(405, "Only POST requests are allowed");
        }

        $input = $this->jsonInput();

        if (!$this->requireFields($input, ["name", "seat_capacity"])) return;

        $auditorium = Auditorium::insert($this->mysqli, [
            "name" => $input["name"],
            "seat_capacity" => (int) $input["seat_capacity"]
        ]);

        if ($auditorium) {
            $this->respond(201, "Auditorium created successfully", $auditorium->toArray());
        } else {
            $this->respond(500, "Failed to create auditorium");
        }
    }
}

new CreateAuditoriumController();
