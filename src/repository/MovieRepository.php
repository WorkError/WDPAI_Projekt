<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Movie.php';

class MovieRepository extends Repository
{
    public function getMovieById($id): ?Movie
    {
        $statement = $this->database->connect()->prepare("
            SELECT m.id, m.title, m.description, m.image_path, 
                   ARRAY_AGG(c.name) AS categories
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
            explode(',', $movieData['categories'])
        );
    }
}
