@extends('layouts.student')
@section('student')
<div class="w3-container">
    <div class="w3-center">
    <h1>Register Current Term</h1>
    </div>

<div class="w3-panel w3-border">
@include('message')
    <form method="post" action=""> 
        {{csrf_field()}}
      <div class="row">
      <div class="form-group col-md-6">
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
      </div> 
        
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</div>
 
  </div>
  @endsection
  