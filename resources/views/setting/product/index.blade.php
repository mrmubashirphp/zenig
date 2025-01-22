@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Product List</h2>
        <a href="{{ route('setting.product.create') }}" class="btn btn-success">Create Product</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered" id="myTable">
            <thead class="table-dark">
                <tr>
                    <th>Part No</th>
                    <th>Part Name</th>
                    <th>Type of Product</th>
                    <th>Model</th>
                    <th>Category</th>
                    <th>Variance</th>
                    <th>Description</th>
                    <th>MOQ</th>
                    <th>Unit</th>
                    <th>Part Weight</th>
                    <th>Standard Packaging</th>
                    <th>Customer</th>
                    <th>Customer Product Code</th>
                    <th>Have BOM</th>
                    <th width="70px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->part_no }}</td>
                    <td>{{ $product->part_name }}</td>
                    <td>{{ $product->typeOfProduct->name }}</td>
                    <td>{{ $product->model }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->variance }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->moq }}</td>
                    <td>{{ $product->unit->name }}</td>
                    <td>{{ $product->part_weight }}</td>
                    <td>{{ $product->standard_packaging }}</td>
                    <td>{{ $product->customer->name }}</td>
                    <td>{{ $product->customer_product_code }}</td>
                    <td>{{ $product->have_bom ? 'Yes' : 'No' }}</td>
                    <td width="70px">
                        <a href="{{ route('setting.product.edit', $product->id) }}" title="Edit product">
                            <button class="btn btn-success btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </a>
                    
                        <!-- Delete product -->
                        <form method="POST" action="{{ route('setting.product.destroy', $product->id) }}" accept-charset="UTF-8" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete product" onclick="return confirm('Confirm delete?')">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')

<script>
    let table = new DataTable('#myTable');
</script>
    
@endpush
