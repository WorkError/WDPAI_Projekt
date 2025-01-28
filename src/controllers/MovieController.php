<?php

require_once 'AppController.php';
require_once __DIR__ . '/../repository/MovieRepository.php';
class MovieController extends AppController
{
    public function movie($id)
    {
        $movieRepository = new MovieRepository();
        $movie = $movieRepository->getMovieById($id);

        if (!$movie) {
            die('Movie not found');
        }

        $this->render('movie', ['movie' => $movie]);
    }
}