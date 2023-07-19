
@extends('layouts.layout')
@section('content')



  
  <div class="w3-panel">
    
    @include('message')
    <div class="w3-panel w3-border">
    <h1>Subject Search</h1>
    <form method="get" action=""> 
        <div class="row">
        <div class="form-group col-md-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control"  value="{{Request::get('name')}}" name="name"  >
    
  </div>
  <div class="form-group">
    <label  class="form-label">Type</label>
    <select class="form-control" name="type">
      <option value="">Select</option>
  
  <option {{(Request::get('type')=='Practical')?'selected':''}} value="Theory">Theory</option>
  <option {{(Request::get('type')=='Practical')?'selected':''}} value="Practical">Practical</option>
    </select>
  </div>
  <div class="form-group col-md-3">
    <label  class="form-label">Date</label>
    <input type="date" class="form-control" value="{{Request::get('date')}}" name="date" >
  </div>
  <div class="form-group col-md-3">
    <button class="btn btn-primary" type="submit" style="margin-top:30px">Search</button>
    <a href="{{url('admin\subject\list')}}" class="btn btn-success" style="margin-top:30px">Reset</a>
</div>
</div>

        </div>
       
</form>
    </div>
  <div class="table-responsive">
    <h1>Class List</h1>
  <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
    <th>#
      </th>
      <th>Name
      </th>
      <th>Type
      </th>
      <th>Status
      </th>
      <th>Created By
      </th>
      <th>CreatedAt
      </th>
    </tr>
  </thead>
  <tbody>
@foreach($getRecord as $value)
<tr>
   <td>
    {{$value->id}}
   </td> 
   <td>
    {{$value->name}}
   </td>
   <td>
    {{$value->type}}
   </td>
   <td>
    @if($value->status==0)
    Active
@else
Inactive
    @endif
   </td> 
   
   <td>
    {{$value->created_by_name}}
   </td>
   <td>
    {{ date('d-m-Y H:i A',strtotime($value->created_at)) }}
   </td>
  
   
</tr>
@endforeach
  </tbody>
  <tfoot>
    <tr>
      <th>#
      </th>
      <th>Name
      </th>
      <th>Type
      </th>
      <th>Status
      </th>
      <th>Created By
      </th>
      <th>CreatedAt
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

  

  