@extends('layouts.app')

@section('title', 'Order List')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-6">
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="">Order List</h4>
                <div class="text-end">
                <a href="{{ route('order.create') }}" class="btn btn-primary">Create New</a>
        </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center" id="order-list">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Order No</th>
                                <th>PO No</th>
                                <th>Customer Name</th>
                                <th>Created Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->order_no }}</td>
                                    <td>{{ $order->po_no }}</td>
                                    <td>{{ $order->customer->name ?? 'N/A' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</td>
                                    <td>
                                        <span class="badge 
                                            {{ strtolower($order->status) === 'in-progress' ? 'badge-warning' : '' }} 
                                            {{ strtolower($order->status) === 'completed' ? 'badge-success' : '' }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>


                                    <td>
                                        <div class="d-flex justify-content-center">
                                        <a href="{{ route('order.edit', $order->id) }}" class="btn btn-primary btn-sm me-2" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('order.show', $order->id) }}" class="btn btn-success btn-sm me-2" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <form action="{{ route('order.destroy', $order->id) }}" method="POST" class="delete-form" style="display: inline;">
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
            $('#order-list').DataTable({
                responsive: true
            });
        });

        function confirmDelete(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.closest('form').submit();
                }
            });
        }
    </script>
@endpush
