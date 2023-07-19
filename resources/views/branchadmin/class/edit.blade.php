@extends('layouts.branchadmin')
@section('branch')
<div class="w3-container">
    <div class="w3-center">
    <h1 class="w3-center ">Edit Class </h1>
    </div>

<div class="w3-panel w3-border">
@include('message')
    <form method="post" action=""> 
        {{csrf_field()}}
        <div class="form-group">
          <label for="">Course</label>
    <input type="text" class="form-control" name="name" 
    value="{{$getRecord->name}}" required >
    
  </div>
  <div class="form-group">
    <label  class="form-label">Status</label>
    <select class="form-control" name="status">
  <option {{($getRecord->status==0)?'selected':''}} value="0">Active</option>
  <option {{($getRecord->status==1)?'selected':''}} value="1">InActive</option>
    </select>
  </div>
  <div class="form-group">
    <label  class="form-label">Department</label>
    <select class="form-control" name="department_id">
  <option value="">Select Department</option>
  @foreach($getDepartment as $value)
  <option {{($value->id==$getRecord->department_id)?'selected':''}} value="{{$value->id}}">{{$value->name}}</option>
  @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
    </div>
</div>
 
  </div>
  @endsection
  