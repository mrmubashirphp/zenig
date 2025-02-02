@extends('layouts.app')

@section('title', 'Sale Price Details')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Sale Price Information</h4>
            <a href="{{ route('saleprice.index') }}" class="btn btn-secondary mb-2">Back to List</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Part No:</strong> {{ $salePrice->part_no }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Part Name:</strong> {{ $salePrice->part_name }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <p><strong>Model:</strong> {{ $salePrice->model }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Variance:</strong> {{ $salePrice->variance }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <p><strong>Unit:</strong> {{ $salePrice->unit }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Price per Unit (RM):</strong> RM {{ number_format($salePrice->price_per_unit, 2) }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <p><strong>Effective Date:</strong> {{ $salePrice->effective_date->format('Y-m-d') }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Status:</strong> {{ $salePrice->status }}</p>
                </div>
            </div>

            <!-- Display Product Details -->
            <div class="row ">
                <div class="col-md-6">
                    <p><strong>Product Type:</strong> {{ $salePrice->product->typeOfProduct ? $salePrice->product->typeOfProduct->name : 'N/A' }}</p>
                    
                </div>
                <div class="col-md-6">
                <p><strong>Category:</strong> {{ $salePrice->product->category ? $salePrice->product->category->name : 'N/A' }}</p>
            </div></div>
        </div>
    </div>
</div>
@endsection
