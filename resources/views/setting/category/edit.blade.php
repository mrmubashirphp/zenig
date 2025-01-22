@extends('layouts.app')
@section('content')
 
<div class="card">
  <div class="card-header">Category Edit Page</div>
  <div class="card-body">
      
    <form action="{{ route('setting.category.update', $categories->id) }}" method="post">
      @csrf
      @method("PUT")
      <input type="hidden" name="id" value="{{ $categories->id }}" />
      <label>Name</label></br>
      <input type="text" name="name" value="{{ $categories->name }}" class="form-control"></br>
      <label>Input Code</label></br>
      <input type="text" name="code" value="{{ $categories->code}}" class="form-control"></br>
      <button type="submit" class="btn btn-success">Update</button></br>
  </form>
  
   
  </div>
</div>
@endsection

