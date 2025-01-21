@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Area Rack Edit</h4>
                </div>

                <form action="{{route('area.rack.update', $arearack->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row my-4">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$arearack->name}}"
                                        id="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control" name="code" value="{{$arearack->code}}"
                                        id="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group py-3">
                                    <label for="" class="mb-1">Area Level</label>
                                    <select class="form-select arealevel" name="arealevel[]" multiple>
                                        @php
                                            $ids = json_decode($arearack->arealevels);
                                        @endphp

                                        @foreach ($arealevels as $arealevel)
                                            <option value="{{$arealevel->id}}" {{ in_array($arealevel->id, $ids) ? 'selected' : '' }}>
                                                {{$arealevel->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-sm-2 float-start">
                                <a class="btn btn-primary" href="{{route('area.rack.index')}}"><i
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

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.arealevel').select2();
    </script>
@endpush