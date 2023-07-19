<?php

namespace App\Models\student;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Term extends Model
{
    use HasFactory;
    protected $table="fee";
    static public function getFee(){
        $return =self::select('fee.*')
        ->where('is_deleted','=',0)
        ->where('status','=',0)
        ->where('level','=',Auth::user()->level_id)
        ->orderBy('id','asc')
        ->get();
        return  $return;
    }
    static public function getCurrentFee($term){
        $return =Term::select('fee.*')
        ->where('fee.is_deleted','=',0)
        ->where('fee.status','=',0)
        ->where('fee.id','=',$term)
        ->first();
        return  $return;
    }
}
