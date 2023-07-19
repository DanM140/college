
@extends('layouts.layout')
@section('content')


<div class="w3-container">
  <a href="{{url('admin/cert/add')}}" class="w3-right w3-button w3-blue">Add new  fees  </a>
  </div>
  
  <div class="w3-panel">
    
    @include('message')

  <div class="table-responsive">
    <h1>Certificate</h1>
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
   <a href="{{url('admin/cert/edit/'.$value->id)}}" class=" w3-button w3-blue">Edit </a>
      <a href="{{url('admin/cert/delete/'.$value->id)}}" class=" w3-button w3-red">Delete </a>
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

  

  