@extends('layouts.teacher')
@section('teacher')
<div class="w3-container">
  </div>
  
  <div class="w3-panel">
    
  @include('message')
    <div class="w3-panel w3-border">
    <h1>Student Search</h1>
    <form method="get" action=""> 
        <div class="row">
  <div class="form-group col-md-3">
    <label  class="form-label">First Name</label>
    <input type="text" class="form-control"  value="{{Request::get('created_by_name')}}" name="created_by_name"  placeholder="First Name" >
  </div>
  <div class="form-group col-md-3">
    <label  class="form-label">Last Name</label>
    <input type="text" class="form-control"  value="{{Request::get('last_name')}}" name="last_name" placeholder="Last Name"  >
  </div>
  <div class="form-group col-md-3">
    <label  class="form-label">Course Name</label>
    <input type="text" class="form-control"  value="{{Request::get('class_name')}}" name="class_name" placeholder="Course Name"  >
  </div>
  <div class="form-group col-md-3">
    <label  class="form-label">Email</label>
    <input type="text" class="form-control" value="{{Request::get('email')}}" name="email" >
  </div>
  <div class="form-group col-md-3">
    <label  class="form-label">Date</label>
    <input type="date" class="form-control" value="{{Request::get('date')}}" name="date" >
  </div>
  <div class="form-group col-md-3">
    <button class="btn btn-primary" type="submit" style="margin-top:30px">Search</button>
    <a href="{{url('teacher\subject')}}" class="btn btn-success" style="margin-top:30px">Reset</a> 
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
      <th>Student Name</th>
      <th>Subject Name</th>
      <th>Class Name</th>
      <th>Admission Number</th>
      <th>Created Date
      </th>
    </tr>
  </thead>
  <tbody>
@foreach($getRecord as $value)
<tr>
  <td>{{$value->id}}</td>
  <td>{{$value->created_by_name}}    {{$value->last_name}}</td>
  <td>{{$value->subject_name}}</td>
  <td>{{$value->class_name}}</td>
  <td>{{$value->admission_number}}</td>
  <td>
    {{date('d-m-Y H:i A',strtotime($value->created_at))}}
  </td>
</tr>
@endforeach
  </tbody>
  <tfoot>
  <tr>
  <th>#</th>
      <th>Student Name</th>
      <th>Subject Name</th>
      <th>Class Name</th>
      <th>Admission Number</th>
      <th>Created Date</th>
    </tr>
  </tfoot>
</table>
<div style="padding:10px;float:right">
{!!$getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
</div>
</div>
  </div>
@endsection

  

  