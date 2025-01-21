@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Area Level Edit</h4>
            </div>

            <form action="{{route('area.level.update', $arealevel->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row my-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" value="{{$arealevel->name}}" name="name" id="">
                            </div>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="code">Code</label>
                                <input type="text" class="form-control" name="code" value="{{$arealevel->code}}" id="">
                            </div>
                            @error('code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-sm-2 float-start">
                            <a class="btn btn-primary" href="{{route('area.level.index')}}"><i
                                    class="fa-solid fa-circle-arrow-left px-2"></i> Back</a>
                        </div>
                        <div class="col-sm-2 offset-8">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection