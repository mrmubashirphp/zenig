@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Area View</h4>
                </div>
                    <div class="card-body">
                        <div class="row my-4">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$area->name}}" id="" disabled>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control" name="code" value="{{$area->code}}" id="" disabled>
                                    @error('code')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group p-3">
                                    <label for="" class="mb-1">Department</label>
                                    <select class="form-select department" name="department" disabled>
                                        <option value="" selected disabled>Select Any One</option>
                                        <option value="product" {{$area->department == 'product' ? 'selected' : ''}}>
                                            Product</option>
                                        <option value="store" {{$area->department == 'store' ? 'selected' : ''}}>Store
                                        </option>
                                        <option value="logistic" {{$area->department == 'logistic' ? 'selected' : ''}}>
                                            Logistic</option>
                                    </select>
                                    @error('department')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group p-2">
                                    <label for="" class="mb-1">Area Rack</label>
                                    <select class="form-select area_rack" name="area_rack[]" multiple disabled>
                                        @php
                                            $ids = json_decode($area->area_rack);
                                        @endphp

                                        @foreach ($area_racks as $area_rack)
                                            <option value="{{$area_rack->id}}" {{ in_array($area_rack->id, $ids) ? 'selected' : '' }}>
                                                {{$area_rack->name}}
                                            </option>
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
                                <a class="btn btn-primary" href="{{route('area.index')}}"><i
                                        class="fa-solid fa-circle-arrow-left px-2"></i> Back</a>
                            </div>
                        </div>
                    </div>
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