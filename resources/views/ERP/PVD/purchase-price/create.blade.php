@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Purchasing Price Registration</h4>
                </div>

                <form action="{{route('pvd.purchase-price.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row my-3">
                            <div class="col-md-4">
                                <div class="form-group pt-2">
                                    <label for="" class="mb-1">Part No</label>
                                    <select class="form-select part_no" name="product_id">
                                        <option value="" selected disabled>Select any Option</option>
                                        @foreach ($products as $product)
                                            <option 
                                                value="{{ $product->id }}"
                                                data-model="{{ $product->model }}" 
                                                data-part_name="{{ $product->part_name }}" 
                                                data-variance="{{ $product->variance }}" 
                                                data-type_of_product_id="{{ $product->typeOfProduct ? $product->typeOfProduct->name : '' }}"  
                                                data-category_id="{{ $product->category ? $product->category->name : '' }}" 
                                                data-unit_id="{{ $product->unit ? $product->unit->name : '' }}"
                                                {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                                {{ $product->part_no }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('part_no')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="model">Model</label>
                                    <input type="text" class="form-control" name="model" value="{{old('model')}}"
                                        id="model">
                                    @error('model')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="part_name">Part Name</label>
                                    <input type="text" class="form-control" name="part_name" value="{{old('part_name')}}"
                                        id="part_name">
                                    @error('part_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="variance">Variance</label>
                                    <input type="text" class="form-control" name="variance" value="{{old('variance')}}"
                                        id="variance">
                                    @error('variance')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="type_of_product">Type Of Product</label>
                                    <input type="text" class="form-control" name="type_of_product" value="{{old('type_of_product')}}"
                                        id="type_of_product">
                                    @error('type_of_product')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <input type="text" class="form-control" name="category" value="{{old('category')}}"
                                        id="category">
                                    @error('category')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="unit">Unit</label>
                                    <input type="text" class="form-control" name="unit" value="{{old('unit')}}"
                                        id="unit">
                                    @error('unit')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price_unit">Price Unit</label>
                                    <input type="text" class="form-control" name="price_unit" value="{{old('price_unit')}}"
                                        id="price_unit">
                                    @error('price_unit')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control" name="date" value="{{old('date')}}"
                                        id="date">
                                    @error('date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-sm-2 float-start">
                                <a class="btn btn-primary" href="{{route('pvd.purchase-price.index')}}"><i
                                        class="fa-solid fa-circle-arrow-left px-2"></i> Back</a>
                            </div>
                            <div class="col-sm-1 offset-9">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
    // Initialize Select2 for better UX
    $(document).ready(function() {
        $('.part_no').select2();

        $('.part_no').on('change', function() {
            const selectedOption = $(this).find(':selected');
            $('#model').val(selectedOption.data('model') || '');
            $('#part_name').val(selectedOption.data('part_name') || '');
            $('#variance').val(selectedOption.data('variance') || '');
            $('#type_of_product').val(selectedOption.data('type_of_product_id') || '');
            $('#category').val(selectedOption.data('category_id') || '');
            $('#unit').val(selectedOption.data('unit_id') || '');
        });
    });
    </script>
@endpush
