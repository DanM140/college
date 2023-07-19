<?php

namespace App\Models\branchadmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
class Br_Fee  extends Model
{
    use HasFactory;
    protected $table="fee";
    static public function getSingle($id){
        return self::find($id);
    }
    static public function getRecord()
    {
        $return=Br_Fee::select('fee.*')
        ->where('level','=',1);
        if(!empty(Request::get('name')))
            {
                $return =$return->where('name','like',
                '%'.Request::get('name').'%'); 
            } 
        if(!empty(Request::get('status')))
        {
            $return =$return->where('status','=',Request::get('status')); 
        }
        $return =$return ->where('fee.is_deleted','=',0)
        ->orderBy('fee.id','desc')
        
        ->paginate(10);
        return  $return;
    }
    static public function getCertRecord()
    { $return=Br_Fee::select('fee.*')
        ->where('level','=',0);
        if(!empty(Request::get('name')))
            {
                $return =$return->where('name','like',
                '%'.Request::get('name').'%'); 
            } 
        if(!empty(Request::get('status')))
        {
            $return =$return->where('status','=',Request::get('status')); 
        }
        $return =$return ->where('fee.is_deleted','=',0)
        ->orderBy('fee.id','desc')
        
        ->paginate(10);
        return  $return;
    }
    static public function getFee(){
        $return =Br_Fee::select('fee.*')
        ->where('is_deleted','=',0)
        ->where('status','=',0)
        ->orderBy('id','asc')
        ->get();
        return  $return;
    }
    static public function getTry(){
        $return =Br_Fee::select('fee.*')
        ->where('is_deleted','=',0)
        ->where('status','=',0)
        ->count();
        return  $return;
    }
    static public function getCurrentFee($term){
        $return =Br_Fee::select('fee.*')
        ->where('fee.is_deleted','=',0)
        ->where('fee.status','=',0)
        ->where('fee.id','=',$term)
        ->first();
        return  $return;
    }
    
}




