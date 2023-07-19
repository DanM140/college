<?php

namespace App\Http\Controllers\branchadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BranchModel;
use Hash;
use Auth;
class Br_TeacherController  extends Controller
{ 
    public function list(){
        $data['getRecord']=User::getTeacher_Branch();
    return view('branchadmin.teacher.list',$data);   
}
public function add(){
    $data['getBranch']=BranchModel::getBranch();
    return view('branchadmin.teacher.add',$data);  
}
  public function insert(Request $request){
    $user = new User;
    request()->validate([
'email'=>'required|email|unique:users'
    ]);
    $user->name=trim($request->name);
    $user->email=trim($request->email);
    $user->branch_id=Auth::user()->branch_id;
    $user->password=Hash::make($request->password);
    
    $user->user_type=2;
    $user->save();
    return redirect('branchadmin/teacher/list')
    ->with('success',"Teacher successfully created");
  } 
  public function edit($id){
    $data['getRecord']=User::getSingle($id);
    if(!empty($data['getRecord'])){
        return view('branchadmin.teacher.edit',$data);
    }else{
        abort(404);
    }
     
}
public function update($id,Request $request){
    request()->validate([
        'email'=>'required|email|unique:users,email,'.$id
            ]);
    $user = User::getSingle($id);
    $user->name=trim($request->name);
    $user->email=trim($request->email);
    if(!empty($request->password)){
        $user->password=Hash::make($request->password);
    }
    $user->save();
    return redirect('branchadmin/teacher/list')
    ->with('success',"Teacher successfully Updated");
}
public function delete($id){
    $user = User::getSingle($id);
    $user->is_deleted=1; 
    $user->save();
    return redirect('branchadmin/teacher/list')
    ->with('success',"Teacher successfully deleted");
}
}

