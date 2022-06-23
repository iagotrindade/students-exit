<?php
namespace src\handlers;

use \src\models\Student;

class StudentHandler {
    
    public static function studentExists ($studentNumber) {
        $student = Student::select()->where('student_number', $studentNumber)->one();

        return $student ? true : false;
    }

    public static function addStudent ($group, $studentName, $studentNumber) {
        if ($group && $studentName && $studentNumber) {
            $outPeriod = date('H:i:s');

            Student::insert([
                'group_number' => $group,
                'name' => $studentName,
                'student_number' => $studentNumber,
                'out_period' => $outPeriod,
                'situation' => 'out'
            ])->execute();
        }
    }

    public static function getStudents () {
        $students[] = Student::select()->where('situation', 'out' )->get();
        
        return $students;
    }
}
