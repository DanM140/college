
@extends('layouts.student')
@section('student')
<div class="w3-container">
  
  <br/>
  </div>
  <div>
  <div class="w3-panel">
    
    @include('message')
    
    </div>
    <h1>Fee Status </h1>
    <div class="table-responsive">

<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
<thead>
<tr>
  <th>#</th>
  <th>Name</th>
<th>Admission Number</th>
<th>Balance</th>
<th>Excess Amount</th>


  </tr>
</thead>
<tbody>
@foreach($getRecord_Total as $value)
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
  </tr>
</tfoot>
</table>

<div style="padding:10px;float:right">

</div>
</div>
<h1>Fee History</h1>
<div class="w3-panel w3-border">
    <h1> Search</h1>
    <form method="get" action=""> 
        <div class="row">
        <div class="form-group col-md-6">
<label >Term <span style="color:red;"
 class="w3-text-large">
***
    </span></label>
  <select   class="form-control" required
     name="fee_id">
 <option value="">-- Select Term --</option>
      @foreach ($getTerm as $data)
  <option value="{{$data->id}}"> {{$data->name}}</option>
      @endforeach
  </select>
        </div>
  <div class="form-group col-md-3">
    <button class="btn btn-primary" type="submit" style="margin-top:30px">Search</button>
    <a href="{{url('student\payment\pay_aggregate')}}" class="btn btn-success" style="margin-top:30px">Reset</a>
</div>
</div>

        </div>
       
</form>
    </div>
  <div class="table-responsive">

  <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
  <tr>
    <th>#</th>
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
      <td></td>
      <td></td>
      <td>{{$value->bankcode}}</td>
      <td></td>
      <td> {{$value->amount}}</td>
      <td></td>
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

  

  