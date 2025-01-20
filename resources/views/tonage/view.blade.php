@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tonage Edit</h4>
                </div>
                <div class="card-body">
                    <div class="row my-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tonage">Name</label>
                                <input type="text" class="form-control" name="tonage" value="{{$tonage->tonage}}" id="" disabled>
                            </div>
                            @error('tonage')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-sm-2 float-start">
                            <a class="btn btn-primary" href="{{route('tonage.index')}}"><i
                                    class="fa-solid fa-circle-arrow-left px-2"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection