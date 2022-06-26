<?php
namespace src\handlers;
use src\models\Classroom;

class ClassroomHandler {
    public static function getClasses () {
        $classes = Classroom::select()->get();

        $classeList = [];

        foreach($classes as $classe) {
            $newClassroom = new Classroom();

            $newClassroom->id = $classe['id'];
            $newClassroom->classNumber = $classe['code']; 
            $newClassroom->students = $classe['class_students'];

            $classeList[] = $newClassroom;
        }

        return $classeList;
        
    }
    
}