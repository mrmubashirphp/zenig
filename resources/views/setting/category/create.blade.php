@extends('layouts.app')
@section('content')
 
<div class="card">
  <div class="card-header">Category Page</div>
  <div class="card-body">
      
      <form action="{{ route('setting.category.store') }}" method="post">
        @csrf
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Code</label></br>
        <input type="text" name="code" id="code" class="form-control"></br>
      
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@endsection
