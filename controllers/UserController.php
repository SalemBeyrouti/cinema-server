<?php

require(__DIR__ . "/../models/User.php");
require(__DIR__ . "/../connection/connection.php");
require_once(__DIR__ . "/BaseController.php");
require_once(__DIR__ . '/../services/UserService.php');

class UserController extends BaseController {

    public function registerUser() {
        if (!$this->isPost()) {
            return $this->error("only post");
        }

        $input = $this->jsonInput();
        
        if(!$this->requireFields($input, ["name", "email", "password", "phone"])) return;
        $hashedPassword = password_hash($input["password"], PASSWORD_DEFAULT);

        

        $user = User::insert($this->mysqli, ["name" => $input["name"],"email" => $input["email"], "password" => $hashedPassword,"phone" => $input["phone"], "created_at" => date("Y-m-d H:i:s") 
    ]);

    $user 
        ? $this->success($user->toArray())
        : $this->error("failed to register");


    }

    public function loginUser() {
        if(!$this->isPost()) {
            return $this->error("only post");
        }

        $input = $this->jsonInput();
        if (!$this->requireFields($input, ["email", "password"]))
        return;

        $user = User::findByEmail($this->mysqli, $input["email"]);

        if(!$user || !password_verify($input["password"], $user->getPassword())) {
            return $this->error("invalid");
        }

        return $this->success($user->toArray());

    }

    public function getUsers(){

        if (!$this->isGet()) {
            return $this->error("only post");
        }

        if (!isset($_GET["id"])) {
            $users = User::all($this->mysqli);
            $result = array_map(fn($user)=> $user->toArray(), $users);
            return $this->success($result);
        }

        $id = ($_GET["id"]);
        $user = User::find($this->mysqli, $id);

        $user 
            ? $this->success($user->toArray())
            :$this->error("not found");

      

        

    }


}