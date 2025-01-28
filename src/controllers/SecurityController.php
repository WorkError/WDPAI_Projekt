<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    public function login()
    {

        session_start();

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
        $userRepository = new UserRepository();
        $hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $user = new User(
            $_POST["first_name"],
            $_POST["last_name"],
            $_POST["nickname"],
            $_POST["email"],
            $_POST["birth_date"],
            $hashedPassword
            );

        $userRepository->save($user);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/login");
    }

    public function logout() {
        Authorization::logout();
    }
}