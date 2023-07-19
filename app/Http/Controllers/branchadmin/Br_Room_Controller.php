<?php

namespace App\Http\Controllers\branchadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\branchadmin\Br_Room;
class Br_Room_Controller  extends Controller
{
    public function list()
    { $data['getRecord']=Br_Room::getRecord();
        return view('branchadmin.room.list',$data);
    }
    
    public function add()
    {
        return view('branchadmin.room.add');
    }
    public function insert(Request $request)
    { 
           $save=new Br_Room;
           $save->name=trim($request->name);
           $save->capacity=trim($request->capacity);
           $save->status=trim($request->status);
           $save->created_by=Auth::user()->id;
           $save->branch_id=Auth::user()->branch_id;
           $save->save();
           return redirect('branchadmin/room/list')->with('success','Room successfully added');

    }
    public function edit($id){
        $data['getRecord']=Br_Room::getSingle($id);
        if(!empty($data['getRecord']))
        {
           
            return view('branchadmin.room.edit',$data);
        }
        
    }
    public function update($id, Request $request)
    {
        $save=Br_Room::getSingle($id);
        $save->name=trim($request->name);
           $save->capacity=trim($request->capacity);
           $save->status=trim($request->status);
           $save->branch_id=Auth::user()->branch_id;
           $save->save();
           return redirect('branchadmin/room/list')->with('success','Room successfully updated');
    }
    public function delete($id)
    {
        $save=Br_Room::getSingle($id);
        $save->is_deleted=1;
           $save->save();
           return redirect()
           ->back()
       ->with('success',"Room successfully Deleted");
    }
}