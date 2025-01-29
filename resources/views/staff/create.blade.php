@extends('layouts.app')

@section('title', 'Add New Staff')

@section('content')
<div class="container">
    <h2 class="mb-4">Staff Registration</h2>
    <div class="text-end">
        <a href="{{ route('staff.index') }}" class="btn btn-success">Back</a>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('staff.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group col-md-3 mb-3">
                <label for="code">Code</label>
                <input type="text" class="form-control" id="code" name="code" required>
            </div>
            <div class="form-group col-md-3 mb-3">
                <label for="full_name">Full Name</label>
                <input type="text" class="form-control" id="full_name" name="full_name" required>
            </div>
            <div class="form-group col-md-3 mb-3">
                <label for="user_name">User Name</label>
                <input type="text" class="form-control" id="user_name" name="user_name" required>
            </div>
            <div class="form-group col-md-3 mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
        </div>
        <div class="row">
    <div class="form-group col-md-3 mb-3">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <!-- Department Dropdown -->
    <div class="form-group col-md-3 mb-3">
        <label for="department">Department</label>
        <select class="form-control" id="department" name="department">
            <option value="">Select Department</option>
            @foreach ($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Designation Dropdown -->
    <div class="form-group col-md-3 mb-3">
        <label for="designation">Designation</label>
        <select class="form-control" id="designation" name="designation">
            <option value="">Select Designation</option>
            @foreach ($designations as $designation)
                <option value="{{ $designation->id }}">{{ $designation->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Role Dropdown -->
    <div class="form-group col-md-3 mb-3">
    <label for="role">Role</label>
    <select class="form-control" id="role" name="role[]" multiple>
     
 <option value="">Admin</option>
 <option value="">User</option>
 
    </select>
</div>

</div>


        <div class="form-check mb-3">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1">
            <label class="form-check-label" for="is_active">Is Active</label>
        </div>

        <!-- Tab Navigation -->
        <ul class="nav nav-tabs mb-3" id="crudTabs">
            <li class="nav-item">
                <a class="nav-link active" href="#personal" data-bs-toggle="tab">Personal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#family" data-bs-toggle="tab">Family</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#bank" data-bs-toggle="tab">Bank Detail</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#more" data-bs-toggle="tab">More</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">
            <!-- Personal Tab Content -->
            <div class="tab-pane fade show active" id="personal">
            <div class="container">
        <div id="crudRows">
            <!-- Row 1 -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="gender">Gender</label>
                    <select class="form-control select2" id="gender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="marital_status">Marital Status</label>
                    <select class="form-control select2" id="marital_status" name="marital_status" required>
                        <option value="">Select Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Widowed">Widowed</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="passport">Passport</label>
                    <input type="text" class="form-control" id="passport" name="passport" placeholder="Enter Passport Number" required>
                </div>
                <div class="col-md-3">
                    <label for="passport_expiry">Expiry Date</label>
                    <input type="date" class="form-control" id="passport_expiry" name="passport_expiry" required>
                </div>
            </div>

            <!-- Row 2 -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
                </div>
                <div class="col-md-3">
                    <label for="ethnic">Ethnic</label>
                    <input type="text" class="form-control" id="ethnic" name="ethnic" placeholder="Enter Ethnicity" required>
                </div>
                <div class="col-md-3">
                    <label for="immigration_no">Immigration No</label>
                    <input type="text" class="form-control" id="immigration_no" name="immigration_no" placeholder="Enter Immigration No" required>
                </div>
                <div class="col-md-3">
                    <label for="immigration_expiry">Expiry Date</label>
                    <input type="date" class="form-control" id="immigration_expiry" name="immigration_expiry" required>
                </div>
            </div>

            <!-- Row 3 -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="dob">DOB</label>
                    <input type="date" class="form-control" id="dob" name="dob" required>
                </div>
                <div class="col-md-3">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" id="age" name="age" placeholder="Enter Age" required>
                </div>
                <div class="col-md-3">
                    <label for="permit_no">Permit No</label>
                    <input type="text" class="form-control" id="permit_no" name="permit_no" placeholder="Enter Permit No" required>
                </div>
                <div class="col-md-3">
                    <label for="permit_expiry">Expiry Date</label>
                    <input type="date" class="form-control" id="permit_expiry" name="permit_expiry" required>
                </div>
            </div>

            <!-- Row 4 -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="phone">Phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" required>
                </div>
                <div class="col-md-3">
                    <label for="mobile">Mobile</label>
                    <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number" required>
                </div>
                <div class="col-md-3">
                    <label for="epf_no">EPF No</label>
                    <input type="text" class="form-control" id="epf_no" name="epf_no" placeholder="Enter EPF No" required>
                </div>
                <div class="col-md-3">
                    <label for="sosco">Sosco</label>
                    <input type="text" class="form-control" id="sosco" name="sosco" placeholder="Enter Sosco" required>
                </div>
            </div>

            <!-- Row 5 -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="nric">NRIC</label>
                    <input type="text" class="form-control" id="nric" name="nric" placeholder="Enter NRIC" required>
                </div>
                <div class="col-md-3">
                    <label for="nationality">Nationality</label>
                    <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Enter Nationality" required>
                </div>
                <div class="col-md-3">
                    <label for="tin">Tax Identification No (TIN)</label>
                    <input type="text" class="form-control" id="tin" name="tin" placeholder="Enter TIN" required>
                </div>
                <div class="col-md-3">
                    <label for="base_salary">Base Salary (RM)</label>
                    <input type="number" class="form-control" id="base_salary" name="base_salary" placeholder="Enter Base Salary" required>
                </div>
            </div>
        </div>
</div>

            </div>

            <!-- Family Tab Content -->
            <div class="tab-pane fade" id="family">
            <div class="container">
    <h4 class="mb-3">Spouse Details:</h4>
        <!-- Spouse Details -->
        <div id="spouseDetails">
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="spouse_name">Spouse Name</label>
                    <input type="text" class="form-control" id="spouse_name" name="spouse_name" placeholder="Enter Spouse Name" required>
                </div>
                <div class="col-md-3">
                    <label for="spouse_nric">NRIC</label>
                    <input type="text" class="form-control" id="spouse_nric" name="spouse_nric" placeholder="Enter NRIC" required>
                </div>
                <div class="col-md-3">
                    <label for="spouse_passport">Passport</label>
                    <input type="text" class="form-control" id="spouse_passport" name="spouse_passport" placeholder="Enter Passport" required>
                </div>
                <div class="col-md-3">
                    <label for="spouse_passport_expiry">Passport Expiry</label>
                    <input type="date" class="form-control" id="spouse_passport_expiry" name="spouse_passport_expiry" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="spouse_dob">DOB</label>
                    <input type="date" class="form-control" id="spouse_dob" name="spouse_dob" required>
                </div>
                <div class="col-md-3">
                    <label for="spouse_age">Age</label>
                    <input type="number" class="form-control" id="spouse_age" name="spouse_age" placeholder="Enter Age" required>
                </div>
                <div class="col-md-3">
                    <label for="spouse_permit_no">Permit No</label>
                    <input type="text" class="form-control" id="spouse_permit_no" name="spouse_permit_no" placeholder="Enter Permit No" required>
                </div>
                <div class="col-md-3">
                    <label for="spouse_permit_expiry">Permit Expiry</label>
                    <input type="date" class="form-control" id="spouse_permit_expiry" name="spouse_permit_expiry" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="spouse_address">Address</label>
                    <textarea class="form-control" id="spouse_address" name="spouse_address" placeholder="Enter Address" required></textarea>
                </div>
            </div>
        </div>
        <!-- Child Details -->
        <div id="childDetails">
            <h4 class="mb-3">Children Details:</h4>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="children_no">Number of Children</label>
                    <input type="number" class="form-control" id="children_no" name="children_no" placeholder="Enter Number of Children" required>
                </div>
            </div>
        </div>
</div>

            </div>

            <!-- Bank Detail Tab Content -->
            <div class="tab-pane fade" id="bank">
            <div class="container">
    <h4 class="mb-3">Bank Details :</h4>
        <div id="crudRows">
            <!-- Row 1 -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="bank_name">Bank</label>
                    <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Enter Bank Name" required>
                </div>
                <div class="col-md-3">
                    <label for="account_no">Account No</label>
                    <input type="text" class="form-control" id="account_no" name="account_no" placeholder="Enter Account Number" required>
                </div>
                <div class="col-md-3">
                    <label for="account_type">Account Type</label>
                    <select class="form-control" id="account_type" name="account_type" required>
                        <option value="">Select Account Type</option>
                        <option value="savings">Savings</option>
                        <option value="current">Current</option>
                        <option value="fixed">Fixed Deposit</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="branch">Branch</label>
                    <input type="text" class="form-control" id="branch" name="branch" placeholder="Enter Branch" required>
                </div>
            </div>
            <!-- Row 2 -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="account_status">Account Status</label>
                    <select class="form-control" id="account_status" name="account_status" required>
                        <option value="">Select Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>
        </div>
</div>

            </div>

            <!-- More Tab Content -->
            <div class="tab-pane fade" id="more">
                <h4 class="mb-3">Emergency Contact:</h4>
                    <div id="crudRows">
                        <!-- Emergency Contact Row 1 -->
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="emergency_name">Name</label>
                                <input type="text" class="form-control" id="emergency_name" name="emergency_name" placeholder="Enter Emergency Contact Name" required>
                            </div>
                            <div class="col-md-3">
                                <label for="relationship">Relationship</label>
                                <input type="text" class="form-control" id="relationship" name="relationship" placeholder="Enter Relationship" required>
                            </div>
                            <div class="col-md-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
                            </div>
                            <div class="col-md-3">
                                <label for="phone_no">Phone No</label>
                                <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Enter Phone Number" required>
                            </div>
                        </div>

                        <!-- Leave Details -->
                        <h4>Leave Details:</h4>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="annual_leave">Annual Leave</label>
                                <input type="date" class="form-control" id="annual_leave" name="annual_leave" required>
                            </div>
                            <div class="col-md-3">
                                <label for="annual_balance">Balance (Days)</label>
                                <input type="number" class="form-control" id="annual_balance" name="annual_balance" placeholder="Enter Balance Days" required>
                            </div>
                            <div class="col-md-3">
                                <label for="carried_leave">Carried Leave</label>
                                <input type="number" class="form-control" id="carried_leave" name="carried_leave" placeholder="Enter Carried Leave" required>
                            </div>
                            <div class="col-md-3">
                                <label for="carried_balance">Balance (Days)</label>
                                <input type="number" class="form-control" id="carried_balance" name="carried_balance" placeholder="Enter Balance Days" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="medical_leave">Medical Leave</label>
                                <input type="date" class="form-control" id="medical_leave" name="medical_leave" required>
                            </div>
                            <div class="col-md-3">
                                <label for="medical_balance">Balance (Days)</label>
                                <input type="number" class="form-control" id="medical_balance" name="medical_balance" placeholder="Enter Balance Days" required>
                            </div>
                            <div class="col-md-3">
                                <label for="unpaid_leave">Unpaid Leave</label>
                                <input type="number" class="form-control" id="unpaid_leave" name="unpaid_leave" placeholder="Enter Unpaid Leave" required>
                            </div>
                            <div class="col-md-3">
                                <label for="unpaid_balance">Balance (Days)</label>
                                <input type="number" class="form-control" id="unpaid_balance" name="unpaid_balance" placeholder="Enter Balance Days" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="total_leave_days">Rate per Month (Total Days)</label>
                                <input type="number" class="form-control" id="total_leave_days" name="total_leave_days" placeholder="Enter Total Days" required>
                            </div>
                            <div class="col-md-3">
                                <label for="charges_exceeded">Charges if Exceeded (RM)</label>
                                <input type="number" class="form-control" id="charges_exceeded" name="charges_exceeded" placeholder="Enter Charges" required>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Save Staff</button>
        </div>
    </form>
</div>
@endsection  