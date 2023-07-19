<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\student\Term;
class St_ReportController extends Controller
{

    public function report(){
        $data['getRecord']=User::getParticularStudent();
    return view('student.report',$data);   
    }
    public function edit($id)
    { 
        $data['getRecord']=User::getSingle($id);
       
        if(!empty($data['getRecord']))
        {   $data['getTerm']=Term::getFee();
            return view('student.edit_report',$data);
        }
        else{
            abort(404);
        }
            
    }

   
    public function update($id,Request $request)
    {
        
$student = User::getSingle($id);
$student->term=trim($request->term);
$fee = Term::getCurrentFee($request->term) ;
$student->fees=$fee['fees'];
$student->save();
return redirect('student/report')
->with('success','You have successfully registered for current term');
    }
}
