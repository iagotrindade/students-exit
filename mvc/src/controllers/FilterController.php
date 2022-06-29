<?php
namespace src\controllers;
use \core\Controller;
use src\handlers\LoginHandler;
use \src\handlers\StudentHandler;
use src\handlers\ClassroomHandler;

class FilterController extends Controller {

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

        $classes = ClassroomHandler::getClasses ();

        if($_POST['class-select']) {
            $filterClass = $_POST['class-select'];

        }

        else {
            $_SESSION['flashError'] = 'Nenhuma turma selecionada!';
            $this->redirect('/');
        }
        
        if($filterClass) {
            if (!empty($students = StudentHandler::getStudentsByClass($filterClass))) {
                $_SESSION['flashSuccess'] = 'Exibindo resultados encontrados...';

                $this->render('filter', [
                    'loggedUser' => $this->loggedUser,
                    'students' => $students,
                    'flashSuccess' => $_SESSION['flashSuccess'],
                    'filterClass' => $filterClass,
                    'classes' => $classes
                ]);

                $_SESSION['flashSuccess'] = '';
            }

            else {
                $_SESSION['flashError'] = 'Nenhum aluno encontrado!';

                $this->render('filter', [
                    'loggedUser' => $this->loggedUser,
                    'students' => $students,
                    'flashError' => $_SESSION['flashError'],
                    'filterClass' => $filterClass,
                    'classes' => $classes
                ]);

                $_SESSION['flashError'] = '';
            }
        }
    }
}