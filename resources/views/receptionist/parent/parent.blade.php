@extends('layouts.receptionist')
@section('resp')
<div class="w3-container">
  <a href="{{url('receptionist/visitor/add')}}" class="w3-right w3-button w3-blue">Add new  student </a>
  </div>
  
  <div class="w3-panel">
    
    @include('message')
    
    </div>
  <div class="table-responsive">
    <h1>Student List(Total : {{$getRecord->total()}})</h1>
  <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
    <th>#</th>
    <th>Name</th>
  <th>Gender</th>
  <th>Student Name</th>
  <th>Student Admission Number</th>
  <th>Phone Number</th>
  <th>National Id</th>
  <th>Location</th>
  <th>Occupation</th>
  <th>Created Date</th>
  <th>action</th>
    </tr>
  </thead>
  <tbody>
@foreach($getRecord as $value)
<tr>
      <td>{{$value->id}}</td>
      <td>{{$value->first_name}} {{$value->last_name}}</td>
      @if($value->gender==0)
      <td>Male Guardian/Parent</td>
@else
<td>Female Guardian/Parent</td>
@endif
      <td>{{$value->student_name}}</td>
      <td>{{$value->admission_number}}</td>
      <td>{{$value->mobile_number}}</td>
      <td>{{$value->national_id}}</td>
      <td>{{$value->location}}</td>
      <td>{{$value->occupation}}</td>
      <td>{{$value->created_at}}</td>
      
      <td><a href="{{url('receptionist/parent/edit/'.$value->id)}}" class=" w3-button w3-blue">Edit </a>
      <a href="{{url('receptionist/parent/delete/'.$value->id)}}" class=" w3-button w3-red">Delete </a>
    </td>
    </tr>
@endforeach
  </tbody>
  <tfoot>
    <tr>
   
      
    </tr>
  </tfoot>
</table>

<div style="padding:10px;float:right">

</div>
</div>
  </div>
  <hr>

@endsection

  

  