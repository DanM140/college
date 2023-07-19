@extends('layouts.branchadmin')
@section('branch')
<div class="w3-container">
    <div class="w3-center">
    <h1 class="w3-center">Add new  Class </h1>
    </div>

<div class="w3-panel w3-border">
@include('message')
    <form method="post" action=""> 
        {{csrf_field()}}
        <div class="form-group">
          <label for="">Course</label>
    <input type="text" class="form-control" name="name" placeholder="Class Name" required >
    
  </div>
  <div class="form-group">
    <label  class="form-label">Status</label>
    <select class="form-control" name="status">
  <option value="0">Active</option>
  <option value="1">InActive</option>
    </select>
  </div>
  <div class="form-group">
    <label  class="form-label">Department</label>
    <select class="form-control" name="department_id">
  <option value="">Select Department</option>
  @foreach($getDepartment as $value)
  <option value="{{$value->id}}">{{$value->name}}</option>
  @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</div>
 
  </div>
  @endsection
  