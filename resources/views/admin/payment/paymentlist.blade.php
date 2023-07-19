@extends('layouts.layout')
@section('content')
<div>
<h1>Fee History</h1>

  <div class="table-responsive">

  <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
  <tr>
    <th>#</th>
    <th>Admission</th>
    <th>Student Name</th>
  <th>Mpesa</th>
  <th>Bank</th>
  <th>Cash</th>
  <th>Amount</th>
  <th>Created Date</th>
  <th>action</th>
  
    </tr>
  </thead>
  <tbody>
@foreach($getRecord as $value)
<tr>
      <td>{{$value->pay_id}}</td>
      <td>{{$value->admission_number}}</td>
      <td>{{$value->first_name}} {{$value->last_name}}</td>
      <td>{{$value->code}}</td>
      <td>{{$value->bankcode}}</td>
      <td></td>
      <td> {{$value->amount}}</td>
      <td>{{$value->created_at}}</td>
      <td><a href="{{url('admin/payment/totalpay/'.$value->student_id)}}" class=" w3-button w3-blue">Students Fee Status </a></td>
     <td></td> 
    </tr>
@endforeach
  </tbody>
  <tfoot>
  <tr>
  <th>#</th>
  <th>Mpesa</th>
  <th>Bank</th>
  <th>Cash</th>
  <th>Amount</th>
  <th>Created Date</th>
  <th>action</th>
  
    </tr>
  </tfoot>
</table>

<div style="padding:10px;float:right">

</div>
</div>
</div>
  

  
  

  

  
@endsection

  

  