<?php

namespace App\Http\Controllers\branchadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\branchadmin\Br_Department;
use App\Models\BranchModel;

class Br_DepartmentController  extends Controller
{
    public function list()
    { $data['getRecord']=Br_Department::getRecord();
        return view('branchadmin.department.list',$data);
    }
    
    public function add()
    {
        return view('branchadmin.department.add');
    }
    public function insert(Request $request)
    { 
           $save=new Br_Department;
           $save->name=trim($request->name);
           $save->head=trim($request->head);
           $save->status=trim($request->status);
           $save->created_by=Auth::user()->id;
           $save->branch_id=Auth::user()->branch_id;
           $save->save();
           return redirect('branchadmin/department/list')->with('success','Department successfully added');

    }
    public function edit($id){
        $data['getRecord']=Br_Department::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['getBranch']=BranchModel::getBranch();
            return view('branchadmin.department.edit',$data);
        }
        
    }
    public function update($id, Request $request)
    {
        $save=Br_Department::getSingle($id);
        $save->name=trim($request->name);
           $save->head=trim($request->head);
           $save->status=trim($request->status);
           $save->branch_id=trim($request->branch_id);
           $save->save();
           return redirect('branchadmin/department/list')->with('success','Department successfully updated');
    }
    public function delete($id)
    {
        $save=Br_Department::getSingle($id);
        $save->is_deleted=1;
           $save->save();
           return redirect()
           ->back()
       ->with('success',"Department successfully Deleted");
    }
}

