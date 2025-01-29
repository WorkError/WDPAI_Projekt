<?php

require_once 'AppController.php';
require_once __DIR__ . '/../repository/MovieRepository.php';

class CategoryController extends AppController
{
    public function category($name)
    {
        $movieRepository = new MovieRepository();
        $movies = $movieRepository->getMoviesByCategory($name);

        if (empty($movies)) {
            die('No movies found in this category.');
        }

        $this->render('category', ['categoryName' => $name, 'movies' => $movies]);
    }
}
