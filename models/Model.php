<?php 
abstract class Model{

    protected static string $table;
    protected static string $primary_key = "id";

    public static function find(mysqli $mysqli, int $id){
        $sql = sprintf("Select * from %s WHERE %s = ?", 
                        static::$table, 
                        static::$primary_key);
        
        $query = $mysqli->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();

        $data = $query->get_result()->fetch_assoc();

        return $data ? new static($data) : null;
    }

    public static function all(mysqli $mysqli){
        $sql = sprintf("Select * from %s", static::$table);
        
        $query = $mysqli->prepare($sql);
        $query->execute();

        $data = $query->get_result();

        $objects = [];
        while($row = $data->fetch_assoc()){
            $objects[] = new static($row);

        }

        return $objects;
    }
    // public static function insert(mysqli $mysqli, array $data) {
    //     $sql = sprintf("INSERT INTO %s   (name, email, password, phone) VALUES (?, ?, ?, ?)", static::$table);

    //     $query = $mysqli->prepare($sql);
    //     $query->bind_param("ssss", $data["name"], $data["email"], $data["password"], $data["phone"]);
    //     $query->execute();

    //     $id = $mysqli->insert_id;

    //     return static::find($mysqli, $id);
    // }


    public static function delete(mysqli $mysqli, int $id) {
        
        $sql = sprintf("DELETE FROM %s WHERE %s = ?", static::$table, static::$primary_key);

        $query = $mysqli->prepare($sql);
        $query->bind_param("i", $id);
        return $query->execute();


    }

    public static function insert(mysqli $mysqli, array $data)
    {
        $columns = "";
        $placeholders = "";
        $values = [];
        $types = "";;

        foreach ($data as $key=>$value) {
            $columns .= "$key, ";
            $placeholders .= "?, ";
            $values[] = $value;


            if (is_int($value)){
                $types .= "i";
            } else {
                $types .= "s";
            }
        }

        $columns = rtrim($columns, ", ");
        $placeholders = rtrim($placeholders, ", ");

        $sql = sprintf("INSERT INTO %s (%s) VALUES (%s)", static::$table, $columns, $placeholders);
        

        $query = $mysqli->prepare($sql);
        $query->bind_param($types, ... $values);
        $query->execute();

        $id = $mysqli->insert_id;
        return static::find($mysqli, $id);


    }

    public static function where(mysqli $mysqli, string $column, $value) {

        $sql = sprintf("SELECT * FROM %s WHERE %s = ?", static::$table, $column);

        $query  = $mysqli->prepare($sql);

        $type = is_int($value) ? "i" : "s";
        $query->bind_param($type, $value);

        $query->execute();
        $result = $query->get_result()->fetch_assoc();

        return $result ? new static($result) : null;

    }

   


}  




// might be needed later if i wanna use insert multiple times
   

//public static function insert