@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Create Customer</div>
    <div class="card-body">
        <form action="{{ route('setting.customer.store') }}" method="POST">
            @csrf
            <h5 class="mb-3">CUSTOMER DETAILS</h5>
            <div class="row">
                <div class="col-md-6">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="code">Code</label>
                    <input type="text" name="code" id="code" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="phone_no">Phone No</label>
                    <input type="text" name="phone_no" id="phone_no" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" class="form-control"></textarea>
                </div>
            </div>

            <h5 class="mt-4 mb-3">PIC DETAILS</h5>
            <div class="row">
                <div class="col-md-6">
                    <label for="pic_name">PIC Name</label>
                    <input type="text" name="pic_name" id="pic_name" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="pic_department">PIC Department</label>
                    <input type="text" name="pic_department" id="pic_department" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="pic_phone_work">PIC Phone No (Work)</label>
                    <input type="text" name="pic_phone_work" id="pic_phone_work" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="pic_phone_mobile">PIC Phone No (Mobile)</label>
                    <input type="text" name="pic_phone_mobile" id="pic_phone_mobile" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="pic_fax">PIC Fax</label>
                    <input type="text" name="pic_fax" id="pic_fax" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="pic_email">PIC Email</label>
                    <input type="email" name="pic_email" id="pic_email" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="payment_term">Payment Term</label>
                    <input type="text" name="payment_term" id="payment_term" class="form-control">
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('setting.customer.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
