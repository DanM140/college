<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\student\Student_Class_Subject;
use App\Models\student\ClassModel;
use App\Models\student\Subject;
use App\Models\student\Term;
class Student_Class_Subject_Controller  extends Controller
{
    public function list(Request $request){
        $data['getRecord']=Student_Class_Subject::getRecord();
        $data['getTerm']=Term::getFee();
        return view('student.assign_subject.list',$data);
    }
    public function add(Request $request)
    {   
        $data['getClass']=ClassModel::getClass();
        $data['getSubject']=Subject::getSubject();
        return view('student.assign_subject.add',$data);
    }
    public function insert(Request $request){
if(!empty($request->subject_id)){

  foreach ($request->subject_id as $subject_id) {
    $getAlreadyFirst=Student_Class_Subject::getAlreadyFirst($subject_id);
    if(!empty($getAlreadyFirst))
    {
        $getAlreadyFirst->save();
    }
    else{
        $save =new Student_Class_Subject;
        $save->subject_id=$subject_id;
        $save->class_id=Auth::user()->class_id;
        $save->student_id=Auth::user()->id;
        $save->save();
    }
  }
  return redirect('student/assign_subject/list')
  ->with('success',
  'Subject Successfully assigned to class');
}
else{
 return redirect()
 ->back()
 ->with('error','An error occurred, try again');
}
    }
public function edit($id){
    $getRecord=Class_Subject::getSingle($id);
    if(!empty($getRecord)){
        $data['getRecord']=$getRecord;
        $data['getAssignedSubjectId'] =Class_Subject::getAssignedSubjectId($getRecord->class_id);
        $data['getClass']=ClassModel::getClass();
        $data['getSubject']=Subject::getSubject();
        return view('admin.assign_subject.edit',$data);
    }else{
        abort(404);
    }
    
}
public function update(Request $request){
    Class_Subject::deleteSubject($request->class_id);
    if(!empty($request->subject_id)){
        foreach ($request->subject_id as $subject_id) {
          $getAlreadyFirst=Class_Subject::getAlreadyFirst($request->class_id,$subject_id);
          if(!empty($getAlreadyFirst))
          {
              $getAlreadyFirst->status=$request->status;
              $getAlreadyFirst->save();
          }
          else{
              $save =new Class_Subject;
              $save->subject_id=$subject_id;
              $save->status=$request->status;
              $save->class_id=$request->class_id;
              $save->created_by=Auth::user()->id;
              $save->save();
          }
}
        
}
return redirect('admin/assign_subject/list')
        ->with('success',
        'Subject Successfully assigned to class');
}
public function delete($id){
        $save=Class_Subject::getSingle($id);
        $save->is_deleted=1;
        $save->save();
        return redirect()
        ->back()
    ->with('success',"Record successfully Deleted");
    }
    public function edit_single($id)
    {
        $getRecord=Class_Subject::getSingle($id);
        if(!empty($getRecord)){
            $data['getRecord']=$getRecord;
            $data['getClass']=ClassModel::getClass();
            $data['getSubject']=Subject::getSubject();
            return view('admin.assign_subject.edit_single',$data);
        }else{
            abort(404);
        }  
    }
    public function update_single($id,Request $request){
            
              $getAlreadyFirst=Class_Subject::getAlreadyFirst($request->class_id,$request->subject_id);
              if(!empty($getAlreadyFirst))
              {
                  $getAlreadyFirst->status=$request->status;
                  $getAlreadyFirst->save();
                  return redirect('admin/assign_subject/list')
                  ->with('success',
                  'Subject Successfully Updated to class');
              }
              else{
                  $save =Class_Subject::getSingle($id);
                  $save->subject_id=$request->subject_id;
                  $save->status=$request->status;
                  $save->save();
                  return redirect('admin/assign_subject/list')
                  ->with('success',
                  'Subject Successfully assigned to class');
              }
     
    }
}

