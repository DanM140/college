@extends('layouts.receptionist')
@section('resp')
<div class="w3-container w3-padding-top-32">
  <h1  class="w3-left w3-button "> Prospective student </h1>
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
  <th>Email</th>
  <th>Course</th>
  <th>Gender</th>
  <th>Mobile Number</th>
  <th>Residence</th>
  <th>Created Date</th>
  <th>action</th>
    </tr>
  </thead>
  <tbody>
@foreach($getRecord as $value)
<tr>
      <td>{{$value->id}}</td>
      <td>{{$value->name}} {{$value->last_name}}</td>
      <td>{{$value->email}}</td>
      <td>{{$value->class_name}}</td>
      <td>{{$value->gender}}</td>
      <td>{{$value->mobile_number}}</td>
      <td>{{$value->location}}</td>
      <td>{{$value->created_at}}</td>
      
      <td><a href="{{url('receptionist/prospective/edit/'.$value->id)}}" class=" w3-button w3-blue">Edit </a>
      <a href="{{url('receptionist/prospective/delete/'.$value->id)}}" class=" w3-button w3-red">Delete </a>
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

  

  