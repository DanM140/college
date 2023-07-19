@extends('layouts.branchadmin')
@section('branch')
<div class="w3-container">
<h3 class="w3-border w3-center">Add new  student </h3>
</div>
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
    <input type="text" class="form-control" name="name" value="{{old('name')}}"  placeholder="First Name"required >
    <div style="color:red">{{$errors->first('name')}}</div>
  </div>
  <div class="form-group col-md-6">
    <label for="exampleInputEmail1" class="form-label">Last Name
      <span style="color:red;" class="w3-text-large">
***
    </span></label>
    <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}" placeholder="Last Name" required >
    <div style="color:red">{{$errors->first('last_name')}}</div>
  </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
    <label for="exampleInputEmail1" class="form-label">Admission Number
      <span style="color:red;" class="w3-text-large">
***
    </span></label>
    <input type="text" class="form-control" name="admission_number" 
    value="{{old('admission_number')}}" placeholder="Admission Number" required >
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
<label >Gender <span style="color:red;"
 class="w3-text-large">
***
    </span></label>
    <select class="form-control" required
     name="gender" >
      <option value="">Select Gender</option>
      <option {{(old('gender')=='Male')?'selected':''}} value="Male">Male</option>
      <option {{(old('gender')=='Female')?'selected':''}} value="Female">Female</option>
      
    </select>
    <div style="color:red">{{$errors->first('gender')}}</div>
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
<label >Date Of Birth  <span style="color:red;"
 class="w3-text-large">
***
    </span></label>
<input type="date" class="form-control" name="date_of_birth"  required
    value="{{old('date_of_birth')}}" placeholder="Date Of Birth" > 
    <div style="color:red">{{$errors->first('date_of_birth')}}</div> 
</div>


<div class="form-group col-md-6">
<label >Phone Number </label>
<input type="text" class="form-control" name="mobile_number"  
    value="{{old('mobile_number')}}" placeholder="Phone Number" >  
    <div style="color:red">{{$errors->first('mobile_number')}}</div> 
</div>

   <div class="form-group col-md-6">
    <label for="exampleInputEmail1" class="form-label">Admission Date
      <span style="color:red;" class="w3-text-large">
***
    </span></label>
    <input type="date" class="form-control" name="admission_date" 
    value="{{old('admission_date')}}" placeholder="Admission Date" required >
    <div style="color:red">{{$errors->first('admission_date')}}</div> 
    </div>
    <div class="form-group col-md-6">
    <label for="exampleInputEmail1" class="form-label">Profile Picture
      <span style="color:red;" class="w3-text-large">
***
    </span></label>
    <input type="file" class="form-control" name="profile_pic" 
    placeholder="Profile Picture" >
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
      <option {{(old('status')==0)?'selected':''}} value="0">Active</option>
      <option {{(old('status')==1)?'selected':''}} value="1">InActive</option>
      
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
    <input type="email" class="form-control" value="{{old('email')}}" name="email" required>
    
    <div style="color:red">{{$errors->first('email')}}</div>
  </div>
  <div class="form-group ">
    <label for="exampleInputPassword1" class="form-label">Password <span style="color:red;"
 class="w3-text-large">
***
    </span></label>
    <input type="password" class="form-control" name="password" required>
  </div>




   
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
 
</div>

  
</div>

  @endsection
  