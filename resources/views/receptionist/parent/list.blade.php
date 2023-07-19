@extends('layouts.receptionist')
@section('resp')

  <div class="w3-panel">
    
    @include('message')
    
    </div>
  <div class="table-responsive">
    <h1>Student List(Total : {{$getRecord->total()}})</h1>
  <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
    <th>#</th>
    <th>Pic</th>
    <th>Name</th>
  <th>Email</th>
  <th>Adm No</th>
 
  <th>Class</th>
  <th>Gender</th>
  <th>DOB</th>
 
  <th>Mobile Number</th>
  <th>Admission Date</th>
 
  <th>Status</th>
  <th>Created Date</th>
  <th>action</th>
  
    </tr>
  </thead>
  <tbody>
@foreach($getRecord as $value)
<tr>
      <td>{{$value->id}}</td>
      <td>
           @if(!empty($value->getProfile()))
           <img src="{{$value->getProfile()}}"
           style="height:50px;width:50px;border-radius:50px"
           alt="Profile pic">
           @endif
      </td>
      <td>{{$value->name}} {{$value->last_name}}</td>
      <td>{{$value->email}}</td>
      <td>{{$value->admission_number}}</td>
      <td>{{$value->class_name}}</td>
      <td>{{$value->gender}}</td>
      <td>
       @if(!empty($value->date_of_birth)) 
      
      {{date('d-m-Y',strtotime($value->date_of_birth))}}
@endif
      </td>
     
      <td>{{$value->mobile_number}}</td>
      <td>{{$value->admission_date}}</td>
      <td></td>
      <td>{{$value->created_at}}</td>
      <td>
      <a href="{{url('receptionist/parent/add/'.$value->id)}}" class=" w3-button w3-orange">Parent </a>
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

  

  