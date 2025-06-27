<?php
require_once 'BaseController.php';

class GetUsersController extends BaseController {
    public function handle() {
        $users = User::all($this->mysqli);

        $result = array_map(function ($user) {
            return $user->toArray();
        }, $users);

        $this->respond("success", $result);
    }
}

$controller = new GetUsersController();
$controller->handle();