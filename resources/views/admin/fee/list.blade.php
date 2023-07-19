
@extends('layouts.layout')
@section('content')


<div class="w3-container">
  <a href="{{url('admin/fee/add')}}" class="w3-right w3-button w3-blue">Add new  fees  </a>
  </div>
  
  <div class="w3-panel">
    
    @include('message')
    <div class="w3-panel w3-border">
    <h1> Search</h1>
    <form method="get" action=""> 
        <div class="row">
        <div class="form-group col-md-3">
    <label for="exampleInputEmail1" class="form-label">Term Name</label>
    <input type="text" class="form-control"  value="{{Request::get('name')}}" name="name"  >
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
    <a href="{{url('admin\fee\list')}}" class="btn btn-success" style="margin-top:30px">Reset</a>
</div>
</div>

        </div>
       
</form>
    </div>
  <div class="table-responsive">
    <h1>Diploma</h1>
  <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
    <th>#</th>
    <th> Name</th>
<th>Fees</th>
<th>Status</th>
      <th>Created Date
      </th>
      <th>Updated Date
      </th>
      <th>Actions
      </th>
    </tr>
  </thead>
  <tbody>
@foreach($getRecord as $value)
<tr>
  <td>{{$value->id}}</td>
  <td>{{$value->name}} </td>
  <td>{{$value->fees}}</td>
  <td>
  @if($value->status==0)
    Active
@else
Inactive
    @endif
  </td>
  <td> {{date('Y-m-d H:i A',strtotime($value->created_at))}}</td>
  <td>{{date('Y-m-d H:i A',strtotime($value->updated_at))}}</td>
  <td>
   <a href="{{url('admin/fee/edit/'.$value->id)}}" class=" w3-button w3-blue">Edit </a>
      <a href="{{url('admin/fee/delete/'.$value->id)}}" class=" w3-button w3-red">Delete </a>
   </td>
  
</tr>
@endforeach
  </tbody>
  <tfoot>
  <tr>
    <th>#</th>
    <th> Level</th>
<th>Fees</th>
      <th>Created Date
      </th>
      <th>Updated Date
      </th>
      <th>Actions
      </th>
    </tr>
  </tfoot>
</table>
<div style="padding:10px;float:right">
{!!$getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
</div>
</div>
  </div>
  <hr>
  

  
@endsection

  

  