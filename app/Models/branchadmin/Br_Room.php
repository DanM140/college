<?php

namespace App\Models\branchadmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Br_room extends Model
{
    use HasFactory;
    protected $table="room";
    static public function getSingle($id){
        return self::find($id);
    }
    static  public function getRoom(){
        $return =Br_Room::select('room.*')
        ->where('is_deleted','=',0)
        ->orderBy('id','desc')
        ->get();
    
        return $return;
       }
       static public  function getRecord(){
        $return =Br_Room::select('room.*',
        'users.name as created_by_name'
        )
        ->join('users','users.id','room.created_by')
        ->where('room.is_deleted','=',0)
        ->where('users.branch_id','=',Auth::user()->branch_id)
        ->orderBy('room.id','desc')
        ->paginate(10);

        return $return;
    }
}
