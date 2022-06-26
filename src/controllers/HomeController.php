<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;
use \src\handlers\StudentHandler;
use \src\handlers\ClassroomHandler;

class HomeController extends Controller {
    private $loggedUser;

    public function __construct() {
        $this->loggedUser = LoginHandler::checkLogin();
        
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function index() {

        $flashSuccess = '';
        $flashError = '';

        if(!empty($_SESSION['flashSuccess'])) {
            $flashSuccess = $_SESSION['flashSuccess'];
            $_SESSION['flashSuccess'] = '';
        }   

        else if(!empty($_SESSION['flashError'])) {
            $flashError = $_SESSION['flashError'];
            $_SESSION['flashError'] = '';
        }   

        $classes = ClassroomHandler::getClasses ();
        

        $students = StudentHandler::getStudents ();

        $this->render('home', [
            'loggedUser' => $this->loggedUser,
            'students' => $students,
            'flashSuccess' => $flashSuccess,
            'flashError' => $flashError,
            'classes' => $classes
        ]);
    }
}