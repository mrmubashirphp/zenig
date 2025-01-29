@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Puchase Price</h4>
        <div class="text-end mb-2">
            <a class="btn btn-primary" href="{{route('pvd.purchase-price.create')}}">Create</a>
        </div>
    </div>

    <div class="card-body table-responsive">
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th class="text-start" class="text-start">Sr</th>
                    <th>Part No.</th>
                    <th>Part Name</th>
                    <th>Unit</th>
                    <th class="text-start">Price/Unit (RM)</th>
                    <th class="text-start">Effective Date</th>
                    <th>Status</th>
                    <th class="text-start">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchaseprices as $purchaseprice)
                    <tr>
                        <td class="text-start">{{$loop->iteration}}</td>
                        <td>{{$purchaseprice->product->part_no}}</td>
                        <td>{{$purchaseprice->product->part_name}}</td>
                        <td>{{$purchaseprice->product->unit->name}}</td>
                        <td class="text-start">{{$purchaseprice->price}}</td>
                        <td class="text-start">{{ \Carbon\Carbon::parse($purchaseprice->date)->format('d-m-Y') }}</td>
                        <td>
                            <button class="btn btn-success btn-xs rounded-pill" disabled>{{$purchaseprice->status}}</button>
                        </td>
                        <td class="text-start">
                            <a href="{{route('pvd.purchase-price.edit', $purchaseprice->id)}}"
                                class="btn btn-primary btn-sm sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                            <a href="{{route('pvd.purchase-price.view', $purchaseprice->id)}}"
                                class="btn btn-success btn-sm sharp"><i class="fa fa-eye"></i></a>
                            <a href="javascript:void(0);" class="btn btn-danger btn-sm sharp delete-btn"
                                data-id="{{ $purchaseprice->id }}">
                                <i class="fa fa-trash"></i>
                            </a>
                            <form id="delete-form-{{ $purchaseprice->id }}"
                                action="{{route('pvd.purchase-price.destroy', $purchaseprice->id)}}" method="POST"
                                style="display: none;">
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