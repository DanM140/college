@extends('layouts.layout')
@section('content')
<div class="w3-container">
<h4 class="w3-center w3-button w3-blue">Edit  </h4>
<div class="w3-panel w3-border">
@include('message')
    <form method="post" action=""> 
        {{csrf_field()}}
<div class="row">
<div class="form-group col-md-6">
    <label for="exampleInputEmail1" class="form-label">Term Name</label>
    <input type="name" class="form-control" name="name" value="{{$getRecord->name}}" required >
  </div>
  <div class="form-group col-md-6">
    <label for="exampleInputEmail1" class="form-label">Level Name</label>
    <input type="name" class="form-control" name="level_name" value="{{$getRecord->level_name}}" required >
  </div>
  <div class="form-group col-md-6">
    <label for="exampleInputEmail1" class="form-label">Term</label>
    <input type="number" class="form-control" name="term" value="{{$getRecord->term}}" required >
  </div>
<div class="form-group col-md-6">
    <label for="exampleInputEmail1" class="form-label">Fees</label>
    <input type="number" class="form-control" name="fees" value="{{$getRecord->fees}}" required >
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
  