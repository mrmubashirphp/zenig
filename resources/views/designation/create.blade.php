@extends('layouts.app')

@section('title', 'Create Designation')

@section('content')
    <div class="container">
        <h1>Create Designation</h1>
        <form action="{{ route('designations.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Designation Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
