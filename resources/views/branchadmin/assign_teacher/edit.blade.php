@extends('layouts.branchadmin')
@section('branch')
<div class="w3-container">
    <div class="w3-center">
    <button class="w3-center w3-button w3-center w3-blue">Edit Record</button>
    </div>

<div class="w3-panel w3-border">
@include('message')
    <form method="post" action=""> 
        {{csrf_field()}}
        <div class="form-group">
        <label  class="form-label">Teacher</label>
        <select class="form-control" name="teacher_id" required>
  <option value="">Select Teacher</option>
  @foreach($getTeacher as $teacher)
  <option {{($getRecord->teacher_id==$teacher->id)?'selected':''}} value="{{$teacher->id}}">{{$teacher->name}}</option>
  @endforeach
    </select>
    
  </div>
  <div class="form-group">
        <label  class="form-label">Subject</label>
      @foreach($getSubject as $subject)
      @php
          $checked="";
      @endphp
      @foreach($getAssignedSubjectId as $subjectAssign)
       @if($subjectAssign->subject_id==$subject->id)
       @php
          $checked="checked";
      @endphp
       @endif
      @endforeach
      <div>
      <label style="font-weight:normal"> 
        <input {{$checked}} type="checkbox" value="{{$subject->id}}" name="subject_id[]">{{$subject->name}}
      </label>
      </div>
      
      @endforeach  
    
  </div>
  <div class="form-group ">
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
<div class="form-group " >
        <label >Class<span style="color:red;"
 class="w3-text-large">
***
    </span></label>
                        <select id="state-dropdown" class="form-control" required
     name="class_id">
                        </select>
                    </div>
  <div class="form-group">
    <label  class="form-label">Status</label>
    <select class="form-control" name="status">
  <option {{($getRecord->status==0)?'selected':''}} value="0">Active</option>
  <option {{($getRecord->status==1)?'selected':''}} value="1">InActive</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
    </div>
</div>
 
  </div>
  @endsection
  