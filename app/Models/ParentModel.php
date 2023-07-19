<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request; 

class ParentModel extends Model
{
    use HasFactory;
    protected $table="parent";
    static public function getSingle($id){
        return self::find($id);
     }
     static public function getRecord()
     {
         $return = ParentModel::select('parent.*','users.name as student_name','users.admission_number as admission_number')
                 ->join('users','users.id','parent.student_id');
 
             if(!empty(Request::get('name')))
             {
                 $return =$return->where('parent.name','like',
                 '%'.Request::get('name').'%'); 
             } 
            
            
             if(!empty(Request::get('date'))){
                 $return=$return->whereDate('parent.created_at','=',Request::get('date'));  
             } 
             $return =$return->where('parent.is_deleted','=',0)
                 ->orderBy('parent.id','desc')
                 ->paginate(10);
         return  $return;
     }
     static public function getAlreadyFirst($student_id,$gender)
    {
        return self::where('student_id','=',$student_id)
        ->where('gender','=',$gender)
        ->first();
    }
    static public function  checkGender($gender)
    {
        return self::where('gender','=',$gender)
        ->first();
    }
}
