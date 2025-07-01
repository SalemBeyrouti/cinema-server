<?php
require_once 'BaseController.php';
require_once '../models/User.php';

class GetUsersController extends BaseController {
    public function __construct() {
        parent::__construct();

        if (!$this->isGet()) {
            $this->respond(405, "only get allowed");
        }

        $users = User::all($this->mysqli);

        $result = array_map(fn($user) => $user->toArray(), $users);

        $this->respond(200, "Users fetched successfully", $result);
    }
}

new GetUsersController();
