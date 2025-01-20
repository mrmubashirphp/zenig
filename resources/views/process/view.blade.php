@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Process Create</h4>
            </div>
            <div class="card-body">
                <div class="row my-4">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$process->name}}" id="" disabled>
                        </div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" class="form-control" name="code" value="{{$process->code}}" id="" disabled>
                        </div>
                        @error('code')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control"
                            id="description" disabled>{{$process->description}}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-sm-2 float-start">
                        <a class="btn btn-primary" href="{{route('process.index')}}"><i
                                class="fa-solid fa-circle-arrow-left px-2"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection