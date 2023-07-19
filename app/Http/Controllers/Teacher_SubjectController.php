<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Teacher_Subject;
use App\Models\User;
use App\Models\Subject;
use App\Models\DepartmentModel;
class Teacher_SubjectController extends Controller
{
    public function list(Request $request){
        $data['getRecord']=Teacher_Subject::getRecord();
        return view('admin.assign_teacher.list',$data);
    }
    public function add(Request $request)
    {    $data['getDepartment']=DepartmentModel::getDepartment();
        $data['getTeacher']=User::getTeacher();
        $data['getSubject']=Subject::getSubject();
        return view('admin.assign_teacher.add',$data);
    }
    public function insert(Request $request){
if(!empty($request->subject_id)){
  foreach ($request->subject_id as $subject_id) {
    $getAlreadyFirst=Teacher_Subject::getAlreadyFirst($request->teacher_id,$subject_id);
    if(!empty($getAlreadyFirst))
    {
        $getAlreadyFirst->status=$request->status;
        $getAlreadyFirst->save();
    }
    else{
        $save =new Teacher_Subject;
        $save->subject_id=$subject_id;
        $save->status=$request->status;
        $save->teacher_id=$request->teacher_id;
        $save->created_by=Auth::user()->id;
        $save->branch_id=Auth::user()->branch_id;
        $save->save();
    }
    

   
  }
  return redirect('admin/assign_teacher/list')
  ->with('success',
  'Subject Successfully assigned to teacher');
}
else{
 return redirect()
 ->back()
 ->with('error','An error occurred, try again');
}
    }
public function edit($id){
    $getRecord=Teacher_Subject::getSingle($id);
    if(!empty($getRecord)){
        $data['getRecord']=$getRecord;
        $data['getAssignedSubjectId'] =Teacher_Subject::getAssignedSubjectId($getRecord->teacher_id);
        $data['getTeacher']=User::getTeacher();
        $data['getSubject']=Subject::getSubject();
        return view('admin.assign_teacher.edit',$data);
    }else{
        abort(404);
    }
    
}
public function update(Request $request){
    Teacher_Subject::deleteSubject($request->teacher_id);
    if(!empty($request->subject_id)){
        foreach ($request->subject_id as $subject_id) {
          $getAlreadyFirst=Teacher_Subject::getAlreadyFirst($request->teacher_id,$subject_id);
          if(!empty($getAlreadyFirst))
          {
              $getAlreadyFirst->status=$request->status;
              $getAlreadyFirst->save();
          }
          else{
              $save =new Teacher_Subject;
              $save->subject_id=$subject_id;
              $save->status=$request->status;
              $save->teacher_id=$request->teacher_id;
              $save->created_by=Auth::user()->id;
              $save->save();
          }
          
      
         
        }
        
}
return redirect('admin/assign_teacher/list')
        ->with('success',
        'Subject Successfully assigned to teacher');
}
public function delete($id){
        $save=Teacher_Subject::getSingle($id);
        $save->is_deleted=1;
        $save->save();
        return redirect()
        ->back()
    ->with('success',"Record successfully Deleted");
    }
    public function edit_single($id)
    {
        $getRecord=Teacher_Subject::getSingle($id);
        if(!empty($getRecord)){
            $data['getRecord']=$getRecord;
            $data['getTeacher']=User::getTeacher();
            $data['getSubject']=Subject::getSubject();
            return view('admin.assign_teacher.edit_single',$data);
        }else{
            abort(404);
        }  
    }
    public function update_single($id,Request $request){
            
              $getAlreadyFirst=Teacher_Subject::getAlreadyFirst($request->teacher_id,$request->subject_id);
              if(!empty($getAlreadyFirst))
              {
                  $getAlreadyFirst->status=$request->status;
                  $getAlreadyFirst->save();
                  return redirect('admin/assign_teacher/list')
                  ->with('success',
                  'Subject Successfully Updated to teacher');
              }
              else{
                  $save =Teacher_Subject::getSingle($id);
                  $save->subject_id=$request->subject_id;
                  $save->status=$request->status;
                  $save->save();
                  return redirect('admin/assign_teacher/list')
                  ->with('success',
                  'Subject Successfully assigned to teacher');
              }
     
    }
}

