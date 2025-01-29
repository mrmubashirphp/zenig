@extends('layouts.app')

@section('title', 'Quotation List')

@section('content')
    <div class="container mt-2">


        <div class="card">

            <div class="row">
                <div class="col-md-6 card-header">
                    <h4 class="mb-0">Quotation List</h4>
                </div>
                <div class="col-md-6 text-end ">
                    <a href="{{ route('ERP.bd.quotation.create') }}" class="btn btn-primary m-4 ">Create New</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="quotation-list">
                        <thead>
                            <tr>
                                <th class="text-start">Sr#</th>
                                <th class="text-start">Quotation Ref no</th>
                                <th>Customer Name</th>
                                <th>Date</th>
                                <th>Created by</th>
                                <th class="text-start">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quotations as $quotation)
                                <tr>
                                    <td class="text-start">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $quotation->ref_no }}</td>
                                    <td>{{ $quotation->customer->name ?? 'N/A' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($quotation->created_at)->format('d-m-Y') }}</td>
                                   <td>{{$quotation->created_by}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('ERP.bd.quotation.show', $quotation->id) }}"
                                             class="btn btn-primary btn-sm me-2" title="show">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                           
                                            </a>
                                            <a href="{{ route('ERP.bd.quotation.edit', $quotation->id) }}"
                                                class="btn btn-warning btn-sm me-2" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('ERP.bd.quotation.destroy', $quotation->id) }}"
                                                method="POST" class="delete-form" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                                                    onclick="return confirmDelete(event)">
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
            $('#quotation-list').DataTable({
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
