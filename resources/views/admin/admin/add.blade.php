@extends('layouts.layout')
@section('content')
<div class="w3-container">
<a href="{{url('admin/admin/add')}}" class="w3-center w3-button w3-blue">Add new  Admin </a>
<div class="w3-panel w3-border">
@include('message')
    <form method="post" action=""> 
        {{csrf_field()}}
        <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" value="{{old('name')}}" required >
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" value="{{old('email')}}" name="email" required>
    
    <div style="color:red">{{$errors->first('email')}}</div>
  </div>
  <div class="mb-3">
  
<label >Branch <span style="color:red;" class="w3-text-large">
***
    </span></label>
    <select class="form-control" required
     name="branch_id" >
      <option value="">Select Branch</option>
      @foreach($getBranch as $branch)
      <option {{(old('branch_id')==$branch->id)?'selected':''}} value="{{$branch->id}}">{{$branch->name}}</option>
      @endforeach
    </select>
    <div style="color:red">{{$errors->first('branch_id')}}</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" required>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</div>
 
  </div>
  @endsection
  