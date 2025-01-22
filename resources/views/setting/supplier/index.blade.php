
@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Suppliers</div>
    <div class="card-body">
        <a href="{{ route('setting.supplier.create') }}" class="btn btn-success mb-3">Create Supplier</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered" id="supplier">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Adress</th>
                    <th>Contact no</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->address }}</td>
                    <td>{{ $supplier->contact_no }}</td>
                    <td>
                        <a href="{{ route('setting.supplier.edit', $supplier->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('setting.supplier.destroy', $supplier->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
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
    let table = new DataTable('#supplier');
</script>
    
@endpush
