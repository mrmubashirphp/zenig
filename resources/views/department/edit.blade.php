@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Department</h1>

    <form action="{{ route('departments.update', $department->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Department Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $department->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Department</button>
    </form>

    <a href="{{ route('departments.index') }}" class="btn btn-secondary mt-3">Back to Departments</a>
</div>
@endsection
