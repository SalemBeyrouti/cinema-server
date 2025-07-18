<?php
require_once("Model.php");

class User extends Model
{
    protected static string $table = "users";

    private int $id;
    private ?string $name;
    private ?string $email;
    private string $password;

    private ?string $phone;
    
    private string $created_at;

    private ?string $updated_at;

    public function __construct(array $data)
    {
        $this->id = $data["id"] ?? 0;
        $this->name = $data["name"] ?? null;
        $this->email = $data["email"] ?? null;
        $this->password = $data["password"] ?? '';
        $this->phone = $data ["phone"] ?? null;
        $this->created_at = $data["created_at"] ?? '';
        $this->updated_at = $data["updated_at"] ?? '';

    }

    public function toArray(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
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


    public static function findByEmail($mysqli, string $input){
        $sql = sprintf("Select * from %s Where email = ? OR phone =?", static::$table);

        $query = $mysqli->prepare($sql);
        $query->bind_param("ss", $input, $input);
        $query->execute();

        $data = $query->get_result()->fetch_assoc();

        return $data ? new static($data) : null;
    }

    public static function create($mysqli, array $data): ?self{
        $sql = "INSERT INTO users (name, email, password, phone) values (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);

        if (!$stmt) return null;

        $stmt->bind_param("ssss", $data["name"], $data["email"], $data["password"], $data["phone"]);

        if (!$stmt->execute()) return null;

        $id = $mysqli->insert_id;

        $result = $mysqli->query("SELECT * FROM users WHERE id = $id");
        $row = $result->fetch_assoc();

        return $row ? new static($row) : null;
    }
    
}