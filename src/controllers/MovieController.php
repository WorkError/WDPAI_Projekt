<?php

require_once 'AppController.php';
require_once __DIR__ . '/../repository/MovieRepository.php';
class MovieController extends AppController
{
    public function movie($id)
    {
        session_start();
        $movieRepository = new MovieRepository();
        $movie = $movieRepository->getMovieById($id);
        $comments = $movieRepository->getCommentsByMovieId($id);

        if (!$movie) {
            die('Movie not found');
        }

        $this->render('movie', ['movie' => $movie, 'comments' => $comments]);
    }

    public function add_comment($id)
    {
        Authorization::checkLogin();

        error_log("addComment called with movie_id: $id");

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['content'])) {
            $content = $_POST['content'];
            $userId = $_SESSION['user_id'];

            error_log("User ID: $userId, Comment content: $content");

            $movieRepository = new MovieRepository();
            //$movieRepository->addComment($id, $userId, $content);

            $result = $movieRepository->addComment($id, $userId, $content);

            error_log("Comment insertion result: " . ($result ? "success" : "failure"));

            $url = "http://$_SERVER[HTTP_HOST]/movie/$id";
            header("Location: $url");
            exit();
        }
    }
}