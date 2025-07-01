<?php
require_once 'BaseController.php';
require_once '../models/User.php';

class LoginController extends BaseController {
    public function __construct() {
        parent::__construct();

        if (!$this->isPost()) {
            $this->respond(405, "only post allowed");
        }

        $input = $this->jsonInput();

        if (!$this->requireFields($input, ["email", "password"])) return;

        $emailOrPhone = $input["email"];
        $password = $input["password"];

        $user = User::findByEmail($this->mysqli, $emailOrPhone);

        if (!$user) {
            $this->respond(400, "User not found");
        }

        if (!password_verify($password, $user->getPassword())) {
            $this->respond(400, "Incorrect password");
        }

        $this->respond(200, "Login successful", $user->toArray());
    }
}

new LoginController();
