@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Customers</div>
    <div class="card-body">
        <a href="{{ route('setting.customer.create') }}" class="btn btn-success mb-3">Create Customer</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered" id="customer">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Phone No</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->code }}</td>
                    <td>{{ $customer->phone_no }}</td>
                    <td>
                        <a href="{{ route('setting.customer.edit', $customer->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('setting.customer.destroy', $customer->id) }}" method="POST" style="display:inline;">
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
    let table = new DataTable('#customer');
</script>
    
@endpush
