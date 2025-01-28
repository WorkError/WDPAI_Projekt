<?php

require_once 'AppController.php';
require_once __DIR__.'/../security/Authorization.php';



class DefaultController extends AppController{

    public function index() {
        $this->render('index');
    }

    public function login() {
        $this->render('login');
    }
    
    public function register() {
        $this->render('register');
    }


    public function main() {
        Authorization::checkLogin();
        $this->render('main');
    }

    public function profile($id) {
        Authorization::checkLogin();

        $userRepository = new UserRepository();
        $user = $userRepository->getUserById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Zaktualizuj dane użytkownika na podstawie formularza
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

        $this->render('profile', ['user' => $user]);
    }
}