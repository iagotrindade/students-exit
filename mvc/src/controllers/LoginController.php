<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;

class LoginController extends Controller {

    public function signin() {
        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('signin' , [
            'flash' => $flash
        ]);
    }

    public function signinAction() {
        $surname = filter_input(INPUT_POST, 'surname');
        $password = filter_input(INPUT_POST, 'password');

        if($surname && $password) {
            $token = LoginHandler::verifyLogin($surname, $password);
            if($token) {
                $_SESSION['token'] = $token;
                $this->redirect('/');
            }

            else {
                $_SESSION['flash'] = "E-mail e/ou senha não conferem!";
                $this->redirect('/login');
            }
        }

        else {
            $_SESSION['flash'] = 'Digite os campos de E-mail e/ou senha!';
            $this->redirect('/login');
        }
    }

    public function signup() {
        $this->render('signup');
    }

    public function signupAction () {
        $name = filter_input(INPUT_POST, 'name');
        $surname = filter_input(INPUT_POST, 'surname');
        $matter = filter_input(INPUT_POST, 'matter');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        if($name && $surname && $email && $matter && $password) {
            if(LoginHandler::emailExists($email) === false) {
                $token = LoginHandler::addUser($name, $surname, $email, $matter, $password);
                $_SESSION['token'] = $token;

                $this->redirect('/');
            }

            else {
                $_SESSION['flash'] = 'Usuário já cadastrado!';
                $this->redirect('/cadastro');
            }
        }

        else {
            $this->redirect('/cadastro');
        }
    }

    public function logout () {
        $_SESSION['token'] = '';

        $this->redirect('/login');
    }

    public function recover () {
       
        
        $this->render('recover');
        $_SESSION['flash'] = '';
    }

    public function recoverAction () {
        $email = filter_input(INPUT_POST, 'email');

        if ($email) {
            if (LoginHandler::emailExists($email)) {

                $token = md5(time().rand(0,9999).time());

                $this->user = LoginHandler::recoverPassword($email, $token);

                $_SESSION['flashSuccess'] = 'E-mail enviado!';

                $this->render('recover', [
                    'email' => $email,
                    'warningSuccess' => $_SESSION['flashSuccess'],
                    'user' => $this->user
                ]);

                $_SESSION['flashSuccess'] = '';
            }

            else {
                $_SESSION['flash'] = 'E-mail não cadastrado';
                
                $this->redirect('/recover', [
                    'flash' => $_SESSION['flash']
                ]);

                $_SESSION['flash'] = '';
            }
        }
        

    }
}