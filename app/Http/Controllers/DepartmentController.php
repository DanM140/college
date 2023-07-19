<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\DepartmentModel;
use App\Models\BranchModel;
class DepartmentController extends Controller
{
    public function list()
    { $data['getRecord']=DepartmentModel::getRecord();
        return view('admin.department.list',$data);
    }
    
    public function add()
    {
        return view('admin.department.add');
    }
    public function insert(Request $request)
    { 
           $save=new DepartmentModel;
           $save->name=trim($request->name);
           $save->head=trim($request->head);
           $save->status=trim($request->status);
           $save->created_by=Auth::user()->id;
           $save->branch_id=Auth::user()->branch_id;
           $save->save();
           return redirect('admin/department/list')->with('success','Department successfully added');

    }
    public function edit($id){
        $data['getRecord']=DepartmentModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['getBranch']=BranchModel::getBranch();
            return view('admin.department.edit',$data);
        }
        
    }
    public function update($id, Request $request)
    {
        $save=DepartmentModel::getSingle($id);
        $save->name=trim($request->name);
           $save->head=trim($request->head);
           $save->status=trim($request->status);
           $save->branch_id=trim($request->branch_id);
           $save->save();
           return redirect('admin/department/list')->with('success','Department successfully added');
    }
    public function delete($id)
    {
        $save=DepartmentModel::getSingle($id);
        $save->is_deleted=trim($request->is_deleted);
           $save->save();
           return redirect()
           ->back()
       ->with('success',"Department successfully Deleted");
    }
}
