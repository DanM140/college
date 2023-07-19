@extends('layouts.branchadmin')
@section('branch')
<div class="w3-container">
  
  <br/>
  <a href="{{url('/branchadmin/payment/pay_aggregate')}}" class="w3-left w3-button w3-blue">Payment List </a>
  </div>
  
 
  <div class="table-responsive">
  @include('message')
    <div class="w3-panel w3-border">
    <h1> Search</h1>
    <form method="get" action=""> 
        <div class="row">
        <div class="form-group col-md-3">
    <label for="exampleInputEmail1" class="form-label">First Name</label>
    <input type="text" class="form-control"  value="{{Request::get('name')}}" name="name"  >
  </div>
  <div class="form-group col-md-3">
    <label for="exampleInputEmail1" class="form-label">Last Name</label>
    <input type="text" class="form-control"  value="{{Request::get('last_name')}}" name="last_name"  >
  </div>
  <div class="form-group col-md-3">
    <label for="exampleInputEmail1" class="form-label">Admission Number</label>
    <input type="text" class="form-control"  value="{{Request::get('admission_number')}}" name="admission_number'"  >
  </div>
  <div class="form-group col-md-3">
    <label  class="form-label">Status</label>
    <select class="form-control" name="status">
      <option value="">Select</option>
  
  <option {{(Request::get('status')==0)?'selected':''}} value="0">Active</option>
  <option {{(Request::get('status')==1)?'selected':''}} value="1">InActive</option>
    </select>
  </div>
  <div class="form-group col-md-3">
    <button class="btn btn-primary" type="submit" style="margin-top:30px">Search</button>
    <a href="{{url('admin\payment\list')}}" class="btn btn-success" style="margin-top:30px">Reset</a>
</div>
</div>

        </div>
       
</form>
    </div>
    <h1>Student List(Total : {{$getRecord->total()}})</h1>
  <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
    <th>#</th>
    <th>Name</th>
  <th>Admission Number</th>
  <th>Class</th>
  <th>Status</th>
  <th>Level</th>
  <th>Created Date</th>
  <th>action</th>
    </tr>
  </thead>
  <tbody>
@foreach($getRecord as $value)
<tr>
      <td>{{$value->id}}</td>
      
      <td>{{$value->name}} {{$value->last_name}}</td>
      <td>{{$value->admission_number}}</td>
      <td>{{$value->class_name}}</td>
      @if($value->status==0)
      <td>Active</td>
      @else
      <td>InActive</td>
      @endif
      @if($value->level_id==0)
      <td>Certificate</td>
      @else
      <td>Diploma</td>
      @endif
      <td>{{$value->created_at}}</td>
      <td>
     
      <a href="{{ route('branchadmin.payment.payment', ['id' => $value->id, 'term' => $value->term]) }}" class=" w3-button w3-blue">Cash</a>
      <a href="{{ route('branchadmin.payment.bank', ['id' => $value->id, 'term' => $value->term]) }}" class=" w3-button w3-blue">Bank</a>
      <a href="{{ route('branchadmin.payment.mpesa', ['id' => $value->id, 'term' => $value->term]) }}" class=" w3-button w3-orange">Mpesa</a>
      
    </td>
    </tr>
@endforeach
  </tbody>
  <tfoot>
  <tr>
    <th>#</th>
    <th>Name</th>
  <th>Admission Number</th>
  <th>Course</th>
  <th>Level</th>
  <th>Created Date</th>
  <th>action</th>
    </tr>
  </tfoot>
</table>

<div style="padding:10px;float:right">
{!!$getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
</div>
</div>
  </div>
  

  
  

  

  
@endsection

  

  