<?php

namespace App\Models\branchadmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use Auth;
class Br_Exam_Timetable extends Model
{
    use HasFactory;
    protected $table='class_timetable';
    static public function getSingle($id){
        return self::find($id);  
      }
    
    static public function editTimeTable($class_id){
        $return =self::select('class_timetable.*',
        
        'subject.name as subject_name',
        'class.name as class_name',
        'users.name as teacher_name'
        )
        ->join('subject','subject.id','=','class_timetable.subject_id')
        ->join('users','users.id','=','class_timetable.teacher_id')
        ->join('class','class.id','=','class_timetable.class_id')
        ->where('class_timetable.class_id','=',$class_id)
        ->where('users.branch_id','=',Auth::user()->branch_id)
        ->where('class_timetable.type','=',1)
        ->where('class_timetable.is_deleted','=',0);
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
        if(!empty(Request::get('class_name')))
        {
            $return =$return->where('class.name','like',
            '%'.Request::get('class_name').'%'); 
        } 
        if(!empty(Request::get('date'))){
            $return=$return->whereDate('class_timetable.created_at','=',Request::get('date'));  
        } 
        $return= $return->orderBy('class_timetable.id','desc')
        ->get();

        return $return;
    }
    static public function getRecord(){
        $return =self::select('class_timetable.*',
        
        'subject.name as subject_name',
        'class.name as class_name',
        'users.name as teacher_name'
        )
        ->join('subject','subject.id','=','class_timetable.subject_id')
        ->join('users','users.id','=','class_timetable.teacher_id')
        ->join('class','class.id','=','class_timetable.class_id')
        ->where('users.branch_id','=',Auth::user()->branch_id)
        ->where('class_timetable.term','=',Auth::user()->term)
        ->where('class_timetable.is_deleted','=',0)
        ->where('class_timetable.type','=',1);
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
        if(!empty(Request::get('class_name')))
        {
            $return =$return->where('class.name','like',
            '%'.Request::get('class_name').'%'); 
        } 
        if(!empty(Request::get('date'))){
            $return=$return->whereDate('class_timetable.created_at','=',Request::get('date'));  
        } 
        $return= $return->orderBy('class_timetable.id','desc')
        ->paginate(10);

        return $return;
    }
    static public function getAlreadyFirst($period_id,$room_id,$day)
    {
        return self::where('period_id','=',$period_id)
        ->where('room_id','=',$room_id)
        ->where('day','=',$day)
        ->where('class_timetable.type','=',1)
        ->first();
    }
    static public function deleteSubjectTimeTable($period_id,$room_id,$day)
    {
        return self::where('period_id','=',$period_id)
        ->where('room_id','=',$room_id)
        ->where('day','=',$day)
        ->where('class_timetable.type','=',1)
        ->delete();
    }
}