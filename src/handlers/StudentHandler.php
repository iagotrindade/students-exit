<?php
namespace src\handlers;

use \src\models\Student;

class StudentHandler {
    
    public static function studentExists ($group, $studentName, $studentNumber) {
        $student = Student::select()->where('student_number', $studentNumber)->one();
        return $student ? true : false;
    }
}