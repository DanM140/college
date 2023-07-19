<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\teacher\T_Teacher_Subject;
use App\Models\teacher\Student_Class_Subject;
use App\Models\User;

class T_TeacherController   extends Controller
{
    
    public function list(Request $request){
        $data['getRecord']=T_Teacher_Subject::getRecord();
        return view('teacher.subject',$data);
    }
    public function students(Request $request){
        $data['getRecord']=Student_Class_Subject::getRecord_All();
        return view('teacher.students',$data);
    }
    public function student(Request $request){
       
        $class_id = $request->class_id;
        $subject_id = $request->subject_id;
        $data['getRecord']=Student_Class_Subject::getRecord($class_id,$subject_id);
        return view('teacher.student',$data);
    }
    
}