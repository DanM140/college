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
    <label for="exampleInputEmail1" class="form-label">Term Name</label>
    <input type="name" class="form-control" name="name" value="{{old('name')}}" required >
  </div>
  <div class="form-group col-md-6">
    <label for="exampleInputEmail1" class="form-label">Level Name</label>
    <input type="name" class="form-control" name="level_name" value="{{old('level_name')}}" required >
  </div>
  <div class="form-group col-md-6">
    <label for="exampleInputEmail1" class="form-label">Term</label>
    <input type="number" class="form-control" name="term" value="{{old('term')}}" required >
  </div>
<div class="form-group col-md-6">
    <label for="exampleInputEmail1" class="form-label">Fees</label>
    <input type="number" class="form-control" name="fees" value="{{old('fees')}}" required >
  </div>
  
  <div class="form-group col-md-6">
<label >Status <span style="color:red;"
 class="w3-text-large">
***
    </span></label>
    <select class="form-control" required
     name="status" >
      <option {{(old('status')==1)?'selected':''}} value="1">InActive</option>
      
    </select>
    <div style="color:red">{{$errors->first('status')}}</div>
</div>
  <div class="form-group col-md-6">
<label >Level <span style="color:red;"
 class="w3-text-large">
***
    </span></label>
    <select class="form-control" required
     name="level" >
      <option {{(old('level')==1)?'selected':''}} value="1">Diploma</option>
      
    </select>
    <div style="color:red">{{$errors->first('status')}}</div>
</div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
   
</div>


</div>
 
  </div>
  @endsection
  