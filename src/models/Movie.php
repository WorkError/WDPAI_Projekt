<?php

class Movie
{
    private int $id;
    private string $title;
    private string $description;
    private string $imagePath;
    private array $categories;

    public function __construct(int $id, string $title, string $description, string $imagePath, array $categories)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->imagePath = $imagePath;
        $this->categories = $categories;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getImagePath(): string
    {
        return $this->imagePath;
    }

    public function getCategories(): array
    {
        return $this->categories;
    }
}
