@extends('layouts.teacher')
@section('teacher')
<div class="w3-container">
<h5  class="w3-center ">Edit  </h5>
<div class="w3-panel w3-border">
@include('message')
    <form method="post" action=""> 
        {{csrf_field()}}
<div class="row">
<div class="form-group col-md-6">
    <label for="exampleInputEmail1" class="form-label">Marks</label>
    <input type="text" class="form-control" name="marks"  value="{{$getRecord->marks}}" required >
    
  </div>
  <div class="form-group col-md-6">
    <label for="exampleInputEmail1" class="form-label">Grade</label>
    <input type="text" class="form-control" value="{{$getRecord->grade}}" name="grade" required>
    
    <div style="color:red">{{$errors->first('grade')}}</div>
  </div>
  <div class="form-group col-md-6">
<label >Term <span style="color:red;"
 class="w3-text-large">
***
    </span></label>
  <select   class="form-control" required
     name="term">
 <option value="">-- Select Term --</option>
      @foreach ($getTerm as $data)
  <option {{(old('term',$getRecord->term)==$data->term)?'selected':''}} value="{{$data->term}}"> {{$data->level_name}}</option>
      @endforeach
  </select>
        </div>
  
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
   
</div>


</div>
 
  </div>
  @endsection
  