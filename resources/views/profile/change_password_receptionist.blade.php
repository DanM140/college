@extends('layouts.receptionist')
@section('resp')
<div class="w3-center">
    <h2 class="w3-center  ">Change Password </h2>
    </div>
<div class="w3-container">
    
    @include('message')
<div class="w3-panel w3-border">

    <form method="post" action=""> 
        {{csrf_field()}}
        <div class="form-group">
        <label  class="form-label">Old Password</label>
    <input type="password" class="form-control" name="old_password" placeholder="Password" required >
  </div>
  <div class="form-group">
        <label  class="form-label">New Password</label>
    <input type="password" class="form-control" name="new_password" placeholder="New Password" required >
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
    </div>
</div>
 
  </div>
  @endsection
  