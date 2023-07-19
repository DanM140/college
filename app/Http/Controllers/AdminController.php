<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BranchModel;
use Hash;
class AdminController extends Controller
{ 
    public function list(){
        $data['getRecord']=User::getAdmin();
    return view('admin.admin.list',$data);   
}
public function add(){
    $data['getBranch']=BranchModel::getBranch();
    return view('admin.admin.add',$data);  
}
  public function insert(Request $request){
    $user = new User;
    request()->validate([
'email'=>'required|email|unique:users'
    ]);
    $user->name=trim($request->name);
    $user->email=trim($request->email);
    $user->branch_id=trim($request->branch_id);
    $user->password=Hash::make($request->password);
    $user->user_type=4;
    $user->save();
    return redirect('admin/admin/list')
    ->with('success',"Admin successfully created");
  } 
  public function edit($id){
    $data['getRecord']=User::getSingle($id);
    if(!empty($data['getRecord'])){
        return view('admin.admin.edit',$data);
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
    return redirect('admin/admin/list')
    ->with('success',"Admin successfully Updated");
}
public function delete($id){
    $user = User::getSingle($id);
    $user->is_deleted=1; 
    $user->save();
    return redirect('admin/admin/list')
    ->with('success',"Admin successfully deleted");
}
}
