@extends('layouts.app')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4>Type Of Regiction Create</h4>
        </div>

        <form action="{{route('type.store')}}" method="post">
            @csrf
            <div class="card-body">
                <div class="row my-4">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="type" value="{{old('type')}}" id="">
                        </div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-sm-2 float-start">
                        <a class="btn btn-primary" href="{{route('type.index')}}"><i
                                class="fa-solid fa-circle-arrow-left px-2"></i> Back</a>
                    </div>
                    <div class="col-sm-1 offset-9">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection