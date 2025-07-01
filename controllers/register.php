<?php
require_once 'BaseController.php';
require_once '../models/User.php';

class RegisterController extends BaseController {
    public function __construct() {
        parent::__construct();

        if (!$this->isPost()) {
            $this->respond(405, "Only POST requests are allowed");
        }

        $input = $this->jsonInput();

        if (!$this->requireFields($input, ["name", "email", "password"])) return;

        $name = $input["name"];
        $email = $input["email"];
        $password = $input["password"];
        $phone = $input["phone"] ?? "";

        $existingUser = User::findByEmail($this->mysqli, $email);
        if ($existingUser) {
            $this->respond(409, "Email already registered");
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $newUser = User::insert($this->mysqli, [
            "name" => $name,
            "email" => $email,
            "password" => $hashedPassword,
            "phone" => $phone
        ]);

        if ($newUser) {
            $this->respond(201, "User registered", $newUser->toArray());
        } else {
            $this->respond(500, "User registration failed");
        }
    }
}

new RegisterController();
