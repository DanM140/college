<?php

namespace App\Models\student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use Auth;
class Student_Marks   extends Model
{
    use HasFactory;
    protected $table='student_marks';

    static public function getSingle($id){
      return self::find($id);  
    }

    static public function getRecord(){
        $return =self::select('student_marks.*',
        'class.name as class_name',
        'subject.name as subject_name',
        'users.name as created_by_name',
        'users.admission_number as admission_number'
        )
        ->join('subject','subject.id','=','student_marks.subject_id')
        ->join('class','class.id','=','student_marks.class_id')
        ->join('users','users.id','=','student_marks.student_id')
        ->where('student_marks.student_id','=',Auth::user()->id)
        ->where('student_marks.is_deleted','=',0);
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
        if(!empty(Request::get('admission_number')))
        {
            $return =$return->where('users.admission_number','like',
            '%'.Request::get('admission_number').'%'); 
        } 
        if(!empty(Request::get('term'))){
            $return=$return->where('subject.term','=',Request::get('term'));  
        } 
        $return= $return->orderBy('student_marks.id','desc')
        ->paginate(10);

        return $return;
    }
    
    
    static public function getAlreadyFirst($class_id,$subject_id,$student_id)
    {
        return self::where('class_id','=',$class_id)
        ->where('subject_id','=',14)
        ->where('student_id','=',$student_id)
        ->first();
    }
    static public function deleteSubject($class_id)
    {
        return self::where('class_id','=',$class_id)
        ->delete(); 
    }
}
