@extends('layouts.app')

@section('title', 'Edit Designation')

@section('content')
    <div class="container">
        <h1>Edit Designation</h1>
        <form action="{{ route('designations.update', $designation->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Designation Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $designation->name }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
