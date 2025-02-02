@extends('layouts.app')

@section('title', 'Sale Price List')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-6">
                <h1 class="mb-2">Sale Price</h1>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Sale Price List</h4>
                <div class="text-end mb-3">
                <a href="{{ route('saleprice.create') }}" class="btn btn-primary">Create New</a>
            </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center" id="sale-price">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Part No</th>
                                <th>Part Name</th>
                                <th>Model</th>
                                <th>Variance</th>
                                <th>Unit</th>
                                <th>Price/Unit (RM)</th>
                                <th>Effective Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salePrices as $salePrice)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $salePrice->part_no }}</td>
                                    <td>{{ $salePrice->part_name }}</td>
                                    <td>{{ $salePrice->model }}</td>
                                    <td>{{ $salePrice->variance }}</td>
                                    <td>{{ $salePrice->unit }}</td>
                                    <td>{{ number_format($salePrice->price_per_unit, 2) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($salePrice->effective_date)->format('d-m-Y') }}</td>
                                    <td>
                                        <span class="badge {{ strtolower($salePrice->status) === 'in progress' ? 'badge-warning' : (strtolower($salePrice->status) === 'completed' ? 'badge-success' : 'badge-secondary') }}">
                                            inprogress
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('saleprice.show', $salePrice->id) }}" class="btn btn-info btn-sm me-2" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('saleprice.edit', $salePrice->id) }}" class="btn btn-warning btn-sm me-2" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('saleprice.destroy', $salePrice->id) }}" method="POST" class="delete-form" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm me-2" title="Delete" onclick="return confirmDelete(event)">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                           
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#sale-price').DataTable({
                responsive: true
            });
        });

        // SweetAlert for delete confirmation
        function confirmDelete(event) {
            event.preventDefault(); // Prevent form submission

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form if confirmed
                    event.target.closest('form').submit();
                }
            });
        }
    </script>
@endpush