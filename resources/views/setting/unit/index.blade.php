@extends('layouts.app')
@section('content')
    <div class="container" style="max-width: 100% !important;">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Unit</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('setting.unit.create') }}" class="btn btn-success btn-sm" title="Add New unit">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br />
                        <br />
                        <div class="table-responsive">
                            <table class="table w-100" id="unit">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Input Code</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($units as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->code_input }}</td>
                                            <td>
                                                <!-- View Unit -->
                                                <a href="" title="View Unit">
                                                    <button class="btn btn-warning btn-sm">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </button>
                                                </a>
                                            
                                                <!-- Edit Unit -->
                                                <a href="{{ route('setting.unit.edit', $item->id) }}" title="Edit Unit">
                                                    <button class="btn btn-success btn-sm">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>
                                                </a>
                                            
                                                <!-- Delete Unit -->
                                                <form method="POST" action="{{ route('setting.unit.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Unit" onclick="return confirm('Confirm delete?')">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
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
    </div>
@endsection
@push('scripts')

<script>
    let table = new DataTable('#unit');
</script>
    
@endpush

