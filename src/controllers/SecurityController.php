<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    public function login()
    {

        session_start();

        if (isset($_SESSION['user_id'])) {
            header("Location: /main");
            exit();
        }

        $userRepository = new UserRepository();

        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = $userRepository->getUserByEmail($email);

        if ($user) {
            error_log("User found: " . $user->getEmail());
            error_log("Password hash from DB: " . $user->getPassword());
            error_log("Password provided: " . $password);
            $isPasswordValid = password_verify($password, $user->getPassword());
            error_log("Password verification result: " . ($isPasswordValid ? "true" : "false"));
        } else {
            error_log("No user found with email: $email");
        }

        if (!$user || !password_verify($password, $user->getPassword())) {
            return $this->render('login', ['messages' => ['Invalid email or password']]);
        }

        $_SESSION['user_id'] = $user->getId();
        $_SESSION['user_email']= $user->getEmail();
        $_SESSION['name']=$user->getFirstName();
        $_SESSION['surname']=$user->getLastName();
        $_SESSION['nickname']=$user->getNickname();


        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/main");
        exit();
    }
    public function register()
    {
        session_start();

        if (isset($_SESSION['user_id'])) {
            header("Location: /main");
            exit();
        }

        $userRepository = new UserRepository();

        if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['nickname']) || empty($_POST['birth_date'])) {
            return $this->render('register', ['messages' => ['All fields are required']]);
        }

        if ($userRepository->getUserByEmail($_POST['email'])) {
            return $this->render('register', ['messages' => ['Email is already in use']]);
        }

        $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $user = new User(
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['nickname'],
            $_POST['email'],
            $_POST['birth_date'],
            $hashedPassword
        );

        if (!$userRepository->save($user)) {
            return $this->render('register', ['messages' => ['An account with this email or nickname already exists']]);
        }

        header("Location: /login");
        exit();
    }

    public function logout() {
        Authorization::logout();
    }
}