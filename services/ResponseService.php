<?php

class ResponseService {

    public static function success($payload){
        $response = [];
        $response["status"] = 200;
        $response["payload"] = $payload;
        return json_encode($response);
    }

    public static function error($message) {
        $response = [];
        $response["status"] = 400;
        $response["error"] = $message;
        return json_encode($response);
    }


}