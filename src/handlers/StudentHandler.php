<?php
namespace src\handlers;

use \src\models\Student;

class StudentHandler {
    public static function studentExists($group, $studentName) {
        $student = Student::select()->where('name', $studentName)->one();
        return $user ? true : false;
    }
}
