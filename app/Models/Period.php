<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
class Period extends Model
{
    use HasFactory;
    protected $table="period";
    static public function getSingle($id){
        return self::find($id);
    }
    static public function getRecord()
    {
        $return=Period::select('period.*')
        
        ->where('is_deleted','=',0)
        ->orderBy('id','desc')
        ->paginate(10);
        return  $return;
    }
    static public function getPeriod(){
        $return =Period::select('period.*')
        ->where('is_deleted','=',0)
        ->where('status','=',0)
        ->orderBy('name','asc')
        ->get();
        return  $return;
    }

    
}


