@extends('layouts.receptionist')
@section('resp')
<div class="w3-container">
<a href="{{url('admin/admin/add')}}" class="w3-center w3-button w3-blue">Add new  student </a>
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
    <input type="text" class="form-control" name="name" 
    
    value="{{old('name',$getRecord->name)}}"  placeholder="First Name"required >
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
</div>
<div class="row">
    <div class="form-group col-md-6">
    <label  class="form-label">Residence
      <span style="color:red;" class="w3-text-large">
***
    </span></label>
    <input type="text" class="form-control" name="location" 
    value="{{old('location',$getRecord->location)}}" placeholder="Residence" required >
    <div style="color:red">{{$errors->first('location')}}</div>
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
<label >Phone Number </label>
<input type="text" class="form-control" name="mobile_number"  
    value="{{old('mobile_number',$getRecord->mobile_number)}}" placeholder="Phone Number" >  
    <div style="color:red">{{$errors->first('mobile_number')}}</div> 
</div>
<div class="form-group col-md-6">
<label >Purpose </label>
<input type="text" class="form-control" name="visit_purpose"  
    value="{{old('visit_purpose',$getRecord->visit_purpose)}}" placeholder="Purpose" >  
    <div style="color:red">{{$errors->first('visit_purpose')}}</div> 
</div>
<div class="form-group col-md-6">
<label >Kenyan Id </label>
<input type="text" class="form-control" name="national_id"  
    value="{{old('national_id',$getRecord->national_id)}}" placeholder="National Id" >  
    <div style="color:red">{{$errors->first('national_id')}}</div> 
</div>
   <hr/>
 
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
 
</div>

  
</div>

  @endsection
  