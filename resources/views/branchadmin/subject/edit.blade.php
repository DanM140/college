@extends('layouts.branchadmin')
@section('branch')
<div class="w3-container">
    <div class="w3-center">
    <h1 >Edit subject </h1>
    </div>

<div class="w3-panel w3-border">
@include('message')
    <form method="post" action=""> 
        {{csrf_field()}}
        <div class="form-group">
          <label for="">Subject</label>
    <input type="text" class="form-control" name="name" 
    value="{{$getRecord->name}}" required >
    
  </div>
  
  <div class="form-group">
    <label  class="form-label">Type</label>
    <select class="form-control" name="type">
      <option value="">Select</option>
  <option {{($getRecord->type=="Theory")?'selected':''}} value="Theory">Theory</option>
  <option {{($getRecord->type=="Practical")?'selected':''}} value="Practical">Practical</option>
    </select>
  </div>
  <div class="form-group ">
<label >Department <span style="color:red;" class="w3-text-large">
***
    </span></label>
    <select class="form-control" required
     name="department_id" >
      <option value="">Select Department</option>
      @foreach($getDepartment as $department)
      <option {{(old('department_id',$getRecord->department_id)==$department->id)?'selected':''}}
         value="{{$department->id}}">{{$department->name}}</option>
      @endforeach
    </select>
    <div style="color:red">{{$errors->first('department_id')}}</div>
</div>
<div class="form-group ">
<label >Term <span style="color:red;"
 class="w3-text-large">
***
    </span></label>
  <select   class="form-control" required
     name="term">
 <option value="">-- Select Term --</option>
      @foreach ($getTerm as $data)
  <option {{(old('term',$getRecord->term)==$data->id)?'selected':''}} value="{{$data->id}}"> {{$data->name}}</option>
      @endforeach
  </select>
        </div>
  <div class="form-group">
    <label  class="form-label">Status</label>
    <select class="form-control" name="status">
  <option {{($getRecord->status==0)?'selected':''}} value="0">Active</option>
  <option {{($getRecord->status==1)?'selected':''}} value="1">InActive</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
    </div>
</div>
 
  </div>
  @endsection
  