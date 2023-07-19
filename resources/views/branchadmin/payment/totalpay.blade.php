@extends('layouts.branchadmin')
@section('branch')
<div class="w3-container">
 
  <a href="{{url('/branchadmin/payment/list')}}" class="w3-left w3-button w3-blue">Students List </a>
  </div>
  
  <div class="w3-panel">
    
    @include('message')
    
    </div>
  <div class="table-responsive">

  <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
  <tr>
    <th>#</th>
    <th>Name</th>
  <th>Admission Number</th>
  <th>Fee Status</th>
  <th>Excess Amount</th>
  <th>Created Date</th>
  
    </tr>
  </thead>
  <tbody>
@foreach($getRecord as $value)
<tr>
      <td></td>
      <td>{{$value->first_name}} {{$value->last_name}}</td>
      <td>{{$value->admission_number}}</td>
      
      @if($value->balance < 0)
    <td>
      
    Fee Cleared

    </td>
    @else
    <td>
    {{$value->balance}}
    </td>
    @endif
    @if($value->fee_paid > $value->fees)
  
  
  <td>-{{$value->fee_paid-$value->fees}}</td>
  
  @else
  <td>
  
  </td>
  @endif
      <td>{{$value->created_at}}</td>
    </td>
    </tr>
@endforeach
  </tbody>
  <tfoot>
  <tr>
  <th>#</th>
    <th>Name</th>
  <th>Admission Number</th>
  <th>Fee Status</th>
  <th>Excess Amount</th>
  <th>Created Date</th>

  
    </tr>
  </tfoot>
</table>

<div style="padding:10px;float:right">

</div>
</div>
  </div>
@endsection






  

  