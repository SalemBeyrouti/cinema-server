<?php
require_once(__DIR__ . '/../connection/connection.php');
require_once(__DIR__ . '/../services/ResponseService.php');


abstract class BaseController {
    protected $mysqli;

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
                $this->error("$field is required");
                return false;
            }
        }
        return true;
    }

    protected function success($payload) {
        echo ResponseService::success_response($payload);
        exit;
    }

    protected function error($message) {
        echo ResponseService::error_response($message);
        exit;
    }
}
