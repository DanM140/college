<?php

namespace App\Models\branchadmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Br_Period extends Model
{
    use HasFactory;
    protected $table="period";
    static public function getSingle($id){
        return self::find($id);
    }
    static  public function getPeriod(){
        $return =Br_Period::select('period.*')
        ->where('is_deleted','=',0)
        ->orderBy('id','desc')
        ->get();
    
        return $return;
       }
       static public  function getRecord(){
        $return =Br_Period::select('period.*',
        'users.name as created_by_name'
        )
        ->join('users','users.id','period.created_by')
        ->where('period.is_deleted','=',0)
        ->where('users.branch_id','=',Auth::user()->branch_id)
        ->orderBy('period.id','desc')
        ->paginate(10);

        return $return;
    }
}
