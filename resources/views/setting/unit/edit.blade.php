@extends('layouts.app')
@section('content')
 
<div class="card">
  <div class="card-header">Unit Edit Page</div>
  <div class="card-body">
      
    <form action="{{ route('setting.unit.update', $units->id) }}" method="post">
      @csrf
      @method("PUT")
      <input type="hidden" name="id" value="{{ $units->id }}" />
      <label>Name</label></br>
      <input type="text" name="name" value="{{ $units->name }}" class="form-control"></br>
      <label>Input Code</label></br>
      <input type="text" name="code_input" value="{{ $units->code_input }}" class="form-control"></br>
      <button type="submit" class="btn btn-success">Update</button></br>
  </form>
  
   
  </div>
</div>
@endsection

