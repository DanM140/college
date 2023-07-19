<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use Auth;
class BranchModel extends Model
{
    use HasFactory;
    protected $table="branch";
    static public function getSingle($id){
        return self::find($id);
    }
    static public function getRecord()
    {
        $return=BranchModel::select('branch.*','users.name as created_by_name')
        ->join('users','users.id','branch.created_by')
        ->where('branch.is_deleted','=',0)
        ->orderBy('branch.id','desc')
        ->paginate(10);
        return  $return;
    }
    static public function getBranch(){
        $return =BranchModel::select('branch.*')
        ->where('branch.is_deleted','=',0)
        ->where('branch.status','=',0)
        ->orderBy('branch.name','asc')
        ->get();
        return  $return;
    }
    static public function getBranchCode(){
        $return =BranchModel::select('branch.*')
        ->where('branch.is_deleted','=',0)
        ->where('branch.status','=',0)
        ->where('branch.id','=',Auth::user()->branch_id)
        ->first();
        return  $return;
    }

    
}
