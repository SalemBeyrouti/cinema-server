<?php
require_once 'BaseController.php';

class LoginController extends BaseController {
    public function handle(){ 
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            $this->respond("error", "only post requests are allowed.");
        }
        $email = $_POST["email"] ?? null;
        $password = $_POST["password"] ?? null;
        if (!$email || !$password) {
            $this->respond ("error", "Email and passowrd are required");
        }
        $user = User::findByEmail($this->mysqli, $email);

        if(!$user) {
            $this->respond("error", "user not found");
        }

        if(!password_verify($password, $user->getPassword())){
            $this->respond("error", "incorect password.");
        }

        $this->respond("success", $user->toArray());

    }
}


$controller = new LoginController();
$controller->handle();