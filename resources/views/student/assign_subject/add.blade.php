@extends('layouts.student')
@section('student')
<div class="w3-container">
    <div class="w3-center">
    <button class="w3-center w3-button w3-center w3-blue">Select Subjects For Current Term</button>
    </div>

<div class="w3-panel w3-border">
@include('message')
    <form method="post" action=""> 
        {{csrf_field()}}
       
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
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</div>
 
  </div>
  @endsection
  