@extends('layouts.branchadmin')
@section('branch')
<div class="w3-container">
  <a href="{{url('branchadmin/assign_subject/add')}}" class="w3-right w3-button w3-blue">Add new  Class </a>
  </div>
  
  <div class="w3-panel">
    
    @include('message')
    <div class="w3-panel w3-border">
    <h1>Class Search</h1>
    <form method="get" action=""> 
        <div class="row">
  <div class="form-group col-md-3">
    <label  class="form-label">Class Name</label>
    <input type="text" class="form-control"  value="{{Request::get('class_name')}}" name="class_name"  placeholder="Class Name" >
  </div>
  <div class="form-group col-md-3">
    <label  class="form-label">Subject Name</label>
    <input type="text" class="form-control"  value="{{Request::get('subject_name')}}" name="subject_name" placeholder="Subject Name"  >
  </div>
  <div class="form-group col-md-3">
    <label  class="form-label">Date</label>
    <input type="date" class="form-control" value="{{Request::get('date')}}" name="date" >
  </div>
  <div class="form-group col-md-3">
    <button class="btn btn-primary" type="submit" style="margin-top:30px">Search</button>
    <a href="{{url('branchadmin\assign_subject\list')}}" class="btn btn-success" style="margin-top:30px">Reset</a>
</div>
</div>

        </div>
       
</form>
    </div>
  <div class="table-responsive">
    <h1>Assigned Subject  List</h1>
  <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
    <th>#
      </th>
      <th>Class Name
      </th>
      <th>Subject Name
      </th>
      <th>Status
      </th>
      <th>Created By
      </th>
      <th>Created Date
      </th>
      <th>Actions
      </th>
    </tr>
  </thead>
  <tbody>
@foreach($getRecord as $value)
<tr>
  <td>{{$value->id}}</td>
  <td>{{$value->class_name}}</td>
  <td>{{$value->subject_name}}</td>
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
    {{date('d-m-Y H:i A',strtotime($value->created_at))}}
  </td>
  <td>
  <a href="{{url('branchadmin/assign_subject/edit/'.$value->id)}}" class=" w3-button w3-blue">Edit </a>
  <a href="{{url('branchadmin/assign_subject/edit_single/'.$value->id)}}" class=" w3-button w3-blue">Edit Single </a>
      <a href="{{url('branchadmin/assign_subject/delete/'.$value->id)}}" class=" w3-button w3-red">Delete </a>
  </td>
</tr>
@endforeach
  </tbody>
  <tfoot>
  <tr>
    <th>#
      </th>
      <th>Class Name
      </th>
      <th>Subject Name
      </th>
      <th>Status
      </th>
      <th>Created By
      </th>
      <th>Created Date
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
  <div class="w3-container">
    <h5>General Stats</h5>
    <p>New Visitors</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-green" style="width:25%">+25%</div>
    </div>

    <p>New Users</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-orange" style="width:50%">50%</div>
    </div>

    <p>Bounce Rate</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-red" style="width:75%">75%</div>
    </div>
  </div>
  <hr>

  

  
@endsection

  

  