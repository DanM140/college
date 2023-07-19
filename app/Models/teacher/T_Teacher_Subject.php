<?php

namespace App\Models\teacher;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use Auth;
class T_Teacher_Subject  extends Model
{
    use HasFactory;
    protected $table='teacher_subject';

    static public function getSingle($id){
      return self::find($id);  
    }

    static public function getRecord(){
        $return =self::select('teacher_Subject.*',
        
        'subject.name as subject_name',
        'class.name as class_name',
        'users.name as teacher_name'
        )
        ->join('subject','subject.id','=','teacher_subject.subject_id')
        ->join('users','users.id','=','teacher_subject.teacher_id')
        ->join('class','class.id','=','teacher_subject.class_id')
        ->where('teacher_subject.teacher_id','=',Auth::user()->id)
        
        ->where('teacher_subject.is_deleted','=',0);
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
        if(!empty(Request::get('date'))){
            $return=$return->whereDate('teacher_Subject.created_at','=',Request::get('date'));  
        } 
        $return= $return->orderBy('teacher_Subject.id','desc')
        ->paginate(10);

        return $return;
    }
   
}



