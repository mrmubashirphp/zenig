@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">SUPPLIER EDIT</div>
    <div class="card-body">
        <form action="{{ route('setting.supplier.update', $supplier->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Supplier Details Section -->
            <h5>SUPPLIER DETAILS</h5>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="name">Name:</label>
                    <input type="text" name="name" value="{{ $supplier->name }}" class="form-control" required />
                </div>
                <div class="col-md-4">
                    <label for="address">Address:</label>
                    <input type="text" name="address" value="{{ $supplier->address }}" class="form-control" />
                </div>
                <div class="col-md-4">
                    <label for="contact_no">Contact No:</label>
                    <input type="text" name="contact_no" value="{{ $supplier->contact_no }}" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="group">Group:</label>
                    <div class="form-check">
                        <input type="radio" name="group" value="Direct" class="form-check-input" {{ $supplier->group == 'Direct' ? 'checked' : '' }} />
                        <label class="form-check-label">Direct</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="group" value="Indirect" class="form-check-input" {{ $supplier->group == 'Indirect' ? 'checked' : '' }} />
                        <label class="form-check-label">Indirect</label>
                    </div>
                </div>
            </div>

            <!-- Contact Person Details Section -->
            <h5>CONTACT PERSON DETAILS</h5>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="contact_person_name">Contact Person Name:</label>
                    <input type="text" name="contact_person_name" value="{{ $supplier->contact_person_name }}" class="form-control" />
                </div>
                <div class="col-md-4">
                    <label for="telephone">Telephone:</label>
                    <input type="text" name="telephone" value="{{ $supplier->telephone }}" class="form-control" />
                </div>
                <div class="col-md-4">
                    <label for="department">Department:</label>
                    <input type="text" name="department" value="{{ $supplier->department }}" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="mobile_phone">Mobile Phone:</label>
                    <input type="text" name="mobile_phone" value="{{ $supplier->mobile_phone }}" class="form-control" />
                </div>
                <div class="col-md-4">
                    <label for="fax">Fax:</label>
                    <input type="text" name="fax" value="{{ $supplier->fax }}" class="form-control" />
                </div>
                <div class="col-md-4">
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="{{ $supplier->email }}" class="form-control" />
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Supplier</button>
        </form>
    </div>
</div>
@endsection
