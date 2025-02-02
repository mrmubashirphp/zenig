@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tonage Create</h4>
                </div>

                <form action="{{route('tonage.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row my-4">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tonage">Name</label>
                                    <input type="text" class="form-control" name="tonage" value="{{old('tonage')}}"
                                        id="">
                                </div>
                                @error('tonage')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <a class="btn btn-primary" href="{{route('tonage.index')}}">
                                        <i class="fa-solid fa-circle-arrow-left px-2"></i> Back
                                    </a>
                                </div>
                                <div>
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection