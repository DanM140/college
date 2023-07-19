@extends('layouts.branchadmin')
@section('branch')
<div class="w3-container">
<h1 class="w3-center">Edit </h1>
<div class="w3-panel w3-border">
@include('message')
    <form method="post" action=""> 
        {{csrf_field()}}
        <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" value="{{old('name',$getRecord->name)}}" required >
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" value="{{old('email',$getRecord->email)}}" required>
    <div style="color:red">{{$errors->first('email')}}</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="text" class="form-control" name="password"  >
  </div>
  
  <button type="submit" class="btn btn-primary">Update</button>
</form>
    </div>
</div>
 
  </div>
  @endsection

  