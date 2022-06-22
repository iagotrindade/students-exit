<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;

class StudentController extends Controller {
    public function newstudent () {
        $group = filter_input(INPUT_POST, 'group');
        $studentName = filter_input(INPUT_POST, 'student-name');

        if($group && $studentName) {
            if(StudentHandler::studentExists($group, $studentName) === false) {
                StudentHandler::addStudent($group, $studentName);

                $_SESSION['token'] = 'Saída cadastrada com sucesso!';

                $this->redirect('/');
            }

            else {
                StudentHandler::addExit($group, $studentName);

                $_SESSION['token'] = 'Saída cadastrada com sucesso!';

                $this->redirect('/');
            }
        }

        else {
            $_SESSION['token'] = 'Ops, ocorreu algum problema tente novamente!';
        }
    }
}