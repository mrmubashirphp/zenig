@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md">
                            <h4>Area List</h4>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row text-end">
                        <div class="col-md my-3">
                            <a class="btn btn-primary" href="{{ route('area.create') }}">Create</a>
                        </div>
                    </div>
                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Department</th>
                                <th>Area Rack</th>
                                <th class="text-start">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($areas as $area)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$area->name}}</td>
                                    <td>{{$area->code}}</td>
                                    <td>{{$area->department}}</td>
                                    @php
                                        $ids = json_decode($area->area_rack);
                                        $area_racks = App\Models\AreaRack::whereIn('id',$ids)->get();
                                    @endphp
                                    <td>
                                        @foreach ($area_racks as $area_rack)
                                            {{$area_rack->name}} ({{$area_rack->code}})
                                            @if (!$loop->last)
                                                <br>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="text-start">
                                        <a href="{{route('area.edit',$area->id)}}" class="btn btn-primary btn-xs sharp me-1"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <a href="{{route('area.view',$area->id)}}" class="btn btn-success btn-xs sharp"><i class="fa fa-eye"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-danger btn-xs sharp delete-btn"
                                            data-id="{{ $area->id }}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form id="delete-form-{{ $area->id }}" action="{{route('area.destroy',$area->id)}}" method="POST"
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