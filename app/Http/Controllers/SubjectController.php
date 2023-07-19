<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\ClassModel;
use App\Models\DepartmentModel;
use Auth;
class SubjectController extends Controller
{
    public function list(){
        $data['getRecord']=Subject::getRecord();
        return view('admin.subject.list',$data);
    }
    public function add(){
       
        //$data['getClass']=ClassModel::getClass();
        $data['getDepartment']=DepartmentModel::getDepartment();
        return view('admin.subject.add',$data); 
    }
    public function fetchClass(Request $request)
    {
        $data['states'] = ClassModel::where("department_id", $request->department_id)
                                ->get(["name", "id"]);
        return response()->json($data);
    }
    public function insert(Request $request){
   $save = new Subject;
   $save->name=trim($request->name);
   $save->type=trim($request->type);
   $save->department_id=trim($request->department_id);
   $save->status=trim($request->status);
   $save->created_by=Auth::user()->id;
   $save->branch_id=Auth::user()->branch_id;
   $save->save();
   return redirect('admin/subject/list')->with('success','Subject Successfully Added');
    }
    public function edit($id){
        $data['getRecord']=Subject::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['getClass']=ClassModel::getDepartment();
            return view('admin.subject.edit',$data); 
        }else{
            abort(404);
        }
    }
    public function update($id,Request $request){
        $save=Subject::getSingle($id);
    $save->name=trim($request->name);
   $save->type=trim($request->type);
   $save->department_id=trim($request->department_id);
   $save->status=trim($request->status);
        $save->save();
        return redirect('admin/subject/list')
    ->with('success',"Subject successfully Updated"); 
    }
    public function delete($id){
        $save=Subject::getSingle($id);
        $save->is_deleted=1;
        $save->save();
        return redirect()
        ->back()
    ->with('success',"Subject successfully Deleted");
    }
}
