@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md">
                        <h4>Area Rack List</h4>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row text-end">
                    <div class="col-md my-3">
                        <a class="btn btn-primary" href="{{ route('area.rack.create') }}">Create</a>
                    </div>
                </div>
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-start">Sr</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Area Level</th>
                            <th class="text-start">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($arearacks as $arearack)
                                                <tr>
                                                    <td class="text-start">{{$loop->iteration}}</td>
                                                    <td>{{$arearack->name}}</td>
                                                    <td>{{$arearack->code}}</td>
                                                    @php
                                                        $ids = json_decode($arearack->arealevels);
                                                        $arealevels = App\Models\AreaLevel::whereIn('id', $ids)->get();
                                                    @endphp
                                                    <td>
                                                        @foreach ($arealevels as $arealevel)
                                                            {{$arealevel->name}} ({{$arealevel->code}})
                                                            @if(!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-start">
                                                        <a href="{{route('area.rack.edit', $arearack->id)}}"
                                                            class="btn btn-primary btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="{{route('area.rack.view', $arearack->id)}}"
                                                            class="btn btn-success btn-xs sharp"><i class="fa fa-eye"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-danger btn-xs sharp delete-btn"
                                                            data-id="{{ $arearack->id }}">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $arearack->id }}"
                                                            action="{{ route('area.rack.destroy', $arearack->id) }}" method="POST"
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