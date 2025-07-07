<?php


class SnackService {
    public static function snacksToArray($snacks_db) {
        $results = [];

        foreach ($snacks_db as $sn ) {
            $results [] = $sn->toArray();
        }

        return $results;
    }

}