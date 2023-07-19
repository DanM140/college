<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\student\Payment;
use App\Models\User;
use App\Models\student\Term;
use Illuminate\Support\Facades\DB;

class St_PaymentController  extends Controller
{
    public function pay_aggregate(){
       $data['getTerm']=Term::getFee();
        $data['getRecord_Total'] = DB::table('payments')
        ->join('users', 'users.id', '=', 'payments.student_id','left')
      
        ->select('payments.*','users.*', 'users.name as first_name',
        DB::raw('sum(amount) as fee_paid'),
        DB::raw('users.fees-sum(amount) as balance')
        )
        ->where('payments.student_id','=',Auth::user()->id)
      
        ->groupBy('student_id')
        ->get();
        $data['getRecord'] = Payment::getRecord();
    
        return view('student.payment.pay_aggregate',$data);
    } 
   
     
}


