@extends('layouts.app')

@section('title', 'Staff Management')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h2 class="mb-4">Staff Management</h2>
        <a href="{{ route('staff.create') }}" class="btn btn-primary mb-3">Add New Staff</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="staff-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>User Name</th>
                    <th>Email Address</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($staff as $staffMember)
                <tr>
                    <td>{{ $staffMember->id }}</td> 
                        <td>{{ $staffMember->full_name }}</td> 
                        <td>{{ $staffMember->user_name }}</td>
                        <td>{{ $staffMember->email }}</td>
                        <td>{{ $staffMember->is_active ? 'Yes' : 'No' }}</td>
                        <td class="text-center">
                        <a href="{{ route('staff.show', $staffMember->id) }}" class="btn btn-success btn-sm" title="View">
                            <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('staff.edit', $staffMember->id) }}" class="btn btn-warning btn-sm" title="Edit">
                            <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('staff.destroy', $staffMember->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this staff member?');">
                            @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                <i class="fas fa-trash"></i>
                                </button>
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
    let table = new DataTable('#staff-table');
</script>
@endpush