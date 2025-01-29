@extends('layouts.app')
@section('content')
    <div class="container" style="max-width: 100% !important;">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Type Of Product</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('setting.type_of_product.create') }}" class="btn btn-success btn-sm" title="Add New Type Of Product">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br />
                        <br />
                        <div class="table-responsive">
                            <table class="table w-100" id="myTOP">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($type_of_products as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->code }}</td>
                                            <td>
                                                <!-- View Type Of Product -->
                                                <a href="" title="View Type Of Product">
                                                    <button class="btn btn-warning btn-sm">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </button>
                                                </a>
                                            
                                                <!-- Edit Type Of Product -->
                                                <a href="{{ route('setting.type_of_product.edit', $item->id) }}" title="Edit Type Of Product">
                                                    <button class="btn btn-success btn-sm">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>
                                                </a>
                                            
                                                <!-- Delete Type Of Product -->
                                                <form method="POST" action="{{ route('setting.type_of_product.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Type Of Product" onclick="return confirm('Confirm delete?')">
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
    let table = new DataTable('#myTOP');
</script>
    
@endpush
