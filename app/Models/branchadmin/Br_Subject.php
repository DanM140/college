<?php

namespace App\Models\branchadmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use Auth;
class Br_Subject  extends Model
{
    use HasFactory;
    protected $table='subject';
    static public function getSingle($id){
        return self::find($id);
     }
    static public function getRecord(){
        $return = Br_Subject::select('subject.*','users.name as created_by_name','fee.name as term')
                ->join('users','users.id','subject.created_by')
                ->join('fee','fee.id','subject.term')
                ->where('users.branch_id','=',Auth::user()->branch_id);
            if(!empty(Request::get('name')))
            {
                $return =$return->where('subject.name','like',
                '%'.Request::get('name').'%'); 
            } 
            if(!empty(Request::get('type')))
            {
                $return =$return->where('subject.type','=',
                Request::get('type')); 
            } 
           
            if(!empty(Request::get('date'))){
                $return=$return->whereDate('subject.created_at','=',Request::get('date'));  
            } 
            $return =$return->where('subject.is_deleted','=',0)
                ->orderBy('subject.id','desc')
                ->paginate(10);
        return  $return;
    }
    static public function getSubject(){
        $return =Br_Subject::select('subject.*')
        ->join('users','users.id','subject.created_by')
        ->where('subject.term','=',Auth::user()->term);
        if(!empty(Request::get('department_id')))
        {
            $return =$return->where('subject.department_id','=',Request::get('department_id')); 
        }
        $return =$return->where('subject.is_deleted','=',0)
        ->where('subject.status','=',0)
        
        ->orderBy('subject.name','asc')
        ->get();
         return  $return;   
    }
    
}
