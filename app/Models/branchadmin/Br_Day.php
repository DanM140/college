<?php

namespace App\Models\branchadmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Br_Day extends Model
{
    use HasFactory;
    protected $table="day";
    static  public function getDay(){
        $return =Br_Day::select('day.*')
        ->orderBy('id','asc')
        ->get();
    
        return $return;
       }
}
