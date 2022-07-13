<?php
namespace src\handlers;

use \src\models\Student;
use \src\models\Classroom;

use \src\controllers\SearchController;

class StudentHandler {
    
    public static function studentExists ($studentNumber, $class) {

        $studentsList = Student::select()->where('class_code', $class)->get();
        $students = [];

        foreach($studentsList as $student) {
            $newStudent = new Student();
            $newStudent->id = $student['id'];
            $newStudent->studentNumber = $student['student_number']; 
            $newStudent->classNumber = $student['class_code']; 

            if($student['student_number'] == $studentNumber) {
                $found = $student['id'];
            }

            $students[] = $newStudent;
        }

        if(!empty($found)) {
            return $found;
        }

        else {
            return false;
        }
    }

    public static function checkPeriod () {
        date_default_timezone_set('America/Sao_Paulo');
            $outPeriod = date('H:i:s');


            //Morning Periods
            $morningPeriod1S = mktime(7,30,00);
            $morningPeriod1F = mktime(8,19,59);

            $morningPeriod2S = mktime(8,20,00);
            $morningPeriod2F = mktime(9,9,59);

            $morningPeriod3S = mktime(9,10,00);
            $morningPeriod3F = mktime(9,59,59);

            $morningPeriod4S = mktime(10,00,00);
            $morningPeriod4F = mktime(10,49,59);

            $morningPeriod5S = mktime(10,50,00);
            $morningPeriod5F = mktime(11,39,59);

            $morningPeriod6S = mktime(11,40,00);
            $morningPeriod6F = mktime(12,30,00);


            //Afternoon periods
            $afternoonPeriod1S = mktime(13,00,00);
            $afternoonPeriod1F = mktime(13,49,59);

            $afternoonPeriod2S = mktime(13,50,00);
            $afternoonPeriod2F = mktime(14,39,59);

            $afternoonPeriod3S = mktime(14,40,00);
            $afternoonPeriod3F = mktime(15,29,59);

            $afternoonPeriod4S = mktime(15,30,00);
            $afternoonPeriod4F = mktime(16,19,59);

            $afternoonPeriod5S = mktime(16,20,00);
            $afternoonPeriod5F = mktime(17,10,00);

            
            //Night periods
            $nightPeriod1S = mktime(18,30,00);
            $nightPeriod1F = mktime(19,14,59);

            $nightPeriod2S = mktime(19,15,00);
            $nightPeriod2F = mktime(19,59,59);

            $nightPeriod3S = mktime(20,00,00);
            $nightPeriod3F = mktime(20,44,59);

            $nightPeriod4S = mktime(20,45,00);
            $nightPeriod4F = mktime(21,29,59);

            $nightPeriod5S = mktime(21,30,00);
            $nightPeriod5F = mktime(22,14,59);


            if (strtotime($outPeriod) >= $morningPeriod1S && strtotime($outPeriod) <= $morningPeriod1F || strtotime($outPeriod) >= $afternoonPeriod1S && strtotime($outPeriod) <= $afternoonPeriod1F || strtotime($outPeriod) >= $nightPeriod1S && strtotime($outPeriod) <= $nightPeriod1F) {
                $outPeriod = '1º';
            }

            else if (strtotime($outPeriod) >= $morningPeriod2S && strtotime($outPeriod) <= $morningPeriod2F || strtotime($outPeriod) >= $afternoonPeriod2S && strtotime($outPeriod) <= $afternoonPeriod2F || strtotime($outPeriod) >= $nightPeriod2S && strtotime($outPeriod) <= $nightPeriod2F) {
                $outPeriod = '2º';
            }

            else if (strtotime($outPeriod) >= $morningPeriod3S && strtotime($outPeriod) <= $morningPeriod3F || strtotime($outPeriod) >= $afternoonPeriod3S && strtotime($outPeriod) <= $afternoonPeriod3F || strtotime($outPeriod) >= $nightPeriod3S && strtotime($outPeriod) <= $nightPeriod3F) {
                $outPeriod = '3º';
            }

            else if (strtotime($outPeriod) >= $morningPeriod4S && strtotime($outPeriod) <= $morningPeriod4F || strtotime($outPeriod) >= $afternoonPeriod4S && strtotime($outPeriod) <= $afternoonPeriod4F || strtotime($outPeriod) >= $nightPeriod4S && strtotime($outPeriod) <= $nightPeriod4F) {
                $outPeriod = '4º';
            }

            else if (strtotime($outPeriod) >= $morningPeriod5S && strtotime($outPeriod) <= $morningPeriod5F || strtotime($outPeriod) >= $afternoonPeriod5S && strtotime($outPeriod) <= $afternoonPeriod5F || strtotime($outPeriod) >= $nightPeriod5S && strtotime($outPeriod) <= $nightPeriod5F) {
                $outPeriod = '5º';
            }

            else if (strtotime($outPeriod) >= $morningPeriod6S && strtotime($outPeriod) <= $morningPeriod6F) {
                $outPeriod = '6º';
            }

            return $outPeriod;
    }

    public static function addStudent ($class, $studentName, $studentNumber, $period) {
        if ($class && $studentName && $studentNumber) {

            $situationOut = 'Banheiro';

            Student::insert([
                'class_code' => $class,
                'name' => $studentName,
                'student_number' => $studentNumber,
                'out_period' => $period,
                'situation' => $situationOut
            ])->execute();
            
            $classExist = Classroom::select()->where('code', $class)->one();

            return $outPeriod;
    }

    public static function addExit ($id, $period) {
        if ($id) {

            $student = Student::update()
                ->set('situation', 'Banheiro')
                ->set('out_period', $period)
                ->where('id', $id)
            ->execute();

        }
    }

    /*public static function changeSituation ($id) {
        if ($id) {
            $situationIn = 'Dentro de sala';
            Student::update()
                ->set('situation', $situationIn)
                ->where('id', $id)
            ->execute();

            return true;
        }
        
        else {
            return false;
        }
    }*/

    public static function deleteStudent ($id) {
        if ($id) {
            Student::delete()->where('id', $id )->execute();
            return true;
        }

        else {
            return false;
        }
        
    }

    public static function getStudents () {
        $studentsList = Student::select()->where('situation', 'Banheiro' )->get();
        
        $students = [];

        foreach($studentsList as $student) {
            $newStudent = new Student();
            $newStudent->id = $student['id'];
            $newStudent->name = $student['name'];
            $newStudent->studentNumber = $student['student_number']; 
            $newStudent->classNumber = $student['class_code']; 
            $newStudent->outPeriod = $student['out_period']; 
            $newStudent->situation = $student['situation']; 

            $students[] = $newStudent;
        }
        return $students;
    }

    public static function getStudentsByClass ($class) {
        $studentsList = Student::select()->where('class_code', $class )->get();
        
        $students = [];

        foreach($studentsList as $student) {
            $newStudent = new Student();
            $newStudent->id = $student['id'];
            $newStudent->name = $student['name'];
            $newStudent->studentNumber = $student['student_number']; 
            $newStudent->classNumber = $student['class_code']; 
            $newStudent->outPeriod = $student['out_period']; 
            $newStudent->situation = $student['situation']; 

            $students[] = $newStudent;
        }
        return $students;
    }

    public static function searchStudents ($term) {

        $students = [];
        $data = Student::select()->where('name', 'like', '%'.$term.'%')->get();

        if ($data) {
            foreach($data as $student) {
                $newStudent = new Student();
                $newStudent->id = $student['id'];
                $newStudent->name = $student['name'];
                $newStudent->studentNumber = $student['student_number']; 
                $newStudent->classNumber = $student['class_code']; 
                $newStudent->outPeriod = $student['out_period']; 
                $newStudent->situation = $student['situation'];

                $students[] = $newStudent;
            }
        }

        return $students;
    }   
}
