@extends('layouts.branchadmin')
@section('branch')
<div class="w3-container">
<div class="w3-panel w3-border">
@include('message')
<p>{{!empty($success)? $success:''}}</p>
<div class="w3-row">
  @foreach($getRecord as $value)
  <div class="w3-left">Subject: {{$value->subject_name}}</div>
<div class="w3-col">
  
<form class="form-inline" method="post" action="">
{{csrf_field()}}
 
  <div class="form-group mx-sm-3 mb-2">
    <label  class="form-label">Room:</label>
    <select class="js-example-basic-single form-control" required
     name="room_id" >
      <option  value="">Select Room</option>
      @foreach($getRoom as $room)
      <option {{($room->id==$value->room_id)?"selected":""}} value="{{$room->id}}">{{$room->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label  class="form-label">Period: </label>
    <select class=" form-control" required
     name="period_id" >
      <option  value="">Select Room</option>
      @foreach($getPeriod as $period)
      <option {{($period->id==$value->period_id)?"selected":""}} value="{{$period->id}}">{{$period->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label  class="form-label">Day:</label>
    <select class=" form-control" required
     name="day" >
      <option  value="">Select Day</option>
      @foreach($getDay as $day)
      <option {{($day->id==$value->day)?"selected":""}} value="{{$day->id}}">{{$day->name}}</option>
      @endforeach
    </select>
  </div>
    <input type="hidden" class="form-control"  placeholder="Branch" name="branch_id" value="{{$value->branch_id}}">
    <input type="hidden" class="form-control"   name="id" value="{{$value->id}}">
    <input type="hidden" class="form-control"  placeholder="Teacher" name="teacher_id" value="{{$value->teacher_id}}">
 
    <input type="hidden" class="form-control"  placeholder="Class"  name="class_id" value="{{$value->class_id}}">
 
    <input type="hidden" class="form-control"  placeholder="Subject" name="subject_id" value="{{$value->subject_id}}">
 
  <button type="submit" class="btn btn-primary mb-2">Update</button>
</form>
</div>
@endforeach
</div>
   
   
</div>


</div>
  </div>
  @endsection
  @section('branchscript')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function(){
    $('.js-example-basic-single').select2({
        theme: "classic"
    });
});
</script>
  @endsection