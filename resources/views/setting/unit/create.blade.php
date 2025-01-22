@extends('layouts.app')
@section('content')
 
<div class="card">
  <div class="card-header">Unit Page</div>
  <div class="card-body">
      
      <form action="{{ route('setting.unit.store') }}" method="post">
        @csrf
        <div class="row g-3 align-items-center">
          <div class="col-md-4">
              <label for="name" class="form-label">Name</label>
              <input type="text" name="name" id="name" class="form-control">
          </div>
          <div class="col-md-4 ">
              <label for="code" class="form-label">Code</label>
              <input type="text" name="code" id="code" class="form-control">
          </div>
      </div>
      
      
        <input type="submit" value="Save" class="btn btn-success m-3"></br>
    </form>
   
  </div>
</div>
 
@endsection
