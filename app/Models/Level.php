<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
class Level extends Model
{
    use HasFactory;
    protected $table="level";
    static public function getSingle($id){
        return self::find($id);
    }
    static public function getRecord()
    {
        $return=Level::select('level.*')
        
        ->where('level.is_deleted','=',0)
        ->orderBy('level.id','desc')
        ->paginate(10);
        return  $return;
    }
    static public function getLevel(){
        $return =Level::select('level.*')
        ->where('level.is_deleted','=',0)
        ->where('level.status','=',0)
        ->orderBy('level.name','asc')
        ->get();
        return  $return;
    }

    
}

