@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">SUPPLIER CREATE</div>
    <div class="card-body">
        <form action="{{ route('setting.supplier.store') }}" method="POST">
            @csrf

            <!-- Supplier Details Section -->
            <h5>SUPPLIER DETAILS</h5>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" required />
                </div>
                <div class="col-md-4">
                    <label for="address">Address:</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter Address" />
                </div>
                <div class="col-md-4">
                    <label for="contact_no">Contact No:</label>
                    <input type="text" name="contact_no" class="form-control" placeholder="Enter Contact No" />
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="group">Group:</label>
                    <div class="form-check">
                        <input type="radio" name="group" value="Direct" class="form-check-input" />
                        <label class="form-check-label">Direct</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="group" value="Indirect" class="form-check-input" />
                        <label class="form-check-label">Indirect</label>
                    </div>
                </div>
            </div>

            <!-- Contact Person Details Section -->
            <h5>CONTACT PERSON DETAILS</h5>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="contact_person_name">Contact Person Name:</label>
                    <input type="text" name="contact_person_name" class="form-control" placeholder="Enter Name" />
                </div>
                <div class="col-md-4">
                    <label for="telephone">Telephone:</label>
                    <input type="text" name="telephone" class="form-control" placeholder="Enter Telephone" />
                </div>
                <div class="col-md-4">
                    <label for="department">Department:</label>
                    <input type="text" name="department" class="form-control" placeholder="Enter Department" />
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="mobile_phone">Mobile Phone:</label>
                    <input type="text" name="mobile_phone" class="form-control" placeholder="Enter Mobile Phone" />
                </div>
                <div class="col-md-4">
                    <label for="fax">Fax:</label>
                    <input type="text" name="fax" class="form-control" placeholder="Enter Fax" />
                </div>
                <div class="col-md-4">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" />
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
