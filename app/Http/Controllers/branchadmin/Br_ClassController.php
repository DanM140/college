<?php

namespace App\Http\Controllers\branchadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\branchadmin\Br_Class;
use App\Models\branchadmin\Br_Department;
class Br_ClassController extends Controller
{
    public function list(){
        $data['getRecord']=Br_Class::getRecord();
        $data['getDepartment']=Br_Department::getDepartment();
        return view('branchadmin.class.list',$data);
    }
    public function add(){
        $data['getDepartment']=Br_Department::getDepartment();
        return view('branchadmin.class.add',$data);  
    }
    public function insert(Request $request){
    $save=new Br_Class;
    $save->name=$request->name;
    $save->status=$request->status;
    $save->department_id=$request->department_id;
    $save->branch_id=Auth::user()->branch_id;
    $save->created_by=Auth::user()->id;
    $save->save();

    return redirect('branchadmin/class/list')
    ->with('success',"Class successfully Created");
    }
    public function edit($id){
        $data['getRecord']=Br_Class::getSingle($id);
        $data['getDepartment']=Br_Department::getDepartment();
        if(!empty($data['getRecord'])){
            return view('branchadmin.class.edit',$data); 
        }else{
            abort(404);
        }
       
    }
    public function update($id,Request $request){
        $save=Br_Class::getSingle($id);
        $save->name=$request->name;
        $save->status=$request->status;
        $save->department_id=$request->department_id;
        $save->save();
        return redirect('branchadmin/class/list')
    ->with('success',"Class successfully Updated");
    }
    public function delete($id){
        $save=Br_Class::getSingle($id);
        $save->is_deleted=1;
        $save->save();
        return redirect()
        ->back()
    ->with('success',"Class successfully Deleted");
    }
}
