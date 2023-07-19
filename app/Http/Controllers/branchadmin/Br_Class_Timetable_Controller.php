<?php

namespace App\Http\Controllers\branchadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\branchadmin\Br_Class;
use App\Models\branchadmin\Br_Room;
use App\Models\branchadmin\Br_Day;
use App\Models\branchadmin\Br_Period;
use App\Models\branchadmin\Br_Teacher_Subject;
use App\Models\branchadmin\Br_Class_TimeTable;
class Br_Class_Timetable_Controller extends Controller
{
  public function roomsearch(Request $request)
  {
    $rooms = [];

        if($request->has('q')){
            $search = $request->q;
            $rooms =Br_Room::select("id", "name")
            		->where('name', 'LIKE', "%$search%")
            		->get();
        }
        return response()->json($rooms);
  }
public function list(){
    $data['getRecord']=Br_Class::getRecord();
    return view('branchadmin.class_timetable.list',$data);
}
public function timetable(){
  $data['getRecord']=Br_Class_TimeTable::getRecord();
  return view('branchadmin.class_timetable.timetable',$data);
}
public function edit(Request $request){
 
  $class_id = $request->class_id;
  $getRecord=Br_Class_TimeTable::editTimeTable($class_id);
    if(!empty($getRecord)){
        $data['getRecord']=$getRecord;
        $data['getPeriod']=Br_Period::getPeriod();
        $data['getRoom']=Br_Room::getRoom();
        $data['getDay']=Br_Day::getDay();
        return view('branchadmin.class_timetable.edit',$data);
    }else{
        abort(404);
    }
}
public function update(Request $request){
  
  $class_id = $request->class_id;

  $getAlreadyFirst=Br_Class_TimeTable::getAlreadyFirst($request->period_id,$request->room_id,$request->day);
  $getRecord=Br_Class_TimeTable::editTimeTable($class_id);
  if(!empty($getAlreadyFirst)){
    $data['getRecord']=Br_Class_TimeTable::editTimeTable($class_id);
    $data['getPeriod']=Br_Period::getPeriod();
    $data['getRoom']=Br_Room::getRoom();
    $data['getDay']=Br_Day::getDay();
    $data['success']="Room already allocated";
    return view('branchadmin.class_timetable.edit',$data); 
}
else{
 
    $save=Br_Class_TimeTable::getSingle($request->id);
    $save->teacher_id=$request->teacher_id;
    $save->class_id=$request->class_id;
    $save->subject_id=$request->subject_id;
    $save->room_id=$request->room_id;
    $save->branch_id=$request->branch_id;
    $save->period_id=$request->period_id;
    $save->day=$request->day;
    $save->save(); 
    $data['getRecord']=Br_Class_TimeTable::editTimeTable($class_id);
    $data['getPeriod']=Br_Period::getPeriod();
    $data['getRoom']=Br_Room::getRoom();
    $data['getDay']=Br_Day::getDay();
    $data['success']="Subject timetable successfully Updated";
    return view('branchadmin.class_timetable.edit',$data); 
    }
   
}
public function delete($id){
  $save=Br_Class_TimeTable::getSingle($id);
  $save->is_deleted=1;
  $save->save();
  return redirect()
  ->back()
->with('success',"  Deleted");
}
public function get($class_id){
  $data['getRecord']=Br_Class_TimeTable::editTimeTable($class_id);
  if(!empty($data['getRecord'])){
    $data['getPeriod']=Br_Period::getPeriod();
    $data['getRoom']=Br_Room::getRoom();
    $data['getDay']=Br_Day::getDay();
    $data['getRecord']=Br_Teacher_Subject::createTimeTable($class_id);
      return view('branchadmin.class_timetable.get_subject',$data); 
  }else{
      abort(404);
  }
 
}
public function add($class_id){
  $data['getRecord']=Br_Teacher_Subject::createTimeTable($class_id);
  if(!empty($data['getRecord'])){
    $data['getPeriod']=Br_Period::getPeriod();
    $data['getRoom']=Br_Room::getRoom();
    $data['getDay']=Br_Day::getDay();
    $data['getRecord']=Br_Teacher_Subject::createTimeTable($class_id);
      return view('branchadmin.class_timetable.get_subject',$data); 
  }else{
      abort(404);
  }
 
}

public function insert($class_id,Request $request)
{  

  $getAlreadyFirst=Br_Class_TimeTable::getAlreadyFirst($request->period_id,$request->room_id,$request->day);
  if(!empty($getAlreadyFirst)){
    $data['getRecord']=Br_Teacher_Subject::createTimeTable($class_id);
    $data['getPeriod']=Br_Period::getPeriod();
    $data['getRoom']=Br_Room::getRoom();
    $data['getDay']=Br_Day::getDay();
    $data['success']="Room already allocated";
    return view('branchadmin.class_timetable.get_subject',$data); 
}
else{
  $save=new Br_Class_TimeTable;
    $save->teacher_id=$request->teacher_id;
    $save->class_id=$request->class_id;
    $save->subject_id=$request->subject_id;
    $save->room_id=$request->room_id;
    $save->branch_id=$request->branch_id;
    $save->period_id=$request->period_id;
    $save->day=$request->day;
    $save->save(); 
    $data['getRecord']=Br_Teacher_Subject::createTimeTable($class_id);
    $data['getPeriod']=Br_Period::getPeriod();
    $data['getRoom']=Br_Room::getRoom();
    $data['getDay']=Br_Day::getDay();
    $data['success']="Subject timetable successfully created";
    return view('branchadmin.class_timetable.get_subject',$data); 
    }
}




}
