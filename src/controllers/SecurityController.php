<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController
{
    public function register()
    {
        $userRepository = new UserRepository();
        $hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $user = new User($_POST["first_name"], $_POST["last_name"],$_POST["nickname"], $_POST["email"], $hashedPassword,$_POST["birth_date"]);

        $userRepository->save($user);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url/login");
    }
}