<?php
require_once ('BaseController.php');

class RegisterController extends BaseController {

public function handle() {
    if ($_SERVER ["REQUEST_METHOD"] !== "POST") {
        $this->respond("error", "only post requests are allowed");
    }
    file_put_contents("log.txt", "handle started\n", FILE_APPEND);

    $name=($_POST["name"] ?? '');
    $email=($_POST["email"] ?? '');
    $password=($_POST["password"] ?? '');
    $phone=($_POST["phone"] ?? '');

    file_put_contents("log.txt", "POST ARRAY: " . json_encode($_POST) . "\n", FILE_APPEND);


    if (!$name || !$email || !$password) {
        $this->respond("error", "name, email, and password are required");

    }

    $existingUser = User::findByEmail($this->mysqli, $email);
    if($existingUser) {
        $this->respond("error", "email already registered");

    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


    $newUser = User::create($this->mysqli, [
        "name" => $name,
        "email" => $email,
        "password" => $hashedPassword,
        "phone" => $phone
    ]);

    if ($newUser) {
        $this->respond("success", $newUser->toArray());
    } else {
        $this->respond("error", "user registration failed.");
    }
}
}

$controller = new RegisterController();
$controller->handle();