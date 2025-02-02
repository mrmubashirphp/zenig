@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">

        <h4>Invoice List</h4>
        <div class="text-end mb-2">
            <a class="btn btn-primary" href="{{route('bd.invoice.create')}}">Create</a>
        </div>
    </div>

    <div class="card-body table-responsive">
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th class="text-start" class="text-start">Sr</th>
                    <th>DO No.</th>
                    <th class="text-start">Invoice No.</th>
                    <th>Create By</th>
                    <th class="text-start">Created Date</th>
                    <th class="text-start">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $invoice)
                    <tr>
                        <td class="text-start">{{$loop->iteration}}</td>
                        <td>{{$invoice->do_no}}</td>
                        <td class="text-start">{{$invoice->invoice_no}}</td>
                        <td>{{$invoice->create_by}}</td>
                        <td class="text-start">{{ \Carbon\Carbon::parse($invoice->date)->format('d-m-Y') }}</td>
                        <td class="text-start">
                            <a href="{{route('bd.invoice.edit', $invoice->id)}}"
                                class="btn btn-primary btn-sm sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                            <a href="{{route('bd.invoice.view', $invoice->id)}}" class="btn btn-success btn-sm sharp"><i
                                    class="fa fa-eye"></i></a>
                            <a href="javascript:void(0);" class="btn btn-danger btn-sm sharp delete-btn"
                                data-id="{{$invoice->id}}">
                                <i class="fa fa-trash"></i>
                            </a>
                            <form id="delete-form-{{$invoice->id}}" action="{{route('bd.invoice.destroy', $invoice->id)}}"
                                method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
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
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize DataTable
            let table = new DataTable('#myTable');

            // Add SweetAlert for delete confirmation
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function () {
                    let id = this.getAttribute('data-id');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById(`delete-form-${id}`).submit();
                        }
                    });
                });
            });
        });
    </script>
@endpush