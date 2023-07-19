<?php

namespace App\Models\teacher;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;
    protected $table="fee";
    static public function getFee(){
        $return =self::select('fee.*')
        ->where('is_deleted','=',0)
        ->where('status','=',0)
        ->orderBy('id','asc')
        ->get();
        return  $return;
    }
}
