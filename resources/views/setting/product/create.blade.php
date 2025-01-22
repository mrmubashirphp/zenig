@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Create Product</h2>
    <form action="{{ route('setting.product.store') }}" method="POST">
        @csrf

        <div class="row">
            <!-- Part No -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="part_no">Part No.</label>
                    <input type="text" name="part_no" id="part_no" class="form-control" required>
                </div>
            </div>

            <!-- Part Name -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="part_name">Part Name</label>
                    <input type="text" name="part_name" id="part_name" class="form-control" required>
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
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Model -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="model">Model</label>
                    <input type="text" name="model" id="model" class="form-control">
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
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Variance -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="variance">Variance</label>
                    <input type="text" name="variance" id="variance" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Description -->
            <div class="col-md-12">
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- MOQ -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="moq">MOQ</label>
                    <input type="number" name="moq" id="moq" class="form-control">
                </div>
            </div>

            <!-- Unit -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="unit_id">Unit</label>
                    <select name="unit_id" id="unit_id" class="form-control" required>
                        <option value="">Select Unit</option>
                        @foreach($units as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
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
                    <input type="number" name="part_weight" id="part_weight" class="form-control">
                </div>
            </div>

            <!-- Standard Packaging -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="standard_packaging">Standard Packaging</label>
                    <input type="text" name="standard_packaging" id="standard_packaging" class="form-control">
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
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Customer Product Code -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="customer_product_code">Customer Product Code</label>
                    <input type="text" name="customer_product_code" id="customer_product_code" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Have BOM -->
            <div class="col-md-6">
                <div class="form-check mt-4">
                    <input type="checkbox" name="have_bom" id="have_bom" class="form-check-input" value="1">
                    <label class="form-check-label" for="have_bom">Have BOM</label>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Save Product</button>
        </div>
    </form>
</div>
@endsection
