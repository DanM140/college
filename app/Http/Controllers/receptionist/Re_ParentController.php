<?php

namespace App\Http\Controllers\receptionist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ParentModel;
use App\Models\DepartmentModel;
use App\Models\Level;
use App\Models\Fee;
use Hash;
use Auth;
use Str;
class Re_ParentController extends Controller
{
public function list(){
        $data['getRecord']=User::getStudent();
    return view('receptionist.parent.list',$data);   
}
public function parent(){
    $data['getRecord']=ParentModel::getRecord();
return view('receptionist.parent.parent',$data);   
}
public function add($id){

        $data['getRecord']=User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            return view('receptionist.parent.add',$data);
        }
        else
        {
          abort(404);
        } 
}
   
    
    
public function insert(Request $request){
        
    $getAlreadyFirst=ParentModel::getAlreadyFirst($request->student_id,$request->gender);
    if(!empty($getAlreadyFirst))
    {
        return redirect('receptionist/parent/list')
->with('success','Parent of that gender exist ');
    }
    else{
$student = new ParentModel ;
$student->first_name=trim($request->first_name);
$student->last_name=trim($request->last_name);
$student->occupation=trim($request->occupation);
$student->national_id=trim($request->national_id);
$student->mobile_number=trim($request->mobile_number);
$student->location=trim($request->location);
$student->student_id=trim($request->student_id);
$student->gender=trim($request->gender);

$student->user_type=6;
$student->save();
return redirect('receptionist/parent/list')
->with('success','Parent successfully created');
    }
}

public function edit($id)
    { 
        $data['getRecord']=ParentModel::getSingle($id);
       
        if(!empty($data['getRecord']))
        {
            
            return view('receptionist.parent.edit',$data);
        }
        else{
            abort(404);
        }
            
    }

   
    public function update($id,Request $request)
    {
        $getAlreadyFirst=ParentModel::getAlreadyFirst($request->student_id,$request->gender);
    
    $student = ParentModel::getSingle($id);
    $student->first_name=trim($request->first_name);
    $student->last_name=trim($request->last_name);
    $student->occupation=trim($request->occupation);
    $student->national_id=trim($request->national_id);
    $student->mobile_number=trim($request->mobile_number);
    $student->location=trim($request->location);
    $sstudent->branch_id=Auth::user()->branch_id;
    if(!empty($getAlreadyFirst))
    {
        $student->gender=trim($request->gender);
    }
    $student->user_type=6;
    $student->save();
    return redirect('receptionist/parent/list')
    ->with('success','Parent successfully updated');
         
    }
    public function delete($id){
        $save=ParentModel::getSingle($id);
        $save->is_deleted=1;
        $save->save();
        return redirect()
        ->back()
    ->with('success',"Parent successfully Deleted");
    }
}

