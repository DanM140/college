@extends('layouts.teacher')
@section('teacher')
<div class="w3-container">
  <h1  class="w3-center ">My Subjects </h1>
  </div>
  
  <div class="w3-panel">
    
    @include('message')
    <div class="w3-panel w3-border">
    <h1>Subjects Search</h1>
    <form method="get" action=""> 
        <div class="row">
  <div class="form-group col-md-3">
    <label  class="form-label">Course Name</label>
    <input type="text" class="form-control"  value="{{Request::get('class_name')}}" name="class_name"  placeholder="Course Name" >
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
    <a href="{{url('teacher\subject')}}" class="btn btn-success" style="margin-top:30px">Reset</a>
</div>
</div>

        </div>
       
</form>
    </div>
  <div class="table-responsive">
    <h1>Assigned Teacher-Subject  List</h1>
  <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
    <th>#
      </th>
     
      <th>Course Name
      </th>
      <th>Subject Name
      </th>
      <th>Status
      </th>
      <th>Created Date
      </th>
      <th>Students
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
    {{date('d-m-Y H:i A',strtotime($value->created_at))}}
  </td>
  <td>
  <a href="{{ route('teacher.student', ['class_id' => $value->class_id, 'subject_id' => $value->subject_id]) }}" 
  class="w3-button w3-green">My Students({{$value->class_name}})</a>
  </td>
</tr>
@endforeach
  </tbody>
  <tfoot>
  <tr>
  <th>#
      </th>
     
      <th>Course Name
      </th>
      <th>Subject Name
      </th>
      <th>Status
      </th>
      <th>Created Date
      </th>
      <th>Students
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

  

  