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
            $found = StudentHandler::studentExists($studentNumber, $class);
            if ($found === false) {
                $period = StudentHandler::checkPeriod();

                StudentHandler::addStudent($class, $studentName, $studentNumber, $period);

                $_SESSION['flashSuccess'] = 'Saída cadastrada com sucesso!';
                $this->redirect('/');
            }

            else {
                $period = StudentHandler::checkPeriod();

                StudentHandler::addExit($found, $period);

                $_SESSION['flashSuccess'] = 'Saída cadastrada com sucesso!';
                $this->redirect('/');
            }  
        }

        else {
            $_SESSION['flashError'] = 'Ops, ocorreu um problema, tente novamente!';
                $this->redirect('/');
        }
    }

    /*Função removida a pedido do usuário 
    public function studentreturn ($id) {
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
    }
    */

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