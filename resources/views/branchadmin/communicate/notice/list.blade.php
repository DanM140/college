
@extends('layouts.branchadmin')
@section('branch')

  
  <div class="w3-panel">
    
    @include('message')
    <div><h1>NoticeBoard</h1></div>
  <div class="table-responsive">
  <a href="{{url('branchadmin/communicate/notice/add')}}" class="w3-right w3-button w3-blue">Add new  Notice </a>
  <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
    <th>#
      </th>
      <th>Title
      </th>
      <th>Notice Date
      </th>
      <th>Publish Date
      </th>
     
      <th>Message To
      </th>
      <th>Created Date
      </th>
     <th>Action</th>
    </tr>
  </thead>
  <tbody>

  </tbody>
  <tfoot>
    <tr>
    <th>#
      </th>
      <th>Title
      </th>
      <th>Notice Date
      </th>
      <th>Publish Date
      </th>
     
      <th>Message To
      </th>
      <th>Created Date
      </th>
     <th>Action</th>
    </tr>
  </tfoot>
</table>

</div>
  </div>
  <hr>
@endsection

  

  