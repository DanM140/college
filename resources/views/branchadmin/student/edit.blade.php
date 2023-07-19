@extends('layouts.branchadmin')
@section('branch')
<div class="w3-container">
<h4 class="w3-center w3-button w3-blue">Edit  </h4>
<div class="w3-panel w3-border">
@include('message')
    <form method="post" action="" enctype="multipart/form-data"> 
        {{csrf_field()}}
<div class="row" >
        <div class="form-group col-md-6">
    <label for="exampleInputEmail1" class="form-label">First Name 
      <span style="color:red;" class="w3-large">
***
    </span></label>
    <input type="text" class="form-control" name="name" value="{{old('name',$getRecord->name)}}"  placeholder="First Name"required >
    <div style="color:red">{{$errors->first('name')}}</div>
  </div>
  <div class="form-group col-md-6">
    <label for="exampleInputEmail1" class="form-label">Last Name
      <span style="color:red;" class="w3-text-large">
***
    </span></label>
    <input type="text" class="form-control" name="last_name" value="{{old('last_name',$getRecord->last_name)}}" placeholder="Last Name" required >
    <div style="color:red">{{$errors->first('last_name')}}</div>
  </div>
    <div class="form-group col-md-6">
    <label for="exampleInputEmail1" class="form-label">Admission Number
      <span style="color:red;" class="w3-text-large">
***
    </span></label>
    <input type="text" class="form-control" name="admission_number" 
    value="{{old('admission_number',$getRecord->admission_number)}}" placeholder="Admission Number" required >
    <div style="color:red">{{$errors->first('admission_number')}}</div>
    </div>
    
    <div class="form-group col-md-6">
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
        <div class="form-group col-md-6" >
        <label >Class<span style="color:red;"
 class="w3-text-large">
***
    </span></label>
                        <select id="state-dropdown" class="form-control" required
     name="class_id">
                        </select>
                    </div>

   
<div class="form-group col-md-6">
<label >Level <span style="color:red;"
 class="w3-text-large">
***
    </span></label>
    <select class="form-control" id="level-dropdown" required
     name="level_id" >
      <option value="">Select Level</option>
      <option {{(old('level_id')==0)?'selected':''}} value="0">Cert</option>
      <option {{(old('level_id')==1)?'selected':''}} value="1">Diploma</option>
      
    </select>
    <div style="color:red">{{$errors->first('level_id')}}</div>
</div>  

        <div class="form-group col-md-6" >
        <label >Term<span style="color:red;"
 class="w3-text-large">
***
    </span></label>
                        <select id="fee-dropdown" class="form-control" required
     name="term">
                        </select>
                    </div>
<div class="form-group col-md-6">
<label >Gender <span style="color:red;"
 class="w3-text-large">
***
    </span></label>
    <select class="form-control" required
     name="gender" >
      <option value="">Select Gender</option>
      <option {{(old('gender',$getRecord->gender)=='Male')?'selected':''}} value="Male">Male</option>
      <option {{(old('gender',$getRecord->gender)=='Female')?'selected':''}} value="Female">Female</option>
      
    </select>
    <div style="color:red">{{$errors->first('gender')}}</div>
</div>
  
<div class="form-group col-md-6">
<label >Date Of Birth  <span style="color:red;"
 class="w3-text-large">
***
    </span></label>
<input type="date" class="form-control" name="date_of_birth"  required
    value="{{old('date_of_birth',$getRecord->date_of_birth)}}" placeholder="Date Of Birth" > 
    <div style="color:red">{{$errors->first('date_of_birth')}}</div> 
</div>



<div class="form-group col-md-6">
<label >Phone Number </label>
<input type="text" class="form-control" name="mobile_number"  
    value="{{old('mobile_number',$getRecord->mobile_number)}}" placeholder="Phone Number" >  
    <div style="color:red">{{$errors->first('mobile_number')}}</div> 
</div>

   <div class="form-group col-md-6">
    <label for="exampleInputEmail1" class="form-label">Admission Number
      <span style="color:red;" class="w3-text-large">
***
    </span></label>
    <input type="date" class="form-control" name="admission_date" 
    value="{{old('admission_date',$getRecord->admission_date)}}" placeholder="Admission Date" required >
    <div style="color:red">{{$errors->first('admission_date')}}</div> 
    </div>
    <div class="form-group col-md-6">
    <label for="exampleInputEmail1" class="form-label">Profile Picture
      <span style="color:red;" class="w3-text-large">
***
    </span></label>
    <input type="file" class="form-control" name="profile_pic" 
    placeholder="Profile Picture" >

<img src="{{$getRecord->getProfile()}}" alt="" style="width: auto;height:50px">
    <div style="color:red">{{$errors->first('profile_pic')}}</div> 
    </div>
    
   
   
    <div class="form-group col-md-6">
<label >Status <span style="color:red;"
 class="w3-text-large">
***
    </span></label>
    <select class="form-control" required
     name="status" >
      <option value="">Select Status</option>
      <option {{(old('status',$getRecord->status)==0)?'selected':''}} value="0">Active</option>
      <option {{(old('status',$getRecord->status)==1)?'selected':''}} value="1">InActive</option>
      
    </select>
    <div style="color:red">{{$errors->first('status')}}</div>
</div>
   </div>
   <hr/>
   <div class="form-group">
    <label for="exampleInputEmail1" class="form-label">Email address <span style="color:red;"
 class="w3-text-large">
***
    </span></label>
    <input type="email" class="form-control" value="{{old('email',$getRecord->email)}}" name="email" required>
    
    <div style="color:red">{{$errors->first('email')}}</div>
  </div>
  <div class="form-group ">
    <label for="exampleInputPassword1" class="form-label">Password </label>
    <input type="text" class="form-control" name="password" >
    <p>Do you want to change password? Type the new password</p>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
 
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