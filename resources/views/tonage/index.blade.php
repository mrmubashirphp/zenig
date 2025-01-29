@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4>Tonage List</h4>
            <div class="text-end mb-2">
                <a class="btn btn-primary" href="{{ route('tonage.create') }}">Create</a>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th class="text-start">Sr</th>
                        <th>Tonage</th>
                        <th class="text-start">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tonages as $tonage)
                        <tr>
                            <td class="text-start">{{$loop->iteration}}</td>
                            <td>{{$tonage->tonage}}</td>
                            <td class="text-start">
                                <a href="{{route('tonage.edit', $tonage->id)}}" class="btn btn-primary btn-sm sharp me-1"><i
                                        class="fas fa-pencil-alt"></i></a>
                                <a href="{{route('tonage.view', $tonage->id)}}" class="btn btn-success btn-sm sharp"><i
                                        class="fa fa-eye"></i></a>
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm sharp delete-btn"
                                    data-id="{{ $tonage->id }}">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="delete-form-{{ $tonage->id }}" action="{{route('tonage.destroy', $tonage->id)}}"
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
</div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            let table = new DataTable('#myTable');

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