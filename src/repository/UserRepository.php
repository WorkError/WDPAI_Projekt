<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends  Repository
{
    public function getUserById($id): ?User {
        $statement = $this->database->connect()->prepare("SELECT * FROM public.users WHERE id = :id");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);
        if ($user == false) {
            return null;
        }

        $userObject = new User(
            $user['first_name'],
            $user['last_name'],
            $user['nickname'],
            $user['email'],
            $user['password_hash'],
            $user['birth_date']
        );
        $userObject->setId($user['id']);
        return $userObject;
    }

    public function getUserByEmail($email) : ?User
    {
        $statement = $this->database->connect()->prepare("SELECT * FROM public.users WHERE email = :email");
        $statement->bindParam(':email', $email,PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }

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

    public function update(User $user): bool {
        $statement = $this->database->connect()->prepare("
        UPDATE public.users
        SET first_name = :first_name, last_name = :last_name, nickname = :nickname, email = :email, birth_date = :birth_date
        WHERE id = :id
    ");

        $statement->bindValue(':first_name', $user->getFirstName(), PDO::PARAM_STR);
        $statement->bindValue(':last_name', $user->getLastName(), PDO::PARAM_STR);
        $statement->bindValue(':nickname', $user->getNickname(), PDO::PARAM_STR);
        $statement->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $statement->bindValue(':birth_date', $user->getDateOfBirth(), PDO::PARAM_STR);
        $statement->bindValue(':id', $user->getId(), PDO::PARAM_INT);

        return $statement->execute();
    }
}