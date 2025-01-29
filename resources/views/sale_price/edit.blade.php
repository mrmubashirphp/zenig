@extends('layouts.app')
@section('title', 'Edit Sale Price')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-6">
        <h1 >Edit Sale Price</h1>
</div>
</div>
<div class="row">
            
    </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>Edit Sale Price</h4>
            <div class=" text-end mb-3">
        <a href="{{ route('saleprice.index') }}" class="btn btn-primary">Back to List</a>
    </div>
        </div>
        <div class="card-body">
    <form action="{{ route('saleprice.update', $salePrice->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="part_no" class="form-label">Part No</label>
                <select name="part_no" id="part_no" class="form-control" onchange="updateFields()">
    <option value="">Select Part No</option>
    @foreach ($products as $product)
        <option value="{{ $product->part_no }}" 
            data-id="{{ $product->id }}"
            data-part-name="{{ $product->part_name }}"
            data-model="{{ $product->model }}"
            data-variance="{{ $product->variance }}"
            data-type="{{ $product->typeOfProduct ? $product->typeOfProduct->name : '' }}"
            data-category="{{ $product->category ? $product->category->name : '' }}"
            data-unit="{{ $product->unit ? $product->unit->name : '' }}"
            {{ $product->part_no == $salePrice->part_no ? 'selected' : '' }}>
            {{ $product->part_no }}
        </option>
    @endforeach
</select>




            </div>

            <div class="col-md-3">
                <label for="part_name" class="form-label">Part Name</label>
                <input type="text" name="part_name" id="part_name" class="form-control" value="{{ $salePrice->part_name }}" readonly>
                </div>

            <div class="col-md-3">
                <label for="model" class="form-label">Model</label>
                <input type="text" name="model" id="model" class="form-control" value="{{ $salePrice->model }}" readonly>
                </div>

            <div class="col-md-3">
                <label for="variance" class="form-label">Variance</label>
                <input type="text" name="variance" id="variance" class="form-control" value="{{ $salePrice->variance }}" readonly>
                </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <label for="type" class="form-label">Type of Product</label>
                <input type="text" name="type" id="type" class="form-control"
       value="{{ optional($salePrice->product)->typeOfProduct->name ?? 'N/A' }}" readonly>
                
            </div>

            <div class="col-md-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" name="category" id="category" class="form-control"
                value="{{ optional($salePrice->product)->category->name ?? 'N/A' }}" readonly>
                </div>

            <div class="col-md-3">
                <label for="unit" class="form-label">Unit</label>
                <input type="text" name="unit" id="unit" class="form-control"
                value="{{ optional($salePrice->product)->unit->name ?? 'N/A' }}" readonly>                </div>

            <div class="col-md-3">
                <label for="price_per_unit" class="form-label">Price/Unit (RM)</label>
                <input type="text" name="price_per_unit" id="price_per_unit" class="form-control" value="{{ $salePrice->price_per_unit }}">
                </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <label for="effective_date" class="form-label">Effective Date</label>
                <input type="date" name="effective_date" id="effective_date" class="form-control" value="{{ $salePrice->effective_date ? $salePrice->effective_date->format('Y-m-d') : '' }}">

                </div>
        </div>

        
        <div class="col-12 text-end">
        <button type="submit" class="btn btn-success mt-3">Save</button>
</div>
    </form>
    </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
 function updateFields() {
    const partNoDropdown = document.getElementById('part_no');
    const selectedOption = partNoDropdown.options[partNoDropdown.selectedIndex];

    if (selectedOption.value) {
        document.getElementById('part_name').value = selectedOption.getAttribute('data-part-name') || '';
        document.getElementById('model').value = selectedOption.getAttribute('data-model') || '';
        document.getElementById('variance').value = selectedOption.getAttribute('data-variance') || '';
        document.getElementById('type').value = selectedOption.getAttribute('data-type') || '';
        document.getElementById('category').value = selectedOption.getAttribute('data-category') || '';
        document.getElementById('unit').value = selectedOption.getAttribute('data-unit') || '';
    } else {
        document.getElementById('part_name').value = '';
        document.getElementById('model').value = '';
        document.getElementById('variance').value = '';
        document.getElementById('type').value = '';
        document.getElementById('category').value = '';
        document.getElementById('unit').value = '';
    }
}

document.addEventListener('DOMContentLoaded', function () {
    updateFields();
});

$('#part_no').select2();

</script>

@endpush
