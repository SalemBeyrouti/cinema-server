<?php
require_once("../connection/connection.php");

abstract class BaseController {
    protected $mysqli;
    protected $response = [
        "status" => 200,
        "message" => "",
        "data" => null
    ];

    public function __construct() {
        $this->mysqli = $GLOBALS["mysqli"];
        header('Content-Type: application/json');
    }

    protected function isPost(): bool {
        return $_SERVER["REQUEST_METHOD"] === "POST";
    }

    protected function isGet(): bool {
        return $_SERVER["REQUEST_METHOD"] === "GET";
    }

    protected function jsonInput(): array {
        return json_decode(file_get_contents("php://input"), true) ?? [];
    }

    protected function requireFields(array $input, array $fields): bool {
        foreach ($fields as $field) {
            if (!isset($input[$field]) || empty($input[$field])) {
                $this->respond(400, "failed");
                return false;
            }
        }
        return true;
    }

    protected function respond(int $status, string $message = "", $data = null): void {
        $this->response["status"] = $status;
        $this->response["message"] = $message;
        $this->response["data"] = $data;

        echo json_encode($this->response);
        exit;
    }
}
