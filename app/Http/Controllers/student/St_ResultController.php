<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student\Student_Marks;
use App\Models\student\Term;
class St_ResultController extends Controller
{
    public function list(Request $request){
        $data['getTerm']=Term::getFee();
        $data['getRecord']=Student_Marks::getRecord();
        return view('student.list',$data);
    }
}
