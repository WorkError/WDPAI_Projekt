<?php

require_once 'AppController.php';
require_once __DIR__.'/../security/Authorization.php';



class DefaultController extends AppController{

    public function index() {
        $this->render('index');
    }

    public function login() {
        session_start();

        if (isset($_SESSION['user_id'])) {
            header("Location: /main");
            exit();
        }

        $this->render('login');
    }
    
    public function register() {
        session_start();

        if (isset($_SESSION['user_id'])) {
            header("Location: /main");
            exit();
        }
        $this->render('register');
    }


    public function main() {
        Authorization::checkLogin();

        $movieRepository = new MovieRepository();
        $categories = $movieRepository->getAllCategories();
        $movies = $movieRepository->getFirstMovies(16);

        $this->render('main', [
            'categories' => $categories,
            'movies' => $movies
        ]);

    }

    public function profile($id) {
        Authorization::checkLogin();

        $userRepository = new UserRepository();
        $movieRepository = new MovieRepository();
        $user = $userRepository->getUserById($id);
        $categories = $movieRepository->getAllCategories();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user->setFirstName($_POST['first_name']);
            $user->setLastName($_POST['last_name']);
            $user->setNickname($_POST['nickname']);
            $user->setEmail($_POST['email']);
            $user->setDateOfBirth($_POST['birth_date']);
            $userRepository->update($user);

            $url = "http://$_SERVER[HTTP_HOST]/profile/$id";
            header("Location: $url");
            exit();
        }

        $this->render('profile', ['user' => $user, 'categories' => $categories]);
    }
}