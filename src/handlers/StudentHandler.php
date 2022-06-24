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

            //Morning Periods
            $morningPeriod1S = date('H:i:s', strtotime('07:30:00'));
            $morningPeriod1F = date('H:i:s', strtotime('08:19:59'));

            $morningPeriod2S = date('H:i:s', strtotime('08:20:00'));
            $morningPeriod2F = date('H:i:s', strtotime('09:09:59'));

            $morningPeriod3S = date('H:i:s', strtotime('09:10:00'));
            $morningPeriod3F = date('H:i:s', strtotime('09:59:59'));

            $morningPeriod4S = date('H:i:s', strtotime('10:00:00'));
            $morningPeriod4F = date('H:i:s', strtotime('10:49:59'));

            $morningPeriod5S = date('H:i:s', strtotime('10:50:00'));
            $morningPeriod5F = date('H:i:s', strtotime('11:39:59'));

            $morningPeriod6S = date('H:i:s', strtotime('11:40:00'));
            $morningPeriod6F = date('H:i:s', strtotime('12:29:59'));


            //Afternoon periods
            $afternoonPeriod1S = date('H:i:s', strtotime('13:00:00'));
            $afternoonPeriod1F = date('H:i:s', strtotime('13:49:59'));

            $afternoonPeriod2S = date('H:i:s', strtotime('13:50:00'));
            $afternoonPeriod2F = date('H:i:s', strtotime('14:39:59'));

            $afternoonPeriod3S = date('H:i:s', strtotime('14:40:00'));
            $afternoonPeriod3F = date('H:i:s', strtotime('15:29:59'));

            $afternoonPeriod4S = date('H:i:s', strtotime('15:30:00'));
            $afternoonPeriod4F = date('H:i:s', strtotime('16:19:59'));

            $afternoonPeriod5S = date('H:i:s', strtotime('16:20:00'));
            $afternoonPeriod5F = date('H:i:s', strtotime('17:09:59'));

            
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


            $situationOut = 'Fora de sala';

            if(strtotime($outPeriod) >= $morningPeriod1S && strtotime($outPeriod) <= $morningPeriod1F || strtotime($outPeriod) >= $afternoonPeriod1S && strtotime($outPeriod) <= $afternoonPeriod1F || strtotime($outPeriod) >= $nightPeriod1S && strtotime($outPeriod) <= $nightPeriod1F) {
                $outPeriod = "1º Periodo";
            }

            else if (strtotime($outPeriod) >= $morningPeriod2S && strtotime($outPeriod) <= $morningPeriod2F || strtotime($outPeriod) >= $afternoonPeriod2S && strtotime($outPeriod) <= $afternoonPeriod2F || strtotime($outPeriod) >= $nightPeriod2S && strtotime($outPeriod) <= $nightPeriod2F) {
                $outPeriod = '2º Periodo';
            }

            else if (strtotime($outPeriod) >= $morningPeriod3S && strtotime($outPeriod) <= $morningPeriod3F || strtotime($outPeriod) >= $afternoonPeriod3S && strtotime($outPeriod) <= $afternoonPeriod3F || strtotime($outPeriod) >= $nightPeriod3S && strtotime($outPeriod) <= $nightPeriod3F) {
                $outPeriod = '3º Periodo';
            }

            else if (strtotime($outPeriod) >= $morningPeriod4S && strtotime($outPeriod) <= $morningPeriod4F || strtotime($outPeriod) >= $afternoonPeriod4S && strtotime($outPeriod) <= $afternoonPeriod4F || strtotime($outPeriod) >= $nightPeriod4S && strtotime($outPeriod) <= $nightPeriod4F) {
                $outPeriod = '4º Periodo';
            }

            else if (strtotime($outPeriod) >= $morningPeriod5S && strtotime($outPeriod) <= $morningPeriod5F || strtotime($outPeriod) >= $afternoonPeriod5S && strtotime($outPeriod) <= $afternoonPeriod5F || strtotime($outPeriod) >= $nightPeriod5S && strtotime($outPeriod) <= $nightPeriod5F) {
                $outPeriod = '5º Periodo';
            }

            else if (strtotime($outPeriod) >= $morningPeriod6S && strtotime($outPeriod) <= $morningPeriod6F) {
                $outPeriod = '6º Periodo';
            }
            


            Student::insert([
                'group_number' => $group,
                'name' => $studentName,
                'student_number' => $studentNumber,
                'out_period' => $outPeriod,
                'situation' => $situationOut
            ])->execute();
        }
    }

    public static function getStudents () {
        $studentsList = Student::select()->where('situation', 'Fora de sala' )->get();
        
        $students = [];

        foreach($studentsList as $student) {
            $newStudent = new Student();
            $newStudent->id = $student['id'];
            $newStudent->name = $student['name'];
            $newStudent->studentNumber = $student['student_number']; 
            $newStudent->groupNumber = $student['group_number']; 
            $newStudent->outPeriod = $student['out_period']; 
            $newStudent->situation = $student['situation']; 

            $students[] = $newStudent;
        }
        return $students;
    }

    public static function changeSituation ($id) {
        $situationIn = 'Dentro de sala';
        Student::update()->set('situation', $situationIn)->where('id', $id)->execute();

    }

    public static function deleteStudent ($id) {
        Student::delete()->where('id', $id )->execute();
    }
}
