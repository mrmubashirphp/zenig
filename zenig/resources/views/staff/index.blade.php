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
                @forelse($staff as $staffMember)
                    <tr>
                        <td>{{ $staffMember->id }}</td> 
                        <td>{{ $staffMember->full_name }}</td> 
                        <td>{{ $staffMember->user_name }}</td>
                        <td>{{ $staffMember->email }}</td>
                        <td>{{ $staffMember->is_active ? 'Yes' : 'No' }}</td>
                        <td>
                        <a href="{{ route('staff.edit', $staffMember->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('staff.destroy', $staffMember->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this staff member?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No staff members found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
