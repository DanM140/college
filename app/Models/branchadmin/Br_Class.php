<?php

namespace App\Models\branchadmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use Auth;
class Br_Class  extends Model
{
    use HasFactory;
    protected $table='class';
    static public function getSingle($id){
       return self::find($id);
    }
    static public function getRecord()
    {
        $return = Br_Class::select('class.*','users.name as created_by_name')
        ->where('users.branch_id','=',Auth::user()->branch_id)
                ->join('users','users.id','class.created_by');

            if(!empty(Request::get('name')))
            {
                $return =$return->where('class.name','like',
                '%'.Request::get('name').'%'); 
            } 
           
            if(!empty(Request::get('department_id'))){
                $return=$return->where('class.department_id','=',
                Request::get('department_id'));  
            }
            if(!empty(Request::get('date'))){
                $return=$return->whereDate('class.created_at','=',Request::get('date'));  
            } 
            $return =$return->where('class.is_deleted','=',0)
                ->orderBy('class.id','desc')
                ->paginate(10);
        return  $return;
    }
    static public function getClass(){
        $return = Br_Class::select('class.*')
        ->join('users','users.id','class.created_by')
        ->where('class.is_deleted','=',0)
        ->where('class.status','=',0)
        ->orderBy('class.name','asc')
        ->get();
        return  $return;    
    }
}

