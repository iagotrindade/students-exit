<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\StudentHandler;

class StudentController extends Controller {
    public function newstudent () {
        $group = filter_input(INPUT_POST, 'group');
        $studentName = filter_input(INPUT_POST, 'student_name');
        $studentNumber = filter_input(INPUT_POST, 'student_number');

        if ($group && $studentName && $studentNumber) {
            if (StudentHandler::studentExists($studentNumber) === false) {
                StudentHandler::addStudent($group, $studentName, $studentNumber);

                $_SESSION['flash'] = 'Saída cadastrada com sucesso!';
                $this->redirect('/');
            }

            else {
                StudentHandler::addExit($group, $studentName, $studentNumber);

                $_SESSION['flash'] = 'Saída cadastrada com sucesso!';
                $this->redirect('/');
            }  
        }

        else {
            $_SESSION['flash'] = 'Ops, ocorreu um problema, tente novamente!';
                $this->redirect('/');
        }
    }
}