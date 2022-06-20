<?php
namespace src\handlers;

use \src\models\User;

class LoginHandler {
    
    public static function checkLogin() {
        if(!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];

            $data = User::select()->where('token', $token)->one();
            if(count($data) > 0) {

                $loggedUser = new User();
                $loggedUser->id = ($data['id']);
                $loggedUser->name =($data['name']);
                $loggedUser->surname =($data['surname']);
                $loggedUser->email = ($data['email']);
                $loggedUser->matter =($data['matter']);
                
                return $loggedUser;
            }
        }

        return false;
    }

    public static function verifyLogin($surname, $password) {
        $user = User::select()->where('surname', $surname)->one();

        if($user) {
            if(password_verify($password, $user['password'])) {
                $token = md5(time().rand(0,9999).time());

                User::update()
                    ->set('token', $token)
                    ->where('surname', $surname)
                ->execute();

                return $token;
            }
        }

        else {
            return false;
        }
    }

    public static function emailExists($email) {
        $user = User::select()->where('email', $email)->one();
        return $user ? true : false;
    }

    public static function addUser($name, $surname, $email, $matter, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $token = md5(time().rand(0,9999).time());
        User::insert([
            'name' => $name,
            'surname' => $surname,
            'email' => $email,
            'matter' => $matter,
            'password' => $hash,
            'token' => $token,
        ])->execute();

        return $token;
    }
}