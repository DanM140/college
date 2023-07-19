@extends('layouts.branchadmin')
@section('branch')
<div class="w3-container">
    <div class="w3-center">
    <button class="w3-center w3-button w3-center w3-blue">Assign Subject</button>
    </div>

<div class="w3-panel w3-border">
@include('message')
    <form method="post" action=""> 
        {{csrf_field()}}
        <div class="form-group">
        <label  class="form-label">Class</label>
        <select class="form-control" name="class_id" required>
  <option value="">Select Class</option>
  @foreach($getClass as $class)
  <option value="{{$class->id}}">{{$class->name}}</option>
  @endforeach
    </select>
    
  </div>
  <div class="form-group">
        <label  class="form-label">Subject</label>
      @foreach($getSubject as $subject)
      <div>
      <label style="font-weight:normal"> 
        <input type="checkbox" value="{{$subject->id}}" name="subject_id[]">{{$subject->name}}
      </label>
      </div>
      
      @endforeach  
    
  </div>
  <div class="form-group">
    <label  class="form-label">Status</label>
    <select class="form-control" name="status">
  <option value="0">Active</option>
  <option value="1">InActive</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</div>
 
  </div>
  @endsection
  