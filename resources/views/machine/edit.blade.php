@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Machine Edit</h4>
                </div>

                <form action="{{route('machine.update',$machine->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row my-4">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$machine->name}}" id="">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control" name="code" value="{{$machine->code}}" id="">
                                    @error('code')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group pt-2">
                                    <label for="" class="mb-1">Tonage</label>
                                    <select class="form-select tonage" name="tonage[]" multiple>
                                        @php
                                            $ids = json_decode($machine->tonage)
                                        @endphp
                                        @foreach ($tonages as $tonage)
                                            <option value="{{$tonage->id}}"
                                                {{in_array($tonage->id, $ids ) ? 'selected' : ''}}>{{$tonage->tonage}}
                                                </option>
                                        @endforeach
                                    </select>
                                    @error('tonage')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group p-2">
                                    <label for="" class="mb-1">Category</label>
                                    <select class="form-select category" name="category">
                                        <option value="" selected disabled>Select Any One</option>
                                        <option value="big" {{$machine->category == 'big' ? 'selected' : ''}} >Big</option>
                                        <option value="small"  {{$machine->category == 'small' ? 'selected' : ''}} >Small</option>
                                    </select>
                                    @error('category')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-sm-2 float-start">
                                <a class="btn btn-primary" href="{{route('machine.index')}}"><i
                                        class="fa-solid fa-circle-arrow-left px-2"></i> Back</a>
                            </div>
                            <div class="col-sm-1 offset-9">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.tonage').select2();
        $('.department').select2();
    </script>
@endpush