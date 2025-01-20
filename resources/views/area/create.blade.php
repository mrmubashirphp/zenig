@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Area Create</h4>
                </div>

                <form action="{{route('area.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row my-4">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}" id="">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control" name="code" value="{{old('code')}}" id="">
                                    @error('code')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group p-3">
                                    <label for="" class="mb-1">Department</label>
                                    <select class="form-select department" name="department">
                                        <option value="" selected disabled>Select Any One</option>
                                        <option value="product">Product</option>
                                        <option value="store">Store</option>
                                        <option value="logistic">Logistic</option>
                                    </select>
                                    @error('department')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group pt-2">
                                    <label for="" class="mb-1">Area Rack</label>
                                    <select class="form-select area_rack" name="area_rack[]" multiple>
                                        @foreach ($area_racks as $area_rack)
                                            <option value="{{$area_rack->id}}"
                                                @if(old('area_rack')){{in_array($area_rack->id, old('area_rack')) ? 'selected' : ''}} @endif>{{$area_rack->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('area_rack')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-sm-2 float-start">
                                <a class="btn btn-primary" href="{{route('area.rack.index')}}"><i
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
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.area_rack').select2();
        $('.department').select2();
    </script>
@endpush