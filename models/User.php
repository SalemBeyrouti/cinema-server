<?php
require_once("Model.php");

class User extends Model
{
    protected static string $table = "users";

    private int $id;
    private string $name;
    private string $email;
    private string $password;
    private string $created_at;

    public function __construct(array $data)
    {
        $this->id = $data["id"];
        $this->name = $data["name"];
        $this->email = $data["email"];
        $this->password = $data["password"];
        $this->created_at = $data["created_at"];
    }

    public function toArray(): array
    {
        return [
             "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "created_at" => $this->created_at,
        ];
    }

    public function getPassword(): string 
    {
        return $this->password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName(): string
    {
        return $this->name;
    }
    
}