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

                User::update()->set('token', $token)->where('surname', $surname)->execute();

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
            'token' => $token
        ])->execute();

        return $token;
    }

    public static function recoverPassword ($email, $token) {
        if($email && $token) {
            User::update()->set('token', $token)->where('email', $email)->execute();

            $data = User::select()->where('email', $email)->one();

            if(count($data) > 0) {

                $user = new User();
                $user->id = ($data['id']);
                $user->name =($data['name']);
                
                return $user;
            }

            $recoverLink = 'http://localhost/students-exit/mvc/public/password_recover/token='.$token;


            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            $from = "iagost1@hotmail.com";
            $to = 'iago23st1@gmail.com';
            $subject = "Alteração de senha!";
            $message = "Olá" .' '. $user->name . '! Você solicitou uma troca de senha do sistema de controle de saída dos alunos, clique no link abaixo para recuperar sua senha <br>'.$recoverLink;
            $headers = "From:" . $from;

            mail($to,$subject,$message, $headers);

            $recoverLink = 'http://localhost/students-exit/mvc/public/password_recover/token='.$token;

		    $mensagem = "Clique no link para redefinir sua senha:<br/>".$recoverLink;

		    $assunto = "Redefinição de senha";

		    $headers = 'From: iagost1@hotmail.com'."\r\n" .
				   'X-Mailer: PHP/'.phpversion();

		    mail('iago23st1@gmail.com', $assunto, $mensagem, $headers);

            

        }
    }
}