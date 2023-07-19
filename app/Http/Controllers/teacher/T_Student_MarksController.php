<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\teacher\Student_Marks;
use App\Models\teacher\Term;
use App\Models\teacher\Student_Class_Subject;

class T_Student_MarksController   extends Controller
{
    public function marks_list(Request $request){
        $data['getRecord']=Student_Marks::getRecord();
        return view('teacher.marks_list',$data);
    }
    public function add_marks(Request $request)
    {   $data['getTerm']=Term::getFee();
        return view('teacher.marks',$data);    
    }
    public function insert(Request $request){
      
        $student_id=$request->student_id;
        $class_id=$request->class_id;
        $subject_id=$request->subject_id;
        
    $getAlreadyFirst=Student_Marks::getAlreadyFirst($class_id,$subject_id,$student_id);
    if(!empty($getAlreadyFirst))
    {
        $getAlreadyFirst->save();
        return redirect('teacher/subject')
  ->with('success',
  'Marks already inserted');
    }
    else{
        $save =new Student_Marks;
        $save->subject_id=$subject_id;
        $save->class_id=$class_id;
        $save->marks=$request->marks;
        $save->term=$request->term;
        $save->grade=$request->grade;
        $save->student_id=$student_id;
        $save->branch_id=Auth::user()->branch_id;
        $save->save();
        return redirect('teacher/subject')
  ->with('success',
  'Marks Successfully inserted');
    }
    }

    public function edit($id)
    {
        $data['getRecord']=Student_Marks::getSingle($id);
        if(!empty($data['getRecord']))
        { $data['getTerm']=Term::getFee();
            return view('teacher.edit_marks',$data);
        }
        else
        {
          abort(404);
        }
    }
    public function update($id,Request $request)
    {
        $save=Student_Marks::getSingle($id);
        $save->marks=trim($request->marks);
        $save->grade=trim($request->grade);
        $save->term=$request->term;
        $save->save();
        return redirect('teacher/marks_list')->with('success','Result updated successfully Updated');

    }
    public function delete($id){
        $save=Student_Marks::getSingle($id);
        $save->is_deleted=1;
        $save->save();
        return redirect()
        ->back()
    ->with('success',"Result successfully Deleted");
    }
    
    
}
