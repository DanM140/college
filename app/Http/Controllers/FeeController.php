<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Fee;
use App\Models\Level;
class FeeController extends Controller
{
    public function list()
    {
        $data['getRecord']=Fee::getRecord();
        return view('admin.fee.list',$data);
    }
    public function add()
    {
        
        return view('admin.fee.add');
    }
    public function insert(Request $request){
    
        $save = new Fee;
        $save->name=trim($request->name);
        $save->level_name=trim($request->level_name);
        $save->term=trim($request->term);
        $save->level=trim($request->level);
        $save->status=trim($request->status);
        $save->fees=trim($request->fees);
    
       
        $save->save();
        return redirect('admin/fee/list')->with('success','Fee successfully added');
        
    }
    public function edit($id)
    {
        $data['getRecord']=Fee::getSingle($id);
        if(!empty($data['getRecord']))
        {
            return view('admin.fee.edit',$data);
        }
        else
        {
          abort(404);
        }
    }
    public function update($id,Request $request)
    {
        $save=Fee::getSingle($id);
        $save->term=trim($request->term);
        $save->fees=trim($request->fees);
        $save->level_name=trim($request->level_name);
        $save->status=trim($request->status);
        $save->save();
        return redirect('admin/fee/list')->with('success','Fee successfully Updated');

    }
    public function delete($id){
        $save=Fee::getSingle($id);
        $save->is_deleted=1;
        $save->save();
        return redirect()
        ->back()
    ->with('success',"Fee successfully Deleted");
    }
   
}

