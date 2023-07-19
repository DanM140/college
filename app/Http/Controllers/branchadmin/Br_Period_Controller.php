<?php

namespace App\Http\Controllers\branchadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\branchadmin\Br_Period;
class Br_Period_Controller extends Controller
{
    public function list()
    { $data['getRecord']=Br_Period::getRecord();
        return view('branchadmin.period.list',$data);
    }
    
    public function add()
    {
        return view('branchadmin.period.add');
    }
    public function insert(Request $request)
    { 
           $save=new Br_Period;
           $save->name=trim($request->name);
           $save->created_by=Auth::user()->id;
           $save->branch_id=Auth::user()->branch_id;
           $save->save();
           return redirect('branchadmin/period/list')->with('success','Period successfully added');

    }
    public function edit($id){
        $data['getRecord']=Br_Period::getSingle($id);
        if(!empty($data['getRecord']))
        {
           
            return view('branchadmin.period.edit',$data);
        }
        
    }
    public function update($id, Request $request)
    {
        $save=Br_Period::getSingle($id);
        $save->name=trim($request->name);
           $save->branch_id=Auth::user()->branch_id;
           $save->save();
           return redirect('branchadmin/period/list')->with('success','Period successfully updated');
    }
    public function delete($id)
    {
        $save=Br_Period::getSingle($id);
        $save->is_deleted=1;
           $save->save();
           return redirect()
           ->back()
       ->with('success',"Period successfully Deleted");
    }
}
