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

                $_SESSION['flashSuccess'] = 'Saída cadastrada com sucesso!';
                $this->redirect('/');
            }

            else {
                StudentHandler::addExit($group, $studentName, $studentNumber);

                $_SESSION['flashSuccess'] = 'Saída cadastrada com sucesso!';
                $this->redirect('/');
            }  
        }

        else {
            $_SESSION['flashError'] = 'Ops, ocorreu um problema, tente novamente!';
                $this->redirect('/');
        }
    }

    public function studentreturn ($id) {
        StudentHandler::changeSituation($id);

        $_SESSION['flashSuccess'] = 'Situação do aluno atualizada com sucesso';
        $this->redirect('/');

    }

    public function delete ($id) {
        if ($id) {
            StudentHandler::deleteStudent($id);

            $_SESSION['flashSuccess'] = "Aluno excluído com sucesso!";

            $this->redirect('/');
        }

        else {
            $_SESSION['flashError'] = 'Ops, ocorreu um problema, tente novamente!';

            $this->redirect('/');
        }
            
    }
}