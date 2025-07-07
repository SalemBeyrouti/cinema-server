<?php

require_once("Model.php");

class Snack extends Model {

    protected static string $table = "snacks";

    private int $id;

    private string $name;

    private float $price;

    private string $image_url;

    private int $quantity;

    private ?string $created_at;

    private ?string $updated_at;


    public function __construct(array $data) {

        $this->id = $data['id'] ?? 0;
        $this->name = $data['name'] ?? '';
        $this->price = (float)$data['price'];
        $this->image_url = $data['image_url'] ?? '';
        $this->quantity = $data['quantity'];
        $this->created_at = $data['created_at'] ?? null;
        $this->updated_at = $data['updated_at'] ?? null;
    }

    public function toArray() {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "price" => $this->price,
            "image_url" => $this->image_url,
            "quantity" => $this->quantity,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }

}