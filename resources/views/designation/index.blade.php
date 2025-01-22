@extends('layouts.app')

@section('title', 'Designations')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h1>Designations</h1>
            <a href="{{ route('designations.create') }}" class="btn btn-primary">Create Designation</a>
        </div>

      
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <table id="designationsTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($designations as $designation)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $designation->name }}</td>
                        <td>
                            <a href="{{ route('designations.edit', $designation->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('designations.destroy', $designation->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
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
    let table = new DataTable('#designationsTable');
</script>

@endpush
