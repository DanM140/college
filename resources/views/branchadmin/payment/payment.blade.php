@extends('layouts.branchadmin')
@section('branch')
<div class="w3-container">

<div class="w3-panel w3-border">
@include('message')
    <form method="post" action=""> 
        {{csrf_field()}}
<div class="row">
<div class="form-group col-md-6">
    <label for="exampleInputEmail1" class="form-label">Amount</label>
    <input type="number" class="form-control" name="amount"  value="{{$getRecord->amount}}" required >
    
  </div>
  
   
    
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
   
</div>


</div>
 
  </div>
  @endsection
  