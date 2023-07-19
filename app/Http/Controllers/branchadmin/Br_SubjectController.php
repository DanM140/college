<?php

namespace App\Http\Controllers\branchadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\branchadmin\Br_Subject;
use App\Models\branchadmin\Br_Class;
use App\Models\branchadmin\Br_Fee;
use App\Models\branchadmin\Br_Department;
use Auth;
class Br_SubjectController extends Controller
{
    public function list(){
        $data['getRecord']=Br_Subject::getRecord();
        return view('branchadmin.subject.list',$data);
    }
    public function add(){
        $data['getTerm']=Br_Fee::getFee();
        $data['getDepartment']=Br_Department::getDepartment();
        return view('branchadmin.subject.add',$data); 
    }
    public function fetchClass_Subject(Request $request)
    {
        $data['states'] = Br_Class::where("department_id", $request->department_id)
                                ->get(["name", "id"]);
  
        return response()->json($data);
    }
    public function insert(Request $request){
   $save = new Br_Subject;
   $save->name=trim($request->name);
   $save->type=trim($request->type);
   $save->department_id=trim($request->department_id);
   $save->class_id=trim($request->class_id);
   $save->term=trim($request->term);
   $save->status=trim($request->status);
   $save->branch_id=Auth::user()->branch_id;
   $save->created_by=Auth::user()->id;
   $save->save();
   return redirect('branchadmin/subject/list')->with('success','Subject Successfully Added');
    }
    public function edit($id){
        $data['getRecord']=Br_Subject::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['getDepartment']=Br_Department::getDepartment();
            return view('branchadmin.subject.edit',$data); 
        }else{
            abort(404);
        }
    }
    public function update($id,Request $request){
        $save=Br_Subject::getSingle($id);
    $save->name=trim($request->name);
   $save->type=trim($request->type);
   $save->department_id=trim($request->department_id);
   $save->term=trim($request->term);
   $save->status=trim($request->status);
        $save->save();
        return redirect('branchadmin/subject/list')
    ->with('success',"Subject successfully Updated"); 
    }
    public function delete($id){
        $save=Br_Subject::getSingle($id);
        $save->is_deleted=1;
        $save->save();
        return redirect()
        ->back()
    ->with('success',"Subject successfully Deleted");
    }
}

