<?php

require(__DIR__ . "/../models/Snack.php");
require(__DIR__ . "/../connection/connection.php");
require_once(__DIR__ . "/BaseController.php");
require_once(__DIR__ . '/../services/SnackService.php');

class SnackController extends BaseController {

    public function createSnack() {
        if (!$this->isPost()) {
            $this->error("only post");
        }

        $input = $this->jsonInput();

        if (!$this->requireFields($input, [
            "name", "price", "image_url", "quantity"
        ])) return;

        $snack = Snack::insert($this->mysqli, [
            "name"=>$input["name"],
            "price"=>$input["price"],
            "image_url"=>$input["image_url"],
            "quantity"=>$input["quantity"],
            "created_at"=>date("Y-m-d H:i:s"),
            "updated_at"=>date("Y-m-d H:i:s")
        ]);

        $snack
            ? $this->success($snack->toArray())
            : $this->error("failed to create");
    }

    public function getSnacks() {

        if (!$this->isGet()) {
            return $this->error("only get");
        }
        $snacks = Snack::all($this->mysqli);
        $result = array_map(fn($snack) => $snack->toArray(), $snacks);

        return $this->success($result);
    }

}