<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\BranchModel;
class BranchController extends Controller
{
    public function list()
    {
        $data['getRecord']=BranchModel::getRecord();
        return view('admin.branch.list',$data);
    }
    public function add()
    {
        return view('admin.branch.add');
    }
    public function insert(Request $request){
    
        $save = new BranchModel;
        $save->name=trim($request->name);
        $save->code=trim($request->code);
        $save->head=trim($request->head);
        $save->location=trim($request->location);
        $save->status=trim($request->status);
        $save->created_by=Auth::user()->id;
        $save->save();
        return redirect('admin/branch/list')->with('success','Branch successfully added');
        
    }
    public function edit($id)
    {
        $data['getRecord']=BranchModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            return view('admin.branch.edit',$data);
        }
        else
        {
          abort(404);
        }
    }
    public function update($id,Request $request)
    {
        $save=BranchModel::getSingle($id);
        $save->name=trim($request->name);
        $save->code=trim($request->code);
        $save->head=trim($request->head);
        $save->location=trim($request->location);
        $save->status=trim($request->status);
        $save->created_by=Auth::user()->id;
        $save->save();
        return redirect('admin/branch/list')->with('success','Branch successfully Updated');

    }
    public function delete($id){
        $save=BranchModel::getSingle($id);
        $save->is_deleted=1;
        $save->save();
        return redirect()
        ->back()
    ->with('success',"Branch successfully Deleted");
    }
   
}
