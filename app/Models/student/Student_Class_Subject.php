<?php

namespace App\Models\student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
class Student_Class_Subject  extends Model
{
    use HasFactory;
    protected $table='student_class_subject';

    static public function getSingle($id){
      return self::find($id);  
    }

    static public function getRecord(){
        $return =self::select('student_class_subject.*',
        'class.name as class_name',
        'subject.name as subject_name',
        'users.name as created_by_name'
        )
        ->join('subject','subject.id','=','student_class_subject.subject_id')
        ->join('class','class.id','=','student_class_subject.class_id')
        ->join('users','users.id','=','student_class_subject.student_id')
        ->where('student_class_subject.is_deleted','=',0);
        if(!empty(Request::get('class_name')))
        {
            $return =$return->where('class.name','like',
            '%'.Request::get('class_name').'%'); 
        } 
        if(!empty(Request::get('subject_name')))
        {
            $return =$return->where('subject.name','like',
            '%'.Request::get('subject_name').'%'); 
        } 
        if(!empty(Request::get('term'))){
            $return=$return->where('subject.term','=',Request::get('term'));  
        }
        if(!empty(Request::get('date'))){
            $return=$return->whereDate('student_class_subject.created_at','=',Request::get('date'));  
        } 
        $return= $return->orderBy('student_class_subject.id','desc')
        ->paginate(10);

        return $return;
    }
    
    
    static public function getAlreadyFirst($subject_id)
    {
        return self::where('subject_id','=',$subject_id)
        ->first();
    }
    static public function getAssignedSubjectId($class_id){
        return self::where('class_id','=',$class_id)
        ->where('is_deleted','=',0)
        ->get(); 
    }
    static public function deleteSubject($class_id)
    {
        return self::where('class_id','=',$class_id)
        ->delete(); 
    }
}
