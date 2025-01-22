@extends('layouts.app')
@section('content')
 
<div class="card">
  <div class="card-header">Type Of Product Page</div>
  <div class="card-body">
      
      <form action="{{ route('setting.type_of_product.store') }}" method="post">
        @csrf
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Input Code</label></br>
        <input type="text" name="code_input" id="code_input" class="form-control"></br>
      
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@endsection
