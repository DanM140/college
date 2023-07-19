<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Level;
class LevelController extends Controller
{
    public function list()
    {
        $data['getRecord']=Level::getRecord();
        return view('admin.level.list',$data);
    }
    public function add()
    {
        return view('admin.level.add');
    }
    public function insert(Request $request){
    
        $save = new Level;
        $save->name=trim($request->name);
        $save->fee=trim($request->fee);
        $save->status=trim($request->status);
       
        $save->save();
        return redirect('admin/level/list')->with('success','Level successfully added');
        
    }
    public function edit($id)
    {
        $data['getRecord']=Level::getSingle($id);
        if(!empty($data['getRecord']))
        {
            return view('admin.level.edit',$data);
        }
        else
        {
          abort(404);
        }
    }
    public function update($id,Request $request)
    {
        $save=Level::getSingle($id);
        $save->name=trim($request->name);
        $save->fee=trim($request->fee);
        $save->status=trim($request->status);
        $save->save();
        return redirect('admin/level/list')->with('success','Level successfully Updated');

    }
    public function delete($id){
        $save=Level::getSingle($id);
        $save->is_deleted=1;
        $save->save();
        return redirect()
        ->back()
    ->with('success',"Level successfully Deleted");
    }
   
}
