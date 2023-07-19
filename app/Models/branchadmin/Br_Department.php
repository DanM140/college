<?php

namespace App\Models\branchadmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use Auth;
class Br_Department  extends Model
{
    use HasFactory;
    protected $table="department";
    static public function getSingle($id){
        return self::find($id);
    }
    static public  function getRecord(){
        $return =Br_Department::select('department.*',
        'users.name as created_by_name',
        'branch.name as branch_name'
        )
        ->join('branch','branch.id','department.branch_id')
        ->join('users','users.id','department.created_by')
        ->where('department.is_deleted','=',0)
        ->where('users.branch_id','=',Auth::user()->branch_id)
        ->orderBy('department.id','desc')
        ->paginate(10);

        return $return;
    }
   static  public function getDepartment(){
    $return =Br_Department::select('department.*')
    ->where('is_deleted','=',0)
    ->orderBy('id','desc')
    ->get();

    return $return;
   }
    
}
