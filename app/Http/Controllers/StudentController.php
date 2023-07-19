<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ClassModel;
use App\Models\DepartmentModel;
use App\Models\Level;
use App\Models\Fee;
use Hash;
use Auth;
use Str;
use App\Models\BranchModel;
class StudentController extends Controller
{
    public function list(){
        $data['getRecord']=User::getAllStudent();
    return view('admin.student.list',$data);   
    }
   
    public function add(){

        $data['getDepartment']=DepartmentModel::getDepartment();
        $data['getLevel']=Level::getLevel();
        $data['getBranch']=BranchModel::getBranchCode();
        $data['getRecord']=User::getStudent();
    return view('admin.student.add',$data);  
    }
   
    
    public function fetchClass(Request $request)
    {
        $data['states'] = ClassModel::where("department_id", $request->department_id)
                                ->get(["name", "id"]);
  
        return response()->json($data);
    }
    public function fetchFee(Request $request)
    {
        $data['fees'] = Fee::where("level", $request->level)
                                ->get(["fees", "id"]);
  
        return response()->json($data);
    }
public function insert(Request $request){
        
request()->validate([
            'email'=>'required|email|unique:users',
            'height'=>'max:10',
            'weight'=>'max:10',
            'blood_group'=>'max:10',
            'mobile_number'=>'max:15|min:10',
            'ethnic_group'=>'max:50',
            'religion'=>'max:50',
            'admission_number'=>'max:50',
            'roll_number'=>'max:50',
            'mobile_number'=>'max:15',
                ]);
$student = new User;
$student->name=trim($request->name);
$student->last_name=trim($request->last_name);
$student->admission_number=trim($request->admission_number);
$student->roll_number=trim($request->roll_number);
$student->class_id=trim($request->class_id);
$student->gender=trim($request->gender);
$student->department_id=trim($request->department_id);
$student->level_id=trim($request->level_id);
$student->fee=trim($request->fee);
$student->branch_id=Auth::user()->branch_id;
$student->gender=trim($request->gender);

if(!empty($request->date_of_birth))
{
    $student->date_of_birth=trim($request->date_of_birth);
}
if(!empty($request->file('profile_pic')))
{
    $ext=$request->file('profile_pic')
    ->getClientOriginalExtension();
    $file=$request->file('profile_pic');
    $randomStr=date('Ymdhis').Str::random(20);
    $filename= strtolower($randomStr).'.'.$ext;
    $file->move('upload/profile/',$filename);
    $student->profile_pic=$filename;
}
$student->ethnic_group=trim($request->ethnic_group);
$student->religion=trim($request->religion);
$student->mobile_number=trim($request->mobile_number);
if(!empty($request->admission_date))
{
    $student->admission_date=trim($request->admission_date);
}
$student->blood_group=trim($request->blood_group);
$student->height=trim($request->height);
$student->weight=trim($request->weight);
$student->status=trim($request->status);
$student->email=trim($request->email);
$student->password=Hash::make($request->password);
$student->user_type=3;
$student->save();
return redirect('admin/student/list')
->with('success','Student successfully created');
}

public function edit($id)
    { 
        $data['getRecord']=User::getSingle($id);
       
        if(!empty($data['getRecord']))
        {
            $data['getClass']=ClassModel::get();
            return view('admin.student.edit',$data);
        }
        else{
            abort(404);
        }
            
    }

   
    public function update($id,Request $request)
    {
        request()->validate([
            'email'=>'required|email|unique:users,email,'.$id,
            'height'=>'max:10',
            'weight'=>'max:10',
            'blood_group'=>'max:10',
            'mobile_number'=>'max:15|min:10',
            'ethnic_group'=>'max:50',
            'religion'=>'max:50',
            'admission_number'=>'max:50',
            'roll_number'=>'max:50',
            'mobile_number'=>'max:15',
                ]);
$student = User::getSingle($id);
$student->name=trim($request->name);
$student->last_name=trim($request->last_name);
$student->admission_number=trim($request->admission_number);
$student->roll_number=trim($request->roll_number);
$student->class_id=trim($request->class_id);
$student->gender=trim($request->gender);
$student->department_id=Auth::user()->department_id;
$student->branch_id=Auth::user()->branch_id;
$student->gender=trim($request->gender);

if(!empty($request->date_of_birth))
{
    $student->date_of_birth=trim($request->date_of_birth);
}
if(!empty($request->file('profile_pic')))
{
    if(!empty($student->getProfile()))
    {
  unlink('upload/profile/'.$student->profile_pic);
    }
    $ext=$request->file('profile_pic')
    ->getClientOriginalExtension();
    $file=$request->file('profile_pic');
    $randomStr=date('Ymdhis').Str::random(20);
    $filename= strtolower($randomStr).'.'.$ext;
    $file->move('upload/profile/',$filename);
    $student->profile_pic=$filename;
}
$student->ethnic_group=trim($request->ethnic_group);
$student->religion=trim($request->religion);
$student->mobile_number=trim($request->mobile_number);
if(!empty($request->admission_date))
{
    $student->admission_date=trim($request->admission_date);
}
$student->blood_group=trim($request->blood_group);
$student->height=trim($request->height);
$student->weight=trim($request->weight);
$student->status=trim($request->status);
$student->email=trim($request->email);
if(!empty($request->password))
{
    $student->password=Hash::make($request->password);
}
$student->save();
return redirect('admin/student/list')
->with('success','Student successfully updated');
    }
    public function delete($id){
        $save=User::getSingle($id);
        $save->is_deleted=1;
        $save->save();
        return redirect()
        ->back()
    ->with('success',"Subject successfully Deleted");
    }
}
