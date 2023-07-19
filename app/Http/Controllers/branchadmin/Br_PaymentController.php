<?php

namespace App\Http\Controllers\branchadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\branchadmin\Br_Payment;
use App\Models\Student_Payment;
use App\Models\User;
use App\Models\Fee;
use Illuminate\Support\Facades\DB;

class Br_PaymentController  extends Controller
{

    public function list(){
        $data['getRecord']=User::getStudentPayment();
    return view('branchadmin.payment.list',$data);   
    }
    public function paymentlist(){
        $data['getTerm']=Fee::getFee();
        $data['getRecord']=Br_Payment::getRecord();
 
    return view('branchadmin.payment.paymentlist',$data);
    }
    public function totalpay($id)
    {
        $data['getRecord'] = DB::table('payments')
        ->join('users', 'users.id', '=', 'payments.student_id','left')
        ->join('fee', 'fee.id', '=', 'payments.fee_id','left')
        ->select('payments.*','users.*','fee.*', 'users.name as first_name',
        DB::raw('sum(amount)-fee.fees as count_row'),
        DB::raw('sum(amount) as fee_paid'),
        DB::raw('fee.fees-sum(amount) as balance')
        )
        ->where('users.branch_id','=',Auth::user()->branch_id)
        ->where('users.id','=',$id)
        ->groupBy('student_id')
        ->get();
        if(!empty($data['getRecord']))
        {
            return view('branchadmin.payment.totalpay',$data);
        }
        else
        {
          abort(404);
        }
    }
    public function pay_aggregate(){
        $data['getRecord'] = DB::table('payments')
            ->join('users', 'users.id', '=', 'payments.student_id','left')
           
            ->select('payments.*','users.*', 'users.name as first_name',
            DB::raw('sum(amount) as fee_paid'),
            DB::raw('users.fees-sum(amount) as balance')
            )
            ->where('users.branch_id','=',Auth::user()->branch_id)
            ->groupBy('student_id')
            ->get();
            
    return view('branchadmin.payment.pay_aggregate',$data);
    }
    public function add()
    {
        return view('branchadmin.payment.add');
    }
    public function payment(Request $request)
    {
        $id = $request->id;
        $term = $request->term;
    $data['getRecord']=User::getSingle($id);
    if(!empty($data['getRecord']))
    { 
        $data['getFee']=Fee::getFee();
        return view('branchadmin.payment.payment',$data);
    }
    else{
        abort(404);
    } 
    }
    public function save(Request $request){
       
                $id = $request->id;
            $term = $request->term;
        $save = new Br_Payment;
        $save->amount=trim($request->amount);
        $save->fee_id=trim($request->term);
        $save->student_id=trim($id);
        $save->created_by=Auth::user()->id;
        $save->branch_id=Auth::user()->branch_id;
        $save->save();
      
        return redirect('branchadmin/payment/list')->with('success','Payment successfully added');
        
    }
   
    public function mpesa(Request $request)
    {
        $id = $request->id;
        $term = $request->term;
    $data['getRecord']=User::getSingle($id);
    if(!empty($data['getRecord']))
    { 
        $data['getFee']=Fee::getFee();
        return view('branchadmin.payment.mpesa',$data);
    }
    else{
        abort(404);
    }   
    }
    public function mpesasave(Request $request){
        request()->validate([
            'code'=>'required|unique:payments',
            
                ]);
                $id = $request->id;
            $term = $request->term;
        $save = new Br_Payment;
        $save->code=trim($request->code);
        $save->amount=trim($request->amount);
        $save->fee_id=trim($request->term);
        $save->student_id=trim($id);
        $save->created_by=Auth::user()->id;
        $save->branch_id=Auth::user()->branch_id;
        $save->save();
      
        return redirect('branchadmin/payment/list')->with('success','Payment successfully added');
        
    }
    public function bank(Request $request)
    {
            $id = $request->id;
            $term = $request->term;
        $data['getRecord']=User::getSingle($id);
        if(!empty($data['getRecord']))
        { 
            $data['getFee']=Fee::getFee();
            return view('branchadmin.payment.bank',$data);
        }
        else{
            abort(404);
        }  
    }
    public function banksave(Request $request){
        request()->validate([
            'bankcode'=>'required|unique:payments',
            
                ]);
                $id = $request->id;
            $term = $request->term;
        $save = new Br_Payment;
        $save->bankcode=trim($request->bankcode);
        $save->amount=trim($request->amount);
        $save->fee_id=trim($request->term);
        $save->student_id=trim($id);
        $save->created_by=Auth::user()->id;
        $save->branch_id=Auth::user()->branch_id;
        $save->save();
      
        return redirect('branchadmin/payment/list')->with('success','Payment successfully added');
        
    }
    public function edit($id)
    {
        $data['getRecord']=Br_Payment::getSingle($id);
        if(!empty($data['getRecord']))
        {
            return view('branchadmin.payment.edit',$data);
        }
        else
        {
          abort(404);
        }
    }
  
    public function update($id,Request $request)
    {
        $save=Br_Payment::getSingle($id);
        $save->code=trim($request->code);
        $save->amount=trim($request->amount);
        $save->student_id=trim($request->student_id);
        $save->status=trim($request->status);
        $save->created_by=Auth::user()->id;
        $save->save();
        return redirect('branchadmin/payment/list')->with('success','Payment successfully Updated');

    }
    public function delete($id){
        $save=Br_Payment::getSingle($id);
        $save->is_deleted=1;
        $save->save();
        return redirect()
        ->back()
    ->with('success',"Payment successfully Deleted");
    }
   
}

