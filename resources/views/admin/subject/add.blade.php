@extends('layouts.layout')
@section('content')
<div class="w3-container">
    <div class="w3-center">
    <button class="w3-center w3-button w3-center w3-blue">Add new  record </button>
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
    <label  class="form-label">Subject Type</label>
    <select class="form-control" name="type" required>
    <option value="">Select Type</option>
  <option value="Theory">Theory</option>
  <option value="Practical">Practical</option>
    </select>
  </div>
  <div class="form-group">
    <label  class="form-label">Status</label>
    <select class="form-control" name="status">
  <option value="0">Active</option>
  <option value="1">InActive</option>
    </select>
    
  </div>
  
<div class="form-group col-md-6">
<label >Department <span style="color:red;"
 class="w3-text-large">
***
    </span></label>
  <select  id="country-dropdown" class="form-control" required
     name="department_id">
 <option value="">-- Select Department --</option>
      @foreach ($getDepartment as $data)
  <option value="{{$data->id}}"> {{$data->name}}</option>
      @endforeach
  </select>
        </div>
        <div class="form-group col-md-6" >
        <label >Class<span style="color:red;"
 class="w3-text-large">
***
    </span></label>
                        <select id="state-dropdown" class="form-control" required
     name="class_id">
                        </select>
                    </div>
        
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</div>
 
  </div>
  @endsection
  