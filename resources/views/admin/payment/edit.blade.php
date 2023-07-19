@extends('layouts.layout')
@section('content')
<div class="w3-container">
<a href="{{url('admin/branch/add')}}" class="w3-center w3-button w3-blue">Add new  branch </a>
<div class="w3-panel w3-border">
@include('message')
    <form method="post" action=""> 
        {{csrf_field()}}
<div class="row">
<div class="form-group col-md-6">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" name="name"  value="{{$getRecord->name}}" required >
    
  </div>
  <div class="form-group col-md-6">
    <label for="exampleInputEmail1" class="form-label">Code</label>
    <input type="text" class="form-control" value="{{$getRecord->code}}" name="code" required>
    
    <div style="color:red">{{$errors->first('code')}}</div>
  </div>
  <div class="form-group col-md-6">
    <label for="exampleInputPassword1" class="form-label">Head</label>
    <input type="text" class="form-control" name="head" value="{{$getRecord->head}}" required>
  </div>
  <div class="form-group col-md-6">
    <label for="exampleInputPassword1" class="form-label">Location</label>
    <input type="text" class="form-control" name="location"  value="{{$getRecord->location}}"required>
  </div>
  <div class="form-group col-md-6">
    <label for="exampleInputPassword1" class="form-label">Status</label>
    <select class="form-control" required
     name="status" >
      <option  value="">Select Status</option>
      <option {{($getRecord->status==0)?"selected":""}} value="0">Active</option>
      <option {{($getRecord->status==1)?"selected":""}}  value="1">InActive</option>
      
    </select>
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
   
</div>


</div>
 
  </div>
  @endsection
  