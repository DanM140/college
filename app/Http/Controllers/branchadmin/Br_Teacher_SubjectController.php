<?php

namespace App\Http\Controllers\branchadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\branchadmin\Br_Teacher_Subject;
use App\Models\User;
use App\Models\branchadmin\Br_Subject;
use App\Models\branchadmin\Br_Department;
class Br_Teacher_SubjectController  extends Controller
{
    public function list(Request $request){
        $data['getRecord']=Br_Teacher_Subject::getRecord();
        return view('branchadmin.assign_teacher.list',$data);
    }
    public function add(Request $request)
    {    $data['getDepartment']=Br_Department::getDepartment();
        $data['getTeacher']=User::getTeacher_Branch();
        $data['getSubject']=Br_Subject::getSubject();
        return view('branchadmin.assign_teacher.add',$data);
    }
    public function insert(Request $request){
if(!empty($request->subject_id)){
  foreach ($request->subject_id as $subject_id) {
    $getAlreadyFirst=Br_Teacher_Subject::getAlreadyFirst($request->teacher_id,$subject_id,$request->class_id);
    if(!empty($getAlreadyFirst))
    {
        $getAlreadyFirst->status=$request->status;
        $getAlreadyFirst->save();
    }
    else{
        $save =new Br_Teacher_Subject;
        $save->subject_id=$subject_id;
        $save->department_id=$request->department_id;
        $save->class_id=$request->class_id;
        $save->status=$request->status;
        $save->teacher_id=$request->teacher_id;
        
        $save->created_by=Auth::user()->id;
        $save->branch_id=Auth::user()->branch_id;
        $save->term=Auth::user()->term;
        $save->save();
    }
    

   
  }
  return redirect('branchadmin/assign_teacher/list')
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
    $getRecord=Br_Teacher_Subject::getSingle($id);
    if(!empty($getRecord)){
        $data['getRecord']=$getRecord;
        $data['getAssignedSubjectId'] =Br_Teacher_Subject::getAssignedSubjectId($getRecord->teacher_id);
        $data['getTeacher']=User::getTeacher();
        $data['getDepartment']=Br_Department::getDepartment();
        $data['getSubject']=Br_Subject::getSubject();
        return view('branchadmin.assign_teacher.edit',$data);
    }else{
        abort(404);
    }
    
}
public function update(Request $request){
    Br_Teacher_Subject::deleteSubject($request->teacher_id);
    if(!empty($request->subject_id)){
        foreach ($request->subject_id as $subject_id) {
        
          $getAlreadyFirst=Br_Teacher_Subject::getAlreadyFirst($request->teacher_id,$subject_id,$request->class_id);
          if(!empty($getAlreadyFirst))
          {
              $getAlreadyFirst->status=$request->status;
              $getAlreadyFirst->save();
          }
          else{
              $save =new Br_Teacher_Subject;
              $save->subject_id=$subject_id;
              $save->department_id=$request->department_id;
              $save->class_id=$request->class_id;
              $save->status=$request->status;
              $save->teacher_id=$request->teacher_id;
              $save->created_by=Auth::user()->id;
              $save->save();
          }
          
      
         
        }
        
}
return redirect('branchadmin/assign_teacher/list')
        ->with('success',
        'Subject Successfully assigned to teacher');
}
public function delete($id){
        $save=Br_Teacher_Subject::getSingle($id);
        $save->is_deleted=1;
        $save->save();
        return redirect()
        ->back()
    ->with('success',"Record successfully Deleted");
    }
    public function edit_single($id)
    {
        $getRecord=Br_Teacher_Subject::getSingle($id);
        if(!empty($getRecord)){
            $data['getRecord']=$getRecord;
            $data['getTeacher']=User::getTeacher();
            $data['getSubject']=Br_Subject::getSubject();
            $data['getDepartment']=Br_Department::getDepartment();
            return view('branchadmin.assign_teacher.edit_single',$data);
        }else{
            abort(404);
        }  
    }
    public function update_single($id,Request $request){
            
              $getAlreadyFirst=Br_Teacher_Subject::getAlreadyFirst($request->teacher_id,$request->subject_id,$request->class_id);
              if(!empty($getAlreadyFirst))
              {
                  $getAlreadyFirst->status=$request->status;
                  $getAlreadyFirst->save();
                  return redirect('branchadmin/assign_teacher/list')
                  ->with('success',
                  'Subject Successfully Updated to teacher');
              }
              else{
                  $save =Br_Teacher_Subject::getSingle($id);
                  $save->subject_id=$request->subject_id;
                  $save->department_id=$request->department_id;
                  $save->class_id=$request->class_id;
                  $save->status=$request->status;
                  $save->save();
                  return redirect('branchadmin/assign_teacher/list')
                  ->with('success',
                  'Subject Successfully assigned to teacher');
              }
     
    }
}


