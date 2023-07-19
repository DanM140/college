<?php

namespace App\Http\Controllers\branchadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\branchadmin\Br_Class_Subject;
use App\Models\branchadmin\Br_Class;
use App\Models\branchadmin\Br_Subject;

class Br_Class_Subject_Controller extends Controller
{
    public function list(Request $request){
        $data['getRecord']=Br_Class_Subject::getRecord();
        return view('branchadmin.assign_subject.list',$data);
    }
    public function add(Request $request)
    {   
        $data['getClass']=Br_Class::getClass();
        $data['getSubject']=Br_Subject::getSubject();
        return view('branchadmin.assign_subject.add',$data);
    }
    public function insert(Request $request){
if(!empty($request->subject_id)){
  foreach ($request->subject_id as $subject_id) {
    $getAlreadyFirst=Br_Class_Subject::getAlreadyFirst($request->class_id,$subject_id);
    if(!empty($getAlreadyFirst))
    {
        $getAlreadyFirst->status=$request->status;
        $getAlreadyFirst->save();
    }
    else{
        $save =new Br_Class_Subject;
        $save->subject_id=$subject_id;
        $save->status=$request->status;
        $save->class_id=$request->class_id;
        $save->created_by=Auth::user()->id;
        $save->branch_id=Auth::user()->branch_id;
        $save->save();
    }
    

   
  }
  return redirect('branchadmin/assign_subject/list')
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
    $getRecord=Br_Class_Subject::getSingle($id);
    if(!empty($getRecord)){
        $data['getRecord']=$getRecord;
        $data['getAssignedSubjectId'] =Br_Class_Subject::getAssignedSubjectId($getRecord->class_id);
        $data['getClass']=Br_Class::getClass();
        $data['getSubject']=Br_Subject::getSubject();
        return view('branchadmin.assign_subject.edit',$data);
    }else{
        abort(404);
    }
    
}
public function update(Request $request){
    Br_Class_Subject::deleteSubject($request->class_id);
    if(!empty($request->subject_id)){
        foreach ($request->subject_id as $subject_id) {
          $getAlreadyFirst=Br_Class_Subject::getAlreadyFirst($request->class_id,$subject_id);
          if(!empty($getAlreadyFirst))
          {
              $getAlreadyFirst->status=$request->status;
              $getAlreadyFirst->save();
          }
          else{
              $save =new Br_Class_Subject;
              $save->subject_id=$subject_id;
              $save->status=$request->status;
              $save->class_id=$request->class_id;
              $save->created_by=Auth::user()->id;
              $save->save();
          }
          
      
         
        }
        
}
return redirect('branchadmin/assign_subject/list')
        ->with('success',
        'Subject Successfully assigned to class');
}
public function delete($id){
        $save=Br_Class_Subject::getSingle($id);
        $save->is_deleted=1;
        $save->save();
        return redirect()
        ->back()
    ->with('success',"Record successfully Deleted");
    }
    public function edit_single($id)
    {
        $getRecord=Br_Class_Subject::getSingle($id);
        if(!empty($getRecord)){
            $data['getRecord']=$getRecord;
            $data['getClass']=Br_Class::getClass();
            $data['getSubject']=Br_Subject::getSubject();
            return view('branchadmin.assign_subject.edit_single',$data);
        }else{
            abort(404);
        }  
    }
    public function update_single($id,Request $request){
            
              $getAlreadyFirst=Br_Class_Subject::getAlreadyFirst($request->class_id,$request->subject_id);
              if(!empty($getAlreadyFirst))
              {
                  $getAlreadyFirst->status=$request->status;
                  $getAlreadyFirst->save();
                  return redirect('branchadmin/assign_subject/list')
                  ->with('success',
                  'Subject Successfully Updated to class');
              }
              else{
                  $save =Br_Class_Subject::getSingle($id);
                  $save->subject_id=$request->subject_id;
                  $save->status=$request->status;
                  $save->save();
                  return redirect('branchadmin/assign_subject/list')
                  ->with('success',
                  'Subject Successfully assigned to class');
              }
     
    }
}

