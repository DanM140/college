
@extends('layouts.layout')
@section('content')



  
  <div class="w3-panel">
    
    @include('message')
    
    </div>
  <div class="table-responsive">
    <h1>Student List(Total : {{$getRecord->total()}})</h1>
  <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
    <th>#</th>
    <th>Profile Pic</th>
    <th>Name</th>
  <th>Email</th>
  <th>Admission Number</th>
  <th>Class</th>
  <th>Gender</th>
  <th>DOB</th>
  <th>Phone</th>
  <th>Admission Date</th>
  <th>Status</th>
  <th>Created Date</th>
  
    </tr>
  </thead>
  <tbody>
@foreach($getRecord as $value)
<tr>
      <td>{{$value->id}}</td>
      <td>
           @if(!empty($value->getProfile()))
           <img src="{{$value->getProfile()}}"
           style="height:50px;width:50px;border-radius:50px"
           alt="Profile pic">
           @endif
      </td>
      <td>{{$value->name}} {{$value->last_name}}</td>
      <td>{{$value->email}}</td>
      <td>{{$value->admission_number}}</td>
      <td>{{$value->class_name}}</td>
      <td>{{$value->gender}}</td>
      <td>
      {{$value->date_of_birth}}
      </td>
      <td>{{$value->mobile_number}}</td>
      <td></td>
      @if($value->status==0)

      <td>Active</td>
      @else
      <td>In Active</td>
      @endif
      <td>{{$value->created_at}}</td>
    </tr>
@endforeach
  </tbody>
  <tfoot>
    <tr>
    <th>#</th>
    <th>Profile Pic</th>
    <th>Name</th>
  <th>Email</th>
  <th>Admission Number</th>
  <th>Class</th>
  <th>Gender</th>
  <th>Date Of Birth</th>
 
  <th>Mobile Number</th>
  <th>Admission Date</th>
 
  <th>Status</th>
  <th>Created Date</th>
  
      
    </tr>
  </tfoot>
</table>

<div style="padding:10px;float:right">

</div>
</div>
  </div>
  <hr>

@endsection
@section('admin_script')
<script>
  $(document).ready(function () {
  
  /*------------------------------------------
  --------------------------------------------
  Country Dropdown Change Event
  --------------------------------------------
  --------------------------------------------*/
  $('#country-dropdown').on('change', function () {
      var idCountry = this.value;
      $("#state-dropdown").html('');
      $.ajax({
          url: "{{url('/admin/student/api/fetch-classes')}}",
          type: "POST",
          data: {
              department_id: idCountry,
              _token: '{{csrf_token()}}'
          },
          dataType: 'json',
          success: function (result) {
              $('#state-dropdown').html('<option value="">-- Select State --</option>');
              $.each(result.states, function (key, value) {
                  $("#state-dropdown").append('<option value="' + value
                      .id + '">' + value.name + '</option>');
              });
              
          }
      });
  });
 
  $('#level-dropdown').on('change', function () {
      var idCountry = this.value;
      $("#fee-dropdown").html('');
      $.ajax({
          url: "{{url('/branchadmin/student/api/fetch-fees')}}",
          type: "POST",
          data: {
              level_id: idCountry,
              _token: '{{csrf_token()}}'
          },
          dataType: 'json',
          success: function (result) {
              $('#fee-dropdown').html('<option value="">-- Select State --</option>');
              $.each(result.fees, function (key, value) {
                  $("#fee-dropdown").append('<option value="' + value
                      .id + '">' + value.name + '</option>');
              });
              
          }
      });
  });
  });
});
</script>

@endsection