<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Movie.php';

class MovieRepository extends Repository
{
    public function getMovieById($id): ?Movie
    {
        $statement = $this->database->connect()->prepare("
        SELECT m.id, m.title, m.description, m.image_path,
               COALESCE(string_agg(c.name, ', '), '') AS categories
        FROM movies m
        LEFT JOIN movie_categories mc ON mc.movie_id = m.id
        LEFT JOIN categories c ON c.id = mc.category_id
        WHERE m.id = :id
        GROUP BY m.id
    ");
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $movieData = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$movieData) {
        return null;
    }

    return new Movie(
        $movieData['id'],
        $movieData['title'],
        $movieData['description'],
        $movieData['image_path'],
        array_filter(array_map('trim', explode(',', $movieData['categories'])))
    );
}

    public function getAllCategories(): array {
        $statement = $this->database->connect()->prepare("SELECT name FROM categories");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_COLUMN);
    }
    public function getMoviesByCategory(string $categoryName): array
    {
        $statement = $this->database->connect()->prepare("
        SELECT m.id, m.title, m.image_path 
        FROM movies m
        INNER JOIN movie_categories mc ON mc.movie_id = m.id
        INNER JOIN categories c ON c.id = mc.category_id
        WHERE c.name = :category_name
    ");
        $statement->bindParam(':category_name', $categoryName, PDO::PARAM_STR);
        $statement->execute();

        $movies = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map(function ($movie) {
            return new Movie(
                $movie['id'],
                $movie['title'],
                '',
                $movie['image_path'],
                []
            );
        }, $movies);
    }

    public function addComment(int $movieId, int $userId, string $content): bool
    {
        $statement = $this->database->connect()->prepare("
        INSERT INTO comments (movie_id, user_id, content, created_at)
        VALUES (:movie_id, :user_id, :content, NOW())
    ");
        $statement->bindValue(':movie_id', $movieId, PDO::PARAM_INT);
        $statement->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $statement->bindValue(':content', $content, PDO::PARAM_STR);

        return $statement->execute();
    }

    public function getCommentsByMovieId(int $movieId): array
    {
        $statement = $this->database->connect()->prepare("
        SELECT c.content, c.created_at, u.nickname
        FROM comments c
        INNER JOIN users u ON c.user_id = u.id
        WHERE c.movie_id = :movie_id
        ORDER BY c.created_at DESC
    ");
        $statement->bindParam(':movie_id', $movieId, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFirstMovies(int $limit): array
    {
        $statement = $this->database->connect()->prepare("
        SELECT id, title, description, image_path 
        FROM movies 
        ORDER BY created_at DESC 
        LIMIT :limit
    ");
        $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
        $statement->execute();

        $movies = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (!$movies) {
            return [];
        }

        return array_map(function ($movie) {
            return new Movie(
                $movie['id'],
                $movie['title'],
                $movie['description'],
                $movie['image_path'],
                []
            );
        }, $movies);
    }
}
