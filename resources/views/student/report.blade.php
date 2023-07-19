@extends('layouts.student')
@section('student')

  
  <div class="w3-panel">
    
    @include('message')
    
    </div>
  <div class="table-responsive">
    <h1>Report</h1>
  <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
    <th>#</th>
    <th>Term</th>
    <th>Update Date</th>
    <th>Term Registration</th>
    </tr>
  </thead>
  <tbody>
@foreach($getRecord as $value)
<tr>
      <td>{{$value->id}}</td>
      <td>{{$value->term}}</td>
      <td>{{$value->updated_at}}</td>
      <td><a href="{{url('student/edit_report/'.$value->id)}}" class=" w3-button w3-blue">Report </a>
      
    </td>
    </tr>
@endforeach
  </tbody>
  <tfoot>
    <tr>
    <th>#</th>
    
      
    </tr>
  </tfoot>
</table>

<div style="padding:10px;float:right">

</div>
</div>
  </div>
  <hr>

@endsection

  

  