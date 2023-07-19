@extends('layouts.layout')
@section('content')
<div class="w3-container">
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
    <label for="exampleInputPassword1" class="form-label">Branch</label>
    <select class="form-control" required
     name="branch_id" >
      <option  value="">Select Branch</option>
      @foreach($getBranch as $value)
      <option {{($value->id==$getRecord->branch_id)?"selected":""}} value="{{$value->id}}">{{$value->name}}</option>
      @endforeach
      
     
      
    </select>
  </div>
  <div class="form-group col-md-6">
    <label for="exampleInputPassword1" class="form-label">Head</label>
    <input type="text" class="form-control" name="head" value="{{$getRecord->head}}" required>
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
  