<?php

    require_once("Model.php");

    class Movie extends Model
    {

    protected static string $table = "movies";

    private int $id;

    private ?string $title;


    private ?string $description;

    private ?string $genre;

    private ?int $duration;

    private ?string $poster_url;

    private ?string $release_date;

    private ?bool $is_active;

    private ?string $created_at;

    private ?string $updated_at;

    public function __construct(array $data) {
        $this->id = $data["id"] ?? null;
        $this->title = $data["title"] ?? null;
        $this->description = $data["description"]  ?? null;
        $this->genre = $data["genre"] ?? null;
        $this->duration = $data["duration"] ?? null;
        $this->poster_url = $data["poster_url"] ?? null;
        $this->release_date = $data["release_date"] ?? null;
        $this->is_active = $data["is_active"] ?? null;
        $this->created_at = $data["created_at"] ?? null;
        $this->updated_at = $data["updated_at"] ?? null;

    }

    public function toArray():array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "genre" => $this->genre,
            "duration" => $this->duration,
            "poster_url" => $this->poster_url,
            "release_date" => $this->release_date,
            "is_active" => $this->is_active,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,


        ];



    }



}
