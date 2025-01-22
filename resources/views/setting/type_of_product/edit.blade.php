@extends('layouts.app')
@section('content')
 
<div class="card">
  <div class="card-header">Type Of Product Edit Page</div>
  <div class="card-body">
      
    <form action="{{ route('setting.type_of_product.update', $type_of_products->id) }}" method="post">
      @csrf
      @method("PUT")
      <input type="hidden" name="id" value="{{ $type_of_products->id }}" />
      <label>Name</label></br>
      <input type="text" name="name" value="{{ $type_of_products->name }}" class="form-control"></br>
      <label>Input Code</label></br>
      <input type="text" name="code_input" value="{{ $type_of_products->code_input }}" class="form-control"></br>
      <button type="submit" class="btn btn-success">Update</button></br>
  </form>
  
   
  </div>
</div>
@endsection

