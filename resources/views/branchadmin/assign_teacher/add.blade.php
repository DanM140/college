@extends('layouts.branchadmin')
@section('branch')
<div class="w3-panel w3-border">
@include('message')
    <form method="post" action=""> 
        {{csrf_field()}}
        <div class="form-group">
        <label  class="form-label">Teacher</label>
        <select class="form-control" name="teacher_id" required>
  <option value="">Select Teacher</option>
  @foreach($getTeacher as $teacher)
  <option value="{{$teacher->id}}">{{$teacher->name}}</option>
  @endforeach
    </select>
    
  </div>
  <div class="form-group">
        <label  class="form-label">Subject</label>
      @foreach($getSubject as $subject)
      <div>
      <label style="font-weight:normal"> 
        <input type="checkbox" value="{{$subject->id}}" name="subject_id[]">{{$subject->name}}
      </label>
      </div>
      
      @endforeach  
    
  </div>
<div class="form-group ">
<label >Department <span style="color:red;"
 class="w3-text-large">
***
    </span></label>
  <select  id="country-dropdown" class="form-control" required
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
                        <select id="state-dropdown" class="form-control" required
     name="class_id">
                        </select>
                    </div>
  <div class="form-group">
    <label  class="form-label">Status</label>
    <select class="form-control" name="status">
  <option value="0">Active</option>
  <option value="1">InActive</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</div>
 
  </div>
  @endsection
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@section('branchscript')
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
        url: "{{url('/branchadmin/student/api/fetch-classes')}}",
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