<?php
namespace src\controllers;
use \core\Controller;
use src\handlers\LoginHandler;
use \src\handlers\StudentHandler;
use src\handlers\ClassroomHandler;

class SearchController extends Controller {

    public function __construct() {
        $this->loggedUser = LoginHandler::checkLogin();
        
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function index () {

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

        $searchTerm = filter_input(INPUT_GET, 'searching');

        if (empty($searchTerm)) {
            $_SESSION['flashError'] = 'Ops, você não digitou nada no campo de busca!';
            $this->redirect('/');

        }

        $classes = ClassroomHandler::getClasses ();

        if (!empty($students = StudentHandler::searchStudents($searchTerm))) {
            $_SESSION['flashSuccess'] = 'Exibindo resultados encontrados...';

            $this->render('search', [
                'loggedUser' => $this->loggedUser,
                'searchTerm' => $searchTerm,
                'students' => $students,
                'flashSuccess' => $_SESSION['flashSuccess'],
                'classes' => $classes
            ]);

            $_SESSION['flashSuccess'] = '';
        } 

        else {
            $_SESSION['flashError'] = 'Nenhum aluno encontrado!';
            $this->render('search', [
                'loggedUser' => $this->loggedUser,
                'searchTerm' => $searchTerm,
                'students' => $students,
                'flashError' => $_SESSION['flashError'],
                'classes' => $classes
            ]);

            $_SESSION['flashError'] = '';
        }
        
        
    }
}