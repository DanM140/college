<?php

namespace App\Models\teacher;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
class Student_Class_Subject   extends Model
{
    use HasFactory;
    protected $table='student_class_subject';

    

    static public function getRecord($class_id,$subject_id){
        $return =self::select('student_class_subject.*',
        'class.name as class_name',
        'subject.name as subject_name',
        'users.name as created_by_name',
        'users.last_name as last_name',
        'users.admission_number as admission_number'
        )
        ->join('subject','subject.id','=','student_class_subject.subject_id')
        ->join('class','class.id','=','student_class_subject.class_id')
        ->join('users','users.id','=','student_class_subject.student_id')
        ->where('student_class_subject.is_deleted','=',0)
        ->where('student_class_subject.class_id','=',$class_id)
        ->where('student_class_subject.subject_id','=',$subject_id);
        if(!empty(Request::get('admission_number')))
        {
            $return =$return->where('users.admission_number','like',
            '%'.Request::get('admission_number').'%'); 
        } 
        if(!empty(Request::get('created_by_name')))
        {
            $return =$return->where('users.name','like',
            '%'.Request::get('created_by_name').'%'); 
        } 
        if(!empty(Request::get('last_name')))
        {
            $return =$return->where('users.last_name','like',
            '%'.Request::get('last_name').'%'); 
        }
        if(!empty(Request::get('users.email'))){
            $return=$return->where('users.email','=',Request::get('email'));  
        }
        if(!empty(Request::get('date'))){
            $return=$return->whereDate('student_class_subject.created_at','=',Request::get('date'));  
        } 
        $return= $return->orderBy('student_class_subject.id','desc')
        ->paginate(10);

        return $return;
    }
   
    static public function getRecord_All(){
        $return =self::select('student_class_subject.*',
        'class.name as class_name',
        'subject.name as subject_name',
        'users.name as created_by_name',
        'users.last_name as last_name',
        'users.admission_number as admission_number'
        )
        ->join('subject','subject.id','=','student_class_subject.subject_id')
        ->join('class','class.id','=','student_class_subject.class_id')
        ->join('users','users.id','=','student_class_subject.student_id')
        ->where('student_class_subject.is_deleted','=',0);
        if(!empty(Request::get('admission_number')))
        {
            $return =$return->where('users.admission_number','like',
            '%'.Request::get('admission_number').'%'); 
        }
        if(!empty(Request::get('class_name')))
        {
            $return =$return->where('class.name','like',
            '%'.Request::get('class_name').'%'); 
        } 
        if(!empty(Request::get('created_by_name')))
        {
            $return =$return->where('users.name','like',
            '%'.Request::get('created_by_name').'%'); 
        } 
        if(!empty(Request::get('last_name')))
        {
            $return =$return->where('users.last_name','like',
            '%'.Request::get('last_name').'%'); 
        }
        if(!empty(Request::get('users.email'))){
            $return=$return->where('users.email','=',Request::get('email'));  
        }
        if(!empty(Request::get('date'))){
            $return=$return->whereDate('student_class_subject.created_at','=',Request::get('date'));  
        } 
        $return= $return->orderBy('student_class_subject.id','desc')
        ->paginate(10);

        return $return;
    } 
    
}

