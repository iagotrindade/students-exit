<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\StudentHandler;

class StudentController extends Controller {
    public function newstudent () {
        $class = filter_input(INPUT_POST, 'class');
        $studentName = filter_input(INPUT_POST, 'student_name');
        $studentNumber = filter_input(INPUT_POST, 'student_number');

        if ($class && $studentName && $studentNumber) {
            $period = StudentHandler::checkPeriod();
            if (StudentHandler::studentExists($studentNumber, $class) === false) {

                StudentHandler::addStudent($class, $studentName, $studentNumber, $period);

                $_SESSION['flashSuccess'] = 'Saída cadastrada com sucesso!';
                $this->redirect('/');
            }

            else {
                $period = StudentHandler::checkPeriod();

                StudentHandler::addExit($studentNumber);

                $_SESSION['flashSuccess'] = 'Saída cadastrada com sucesso!';
                $this->redirect('/');
            }  
        }

        else {
            $_SESSION['flashError'] = 'Ops, ocorreu um problema, tente novamente!';
                $this->redirect('/');
        }
    }

    /*Função removida a pedido do usuário */

    /*public function studentreturn ($id) {
        if ($id) {
            $situation = StudentHandler::changeSituation($id);
            if ($situation === true) {
                $_SESSION['flashSuccess'] = 'Situação do aluno atualizada com sucesso';
                $this->redirect('/');
            }

            else {
                $_SESSION['flashError'] = 'Ops, ocorreu um problema, tente novamente!';
                $this->redirect('/');
            }
        }

        else {
            $_SESSION['flashError'] = 'Ops, ocorreu um problema, tente novamente!';
                $this->redirect('/');
        }
    }*/

    public function delete ($id) {
        if ($id) {
            $deleteSituation = StudentHandler::deleteStudent($id);

            if ($deleteSituation === true) {
                $_SESSION['flashSuccess'] = "Aluno excluído com sucesso!";
                $this->redirect('/');
            }

            else {
                $_SESSION['flashError'] = 'Ops, ocorreu um problema, tente novamente!';
                $this->redirect('/');
            }

            
        }

        else {
            $_SESSION['flashError'] = 'Ops, ocorreu um problema, tente novamente!';
            $this->redirect('/');
        }
            
    }
}