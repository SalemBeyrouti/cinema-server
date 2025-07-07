<?php

require_once __DIR__ . '/../models/User.php';

class UserService {
    public static function usersToArray($user_db) {
        $results = [];

        foreach ($user_db as $u ) {
            $results [] = $u->toArray();
        }

        return $results;
    }

    public static function getAllUsers() {
        return User::all();
    }

}