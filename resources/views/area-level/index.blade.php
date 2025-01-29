@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Area Level List</h4>
                <div class="text-end mb-2">
                    <a class="btn btn-primary" href="{{ route('area.level.create') }}">Create</a>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-start">Sr</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th class="text-start">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($arealevels as $arealevel)
                            <tr>
                                <td class="text-start">{{$loop->iteration}}</td>
                                <td>{{$arealevel->name}}</td>
                                <td>{{$arealevel->code}}</td>
                                <td class="text-start">
                                    <a href="{{route('area.level.edit', $arealevel->id)}}"
                                        class="btn btn-primary btn-sm sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="{{route('area.level.view', $arealevel->id)}}"
                                        class="btn btn-success btn-sm sharp"><i class="fa fa-eye"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm sharp delete-btn"
                                        data-id="{{ $arealevel->id }}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="delete-form-{{ $arealevel->id }}"
                                        action="{{ route('area.level.destroy', $arealevel->id) }}" method="POST"
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