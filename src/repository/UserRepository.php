<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends  Repository
{
    public function getUserByEmail($email) : ?User
    {
        $statement = $this->database->connect()->prepare("SELECT * FROM public.users WHERE email = :email");
        $statement->bindParam(':email', $email,PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }
        //public function __construct( $firstName, $lastName, $nickname, $email, $password, $dateOfBirth)
        //    {
        //        $this->firstName = $firstName;
        //        $this->lastName = $lastName;
        //        $this->nickname = $nickname;
        //        $this->email = $email;
        //        $this->password = $password;
        //        $this->dateOfBirth = $dateOfBirth;
        //    }

        $userObject = new User(
            $user['first_name'],
            $user['last_name'],
            $user['nickname'],
            $user['email'],
            $user['birth_date'],
            $user['password_hash']
        );

        $userObject->setId($user['id']);
        return $userObject;
    }

    public function save(User $user): bool
    {
        $statement = $this->database->connect()->prepare("
                INSERT INTO public.users (email, password_hash, first_name, last_name, birth_date, nickname,created_at)
                VALUES (:email, :password, :name, :surname, :date_of_birth,:nickname, NOW())
                 ");

        $statement->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $statement->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
        $statement->bindValue(':name', $user->getFirstName(), PDO::PARAM_STR);
        $statement->bindValue(':surname', $user->getLastName(), PDO::PARAM_STR);
        $statement->bindValue(':date_of_birth', $user->getDateOfBirth(), PDO::PARAM_STR);
        $statement->bindValue(':nickname', $user->getNickname(), PDO::PARAM_STR);

        return $statement->execute();
    }
}