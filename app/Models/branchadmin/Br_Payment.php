<?php

namespace App\Models\branchadmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use Auth;
use Illuminate\Support\Facades\DB;
class Br_Payment  extends Model
{
    use HasFactory;
    protected $table="payments";
    static public function getSingle($id){
        return self::find($id);
    }
   
    static public function getRecord(){
        $return = DB::table('payments')
        ->join('users', 'users.id', '=', 'payments.student_id','left')
        ->join('fee', 'fee.id', '=', 'payments.fee_id','left')
        ->select('payments.*','users.*','fee.*', 'users.name as first_name','users.last_name as last_name',
        'payments.id as pay_id','payments.created_at as created_at'
    );
    $return =$return->where('users.branch_id','=',Auth::user()->branch_id)
        
    ->paginate(10);
    return  $return; 
}
static public function getTotal_Pay($id){
    $return = DB::table('payments')
    ->join('users', 'users.id', '=', 'payments.student_id','left')
    ->join('fee', 'fee.id', '=', 'payments.fee_id','left')
    ->select('payments.*','users.*','fee.*', 'users.name as first_name','users.last_name as last_name',
    'payments.id as pay_id','payments.created_at as created_at'
)

->where('users.id','=',$id)
;
$return =$return->where('users.branch_id','=',Auth::user()->branch_id)
    
->paginate(10);
return  $return; 
}

     public function getPayment(){
        if(!empty($this->amount) )
        {
             return $this->amount;
        }
        else{
            return "";
        }
       
    }

    
}


