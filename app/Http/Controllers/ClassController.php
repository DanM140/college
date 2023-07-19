<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\ClassModel;
use App\Models\DepartmentModel;
class ClassController extends Controller
{
    public function list(){
        $data['getRecord']=ClassModel::getRecord();
        $data['getDepartment']=DepartmentModel::getDepartment();
        return view('admin.class.list',$data);
    }
    public function add(){
        $data['getDepartment']=DepartmentModel::getDepartment();
        return view('admin.class.add',$data);  
    }
    public function insert(Request $request){
    $save=new ClassModel;
    $save->name=$request->name;
    $save->status=$request->status;
    $save->department_id=$request->department_id;
    $save->created_by=Auth::user()->id;
    $save->branch_id=Auth::user()->branch_id;
    $save->save();

    return redirect('admin/class/list')
    ->with('success',"Class successfully Created");
    }
    public function edit($id){
        $data['getRecord']=ClassModel::getSingle($id);
        $data['getDepartment']=DepartmentModel::getDepartment();
        if(!empty($data['getRecord'])){
            return view('admin.class.edit',$data); 
        }else{
            abort(404);
        }
       
    }
    public function update($id,Request $request){
        $save=ClassModel::getSingle($id);
        $save->name=$request->name;
        $save->status=$request->status;
        $save->department_id=$request->department_id;
        $save->save();
        return redirect('admin/class/list')
    ->with('success',"Class successfully Updated");
    }
    public function delete($id){
        $save=ClassModel::getSingle($id);
        $save->is_deleted=1;
        $save->save();
        return redirect()
        ->back()
    ->with('success',"Class successfully Deleted");
    }
}
