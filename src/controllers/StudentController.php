<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;

class StudentController extends Controller {
    public function newstudent () {
        $group = filter_input(INPUT_POST, 'group');
        $studentName = filter_input(INPUT_POST, 'student-name');
        $studentNumber = filter_input(INPUT_POST, 'student-number');

        if ($group && $studentName && $studentNumber) {
            if (Student::studentExists($group, $studentName, $studentNumber) === false) {
                Student::studentAdd($group, $studentName, $studentNumber);

                $_SESSION['flash'] = 'Saída cadastrada com sucesso!';
                $this->reditect('/');
            }

            else {
                Student::addExit($group, $studentName, $studentNumber);

                $_SESSION['flash'] = 'Saída cadastrada com sucesso!';
                $this->reditect('/');
            }  
        }

        else {
            $_SESSION['flash'] = 'Ops, ocorreu um problema, tente novamente!';
                $this->reditect('/');
        }
    }
}