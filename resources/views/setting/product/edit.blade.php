@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Product</h2>
    <form action="{{ route('setting.product.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- Part No -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="part_no">Part No.</label>
                    <input type="text" name="part_no" id="part_no" class="form-control" value="{{ $product->part_no }}" required>
                </div>
            </div>

            <!-- Part Name -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="part_name">Part Name</label>
                    <input type="text" name="part_name" id="part_name" class="form-control" value="{{ $product->part_name }}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Type of Product -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="type_of_product_id">Type of Product</label>
                    <select name="type_of_product_id" id="type_of_product_id" class="form-control" required>
                        <option value="">Select Type</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" {{ $product->type_of_product_id == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Model -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="model">Model</label>
                    <input type="text" name="model" id="model" class="form-control" value="{{ $product->model }}">
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Category -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Variance -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="variance">Variance</label>
                    <input type="text" name="variance" id="variance" class="form-control" value="{{ $product->variance }}">
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Description -->
            <div class="col-md-12">
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="3">{{ $product->description }}</textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- MOQ -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="moq">MOQ</label>
                    <input type="number" name="moq" id="moq" class="form-control" value="{{ $product->moq }}">
                </div>
            </div>

            <!-- Unit -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="unit_id">Unit</label>
                    <select name="unit_id" id="unit_id" class="form-control" required>
                        <option value="">Select Unit</option>
                        @foreach($units as $unit)
                            <option value="{{ $unit->id }}" {{ $product->unit_id == $unit->id ? 'selected' : '' }}>
                                {{ $unit->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Part Weight -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="part_weight">Part Weight</label>
                    <input type="text" name="part_weight" id="part_weight" class="form-control" value="{{ $product->part_weight }}">
                </div>
            </div>

            <!-- Standard Packaging -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="standard_packaging">Standard Packaging</label>
                    <input type="text" name="standard_packaging" id="standard_packaging" class="form-control" value="{{ $product->standard_packaging }}">
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Customer -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="customer_id">Customer</label>
                    <select name="customer_id" id="customer_id" class="form-control">
                        <option value="">Select Customer</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}" {{ $product->customer_id == $customer->id ? 'selected' : '' }}>
                                {{ $customer->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Customer Product Code -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="customer_product_code">Customer Product Code</label>
                    <input type="text" name="customer_product_code" id="customer_product_code" class="form-control" value="{{ $product->customer_product_code }}">
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Have BOM -->
            <div class="col-md-6">
                <div class="form-check mt-4">
                    <input type="checkbox" name="have_bom" id="have_bom" class="form-check-input" value="1" {{ $product->have_bom ? 'checked' : '' }}>
                    <label class="form-check-label" for="have_bom">Have BOM</label>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Update Product</button>
        </div>
    </form>
</div>
@endsection
