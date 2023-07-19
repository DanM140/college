@extends('layouts.branchadmin')
@section('branch')
<div class="w3-container">
    <div class="w3-center">
    <h1 >Add new  record </h1>
    </div>

<div class="w3-panel w3-border">
@include('message')
    <form method="post" action=""> 
        {{csrf_field()}}
        <div class="form-group">
          <label for="">Subject</label>
    <input type="text" class="form-control" name="name" placeholder="Subject Name" required >
    
  </div>
  <div class="form-group">
    <label  class="form-label">Subject Type</label>
    <select class="form-control" name="type" required>
    <option value="">Select Type</option>
  <option value="Theory">Theory</option>
  <option value="Practical">Practical</option>
    </select>
  </div>
  <div class="form-group">
    <label  class="form-label">Status</label>
    <select class="form-control" name="status">
  <option value="0">Active</option>
  <option value="1">InActive</option>
    </select>
    
  </div>
  <div class="form-group ">
<label >Department <span style="color:red;"
 class="w3-text-large">
***
    </span></label>
  <select  id="department-dropdown" class="form-control" required
     name="department_id">
 <option value="">-- Select Department --</option>
      @foreach ($getDepartment as $data)
  <option value="{{$data->id}}"> {{$data->name}}</option>
      @endforeach
  </select>
        </div>
        <div class="form-group " >
        <label >Class<span style="color:red;"
 class="w3-text-large">
***
    </span></label>
                        <select id="class-dropdown" class="form-control" required
     name="class_id">
                        </select>
                    </div>
                    <div class="form-group ">
<label >Term <span style="color:red;"
 class="w3-text-large">
***
    </span></label>
  <select   class="form-control" required
     name="term">
 <option value="">-- Select Term --</option>
      @foreach ($getTerm as $data)
  <option value="{{$data->id}}"> {{$data->name}}</option>
      @endforeach
  </select>
        </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</div>
 
  </div>
  @endsection
  @section('branchscript')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script>
  $(document).ready(function () {
  
  /*------------------------------------------
  --------------------------------------------
  Country Dropdown Change Event
  --------------------------------------------
  --------------------------------------------*/
  $('#country-dropdown').on('change', function () {
      var idCountry = this.value;
      $("#class-dropdown").html('');
      $.ajax({
          url: "{{url('/branchadmin/student/api/fetch-classes')}}",
          type: "POST",
          data: {
              department_id: idCountry,
              _token: '{{csrf_token()}}'
          },
          dataType: 'json',
          success: function (result) {
              $('#class-dropdown').html('<option value="">-- Select State --</option>');
              $.each(result.states, function (key, value) {
                  $("#class-dropdown").append('<option value="' + value
                      .id + '">' + value.name + '</option>');
              });
              
          }
      });
  });
  $('#department-dropdown').on('change', function () {
      var idCountry = this.value;
      $("#class-dropdown").html('');
      $.ajax({
          url: "{{url('/branchadmin/subject/api/fetch-subjects_Subject')}}",
          type: "POST",
          data: {
              department_id: idCountry,
              _token: '{{csrf_token()}}'
          },
          dataType: 'json',
          success: function (result) {
              $('#class-dropdown').html('<option value="">-- Select State --</option>');
              $.each(result.states, function (key, value) {
                  $("#class-dropdown").append('<option value="' + value
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
</script>
  @endsection