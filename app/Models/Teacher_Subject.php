<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
class Teacher_Subject extends Model
{
    use HasFactory;
    protected $table='teacher_subject';

    static public function getSingle($id){
      return self::find($id);  
    }

    static public function getRecord(){
        $return =self::select('teacher_Subject.*',
        
        'subject.name as subject_name',
        'users.name as teacher_name'
        )
        ->join('subject','subject.id','=','teacher_subject.subject_id')
        ->join('users','users.id','=','teacher_subject.teacher_id')
        ->where('teacher_subject.is_deleted','=',0);
        if(!empty(Request::get('teacher_name')))
        {
            $return =$return->where('users.name','like',
            '%'.Request::get('teacher_name').'%'); 
        } 
        if(!empty(Request::get('subject_name')))
        {
            $return =$return->where('subject.name','like',
            '%'.Request::get('subject_name').'%'); 
        } 
        if(!empty(Request::get('date'))){
            $return=$return->whereDate('teacher_Subject.created_at','=',Request::get('date'));  
        } 
        $return= $return->orderBy('teacher_Subject.id','desc')
        ->paginate(10);

        return $return;
    }
    static public function getAlreadyFirst($teacher_id,$subject_id)
    {
        return self::where('teacher_id','=',$teacher_id)
        ->where('subject_id','=',$subject_id)
        ->first();
    }
    static public function getAssignedSubjectId($teacher_id){
        return self::where('teacher_id','=',$teacher_id)
        ->where('is_deleted','=',0)
        ->get(); 
    }
    static public function deleteSubject($teacher_id)
    {
        return self::where('teacher_id','=',$teacher_id)
        ->delete(); 
    }
}

