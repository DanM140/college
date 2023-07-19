<?php

namespace App\Models\student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
use Request;
class Payment extends Model
{
    use HasFactory;
    static public function getRecord(){
        $return = DB::table('payments')
        ->join('users', 'users.id', '=', 'payments.student_id','left')
        ->join('fee', 'fee.id', '=', 'payments.fee_id','left')
        ->select('payments.*','users.*','fee.*', 'users.name as first_name'
    );
     if(!empty(Request::get('fee_id'))){
            $return=$return->where('payments.fee_id','=',Request::get('fee_id'));  
        } 
        $return =$return->where('payments.student_id','=',Auth::user()->id)
        
        ->get();
        return  $return;    
    }
   
}
