@extends('layouts.layout')
@section('content')
<div class="w3-container">
<h4 class="w3-center w3-button w3-blue">Add new  Period </h4>
<div class="w3-panel w3-border">
@include('message')
    <form method="post" action=""> 
        {{csrf_field()}}
<div class="row">
<div class="form-group col-md-6">
  <label  class="form-label">Term</label>
    <input type="number" class="form-control" name="term"  >
    </div>
    <div class="form-group col-md-6">
  <label  class="form-label">Year</label>
    <input type="number" class="form-control" name="year"  >
    </div>
  </div>
  <div class="form-group col-md-6">
    <label for="exampleInputPassword1" class="form-label">Status</label>
    <select class="form-control" required
     name="status" >
      <option value="">Select Status</option>
      <option value="0">Active</option>
      <option  value="1">InActive</option>
      
    </select>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
   
</div>


</div>
 
  </div>
  @endsection
  