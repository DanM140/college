@extends('layouts.student')
@section('student')
<div class="w3-container">
  </div>
  
  <div class="w3-panel">
    
  @include('message')
  <div class="w3-panel w3-border">
    <h1> Search</h1>
    <form method="get" action=""> 
        <div class="row">
        <div class="form-group ">
<label >Term <span style="color:red;"
 class="w3-text-large">
***
    </span></label>
  <select   class="form-control " required
     name="term">
 <option value="">-- Select Term --</option>
      @foreach ($getTerm as $data)
  <option value="{{$data->id}}"> {{$data->name}}</option>
      @endforeach
  </select>
        </div>
  <div class="form-group ">
    <button class="btn btn-primary" type="submit" style="margin-top:30px">Search</button>
    <a href="{{url('student\list')}}" class="btn btn-success" style="margin-top:30px">Reset</a>
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
      <th>Subject Name</th>

      <th>Marks</th>
      <th>Grade</th>
    </tr>
  </thead>
  <tbody>
@foreach($getRecord as $value)
<tr>
  <td>{{$value->id}}</td>
  <td>{{$value->subject_name}}</td>
  <td>{{$value->marks}}</td>
  <td>{{$value->grade}}</td>
  
</tr>
@endforeach
  </tbody>
  <tfoot>
  <tr>
  <th>#</th>
      <th>Subject Name</th>

      <th>Marks</th>
      <th>Grade</th>
    </tr>
  </tfoot>
</table>
<div style="padding:10px;float:right">
{!!$getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
</div>
</div>
  </div>
@endsection

  

  