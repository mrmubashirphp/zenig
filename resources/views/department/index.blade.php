@extends('layouts.app')
@section('title', 'Department List')
@section('content')
<div class="container">
<div class="d-flex justify-content-between align-items-center mb-5">
    <h1 class="mb-4">Departments</h1>
    <a href="{{ route('departments.create') }}" class="btn btn-primary mb-4 ">Create Department</a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

   

    <table class="table table-bordered" id="departments-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $department->name }}</td>
                    <td>
                        <a href="{{ route('departments.edit', $department) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('departments.destroy', $department) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@push('scripts')

<script>
    let table = new DataTable('#departments-table');
</script>

@endpush