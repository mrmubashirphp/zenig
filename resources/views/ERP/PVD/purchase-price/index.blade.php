@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="flex justify-content-between">
                        <div class="col-md">
                            <h4>Purchase Price</h4>
                        </div>
                        <div class="col-md">
                            <a class="btn btn-primary" href="">Create</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th class="text-start">Sr</th>
                        <th>Part No.</th>
                        <th>Part Name</th>
                        <th>Unit</th>
                        <th>Price/Unit (RM)</th>
                        <th>Effective Date</th>
                        <th>Status</th>
                        <th class="text-start">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-start">
                            <a href="" class="btn btn-primary btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                            <a href="" class="btn btn-success btn-xs sharp"><i class="fa fa-eye"></i></a>
                            <a href="javascript:void(0);" class="btn btn-danger btn-xs sharp delete-btn"
                                data-id="">
                                <i class="fa fa-trash"></i>
                            </a>
                            <form id="delete-form" action="" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
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