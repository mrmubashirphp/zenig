@extends('layouts.app')

@section('title', 'View Staff')

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


    <div class="row">
        <div class="form-group col-md-3 mb-3">
            <label for="code">Code</label>
            <input type="text" class="form-control" id="code" name="code" value="{{ $staff->code }}" required>
        </div>
        <div class="form-group col-md-3 mb-3">
            <label for="full_name">Full Name</label>
            <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $staff->full_name }}" required>
        </div>
        <div class="form-group col-md-3 mb-3">
            <label for="user_name">User Name</label>
            <input type="text" class="form-control" id="user_name" name="user_name" value="{{ $staff->user_name }}" required disabled>
        </div>
        <div class="form-group col-md-3 mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $staff->email }}" required>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-3 mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="{{ $staff->password }}" required>
        </div>
        <div class="form-group col-md-3 mb-3">
            <label for="department">Department</label>
            <select class="form-control" id="department" name="department">
                <option value="" disabled>Select Department</option>
                <option value="IT" {{ $staff->department == 'IT' ? 'selected' : '' }}>IT</option>
                <option value="HR" {{ $staff->department == 'HR' ? 'selected' : '' }}>HR</option>
            </select>
        </div>
        <div class="form-group col-md-3 mb-3">
            <label for="designation">Designation</label>
            <select class="form-control" id="designation" name="designation">
                <option value="" disabled>Select Designation</option>
                <option value="Manager" {{ $staff->designation == 'Manager' ? 'selected' : '' }}>Manager</option>
                <option value="Developer" {{ $staff->designation == 'Developer' ? 'selected' : '' }}>Developer</option>
            </select>
        </div>

        
    </div>
        <!-- <div class="form-group">
    <label for="role">Role</label>
    <select class="form-control" id="role" name="role">
        <option value="">Select a role</option>
        <option value="">Admin</option>
        <option value="">IUser</option>
    </select>
</div> -->


    
<div class="form-check mb-3">
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ $staff->is_active ? 'checked' : '' }}>
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
                            <select class="form-control select2" id="gender" name="gender" value="{{ $staff->personalData->gender }}" required>
                                <option value="">Select Gender</option>
                                <option value="Male" {{$staff->personalData->gender == 'Male' ? 'selected' : ''}}>Male</option>
                                <option value="Female" {{$staff->personalData->gender == 'Female' ? 'selected' : ''}}>Female</option>
                                <option value="Other" {{$staff->personalData->gender == 'Other' ? 'selected' : ''}}>Other</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="marital_status">Marital Status</label>
                            <select class="form-control select2" id="marital_status" name="marital_status" value="" required>
                                <option value="">Select Status</option>
                                <option value="Single" {{$staff->personalData->marital_status == 'Single' ? 'selected' : ''}}>Single</option>
                                <option value="Married" {{$staff->personalData->marital_status == 'Married' ? 'selected' : ''}}>Married</option>
                                <option value="Divorced" {{$staff->personalData->marital_status == 'Divorced' ? 'selected' : ''}}>Divorced</option>
                                <option value="Widowed" {{$staff->personalData->marital_status == 'Widowed' ? 'selected' : ''}}>Widowed</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="passport">Passport</label>
                            <input type="text" class="form-control" id="passport" name="passport" placeholder="Enter Passport Number" value="{{ $staff->personalData->passport }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="passport_expiry">Expiry Date</label>
                            <input type="date" class="form-control" id="passport_expiry" name="passport_expiry" value="{{ $staff->personalData->passport_expiry }}" required>
                        </div>
                    </div>

                    <!-- Row 2 -->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="{{ $staff->personalData->address }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="ethnic">Ethnic</label>
                            <input type="text" class="form-control" id="ethnic" name="ethnic" placeholder="Enter Ethnicity" value="{{ $staff->personalData->ethnic }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="immigration_no">Immigration No</label>
                            <input type="text" class="form-control" id="immigration_no" name="immigration_no" placeholder="Enter Immigration No" value="{{ $staff->personalData->immigration_no }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="immigration_expiry">Expiry Date</label>
                            <input type="date" class="form-control" id="immigration_expiry" name="immigration_expiry" value="{{ $staff->personalData->immigration_expiry }}" required>
                        </div>
                    </div>

                    <!-- Row 3 -->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="dob">DOB</label>
                            <input type="date" class="form-control" id="dob" name="dob" value="{{ $staff->personalData->dob }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" id="age" name="age" placeholder="Enter Age" value="{{ $staff->personalData->age }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="permit_no">Permit No</label>
                            <input type="text" class="form-control" id="permit_no" name="permit_no" placeholder="Enter Permit No" value="{{ $staff->personalData->permit_no }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="permit_expiry">Expiry Date</label>
                            <input type="date" class="form-control" id="permit_expiry" name="permit_expiry" value="{{ $staff->personalData->permit_expiry }}" required>
                        </div>
                    </div>
                    <!-- Row 4 -->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="phone">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" value="{{ $staff->personalData->phone }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="mobile">Mobile</label>
                            <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number" value="{{ $staff->personalData->mobile }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="epf_no">EPF No</label>
                            <input type="text" class="form-control" id="epf_no" name="epf_no" placeholder="Enter EPF No" value="{{ $staff->personalData->epf_no }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="sosco">Sosco</label>
                            <input type="text" class="form-control" id="sosco" name="sosco" placeholder="Enter Sosco" value="{{ $staff->personalData->sosco }}" required>
                        </div>
                    </div>

                    <!-- Row 5 -->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="nric">NRIC</label>
                            <input type="text" class="form-control" id="nric" name="nric" placeholder="Enter NRIC" value="{{ $staff->personalData->nric }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="nationality">Nationality</label>
                            <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Enter Nationality" value="{{ $staff->personalData->nationality }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="tin">Tax Identification No (TIN)</label>
                            <input type="text" class="form-control" id="tin" name="tin" placeholder="Enter TIN" value="{{ $staff->personalData->tax_identification_no }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="base_salary">Base Salary (RM)</label>
                            <input type="number" class="form-control" id="base_salary" name="base_salary" placeholder="Enter Base Salary" value="{{ $staff->personalData->base_salary }}" required>
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
                            <input type="text" class="form-control" id="spouse_name" name="spouse_name" placeholder="Enter Spouse Name" value="{{ $staff->familyData->spouse_name }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="spouse_nric">NRIC</label>
                            <input type="text" class="form-control" id="spouse_nric" name="spouse_nric" placeholder="Enter NRIC" value="{{ $staff->familyData->spouse_nric }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="spouse_passport">Passport</label>
                            <input type="text" class="form-control" id="spouse_passport" name="spouse_passport" placeholder="Enter Passport" value="{{ $staff->familyData->spouse_passport }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="spouse_passport_expiry">Passport Expiry</label>
                            <input type="date" class="form-control" id="spouse_passport_expiry" name="spouse_passport_expiry" value="{{ $staff->familyData->spouse_passport_expiry }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="spouse_dob">DOB</label>
                            <input type="date" class="form-control" id="spouse_dob" name="spouse_dob" value="{{ $staff->familyData->spouse_dob }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="spouse_age">Age</label>
                            <input type="number" class="form-control" id="spouse_age" name="spouse_age" placeholder="Enter Age" value="{{ $staff->familyData->spouse_age }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="spouse_permit_no">Permit No</label>
                            <input type="text" class="form-control" id="spouse_permit_no" name="spouse_permit_no" placeholder="Enter Permit No" value="{{ $staff->familyData->spouse_permit_no }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="spouse_permit_expiry">Permit Expiry</label>
                            <input type="date" class="form-control" id="spouse_permit_expiry" name="spouse_permit_expiry" value="{{ $staff->familyData->spouse_passport_expiry }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="spouse_address">Address</label>
                            <textarea class="form-control" id="spouse_address" name="spouse_address" placeholder="Enter Address" required>{{ $staff->familyData->spouse_address }}</textarea>
                        </div>
                    </div>
                </div>
                <!-- Child Details -->
                <div id="childDetails">
                    <h4 class="mb-3">Children Details:</h4>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="children_no">Number of Children</label>
                            <input type="number" class="form-control" id="children_no" name="children_no" placeholder="Enter Number of Children" value="{{ $staff->familyData->children_no }}" required>
                        </div>
                    </div>
                    <div id="childrenTableContainer"></div>
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
                            <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Enter Bank Name" value="{{ $staff->bankData->bank_name }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="account_no">Account No</label>
                            <input type="text" class="form-control" id="account_no" name="account_no" placeholder="Enter Account Number" value="{{ $staff->bankData->account_no }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="account_type">Account Type</label>
                            <select class="form-control" id="account_type" name="account_type" required>
                                <option value="">Select Account Type</option>
                                <option value="savings" {{ $staff->bankData->account_type == 'savings' ? 'selected' : '' }}>Savings</option>
                                <option value="current" {{ $staff->bankData->account_type == 'current' ? 'selected' : '' }}>Current</option>
                                <option value="fixed" {{ $staff->bankData->account_type == 'fixed' ? 'selected' : '' }}>Fixed Deposit</option>
                            </select>

                        </div>
                        <div class="col-md-3">
                            <label for="branch">Branch</label>
                            <input type="text" class="form-control" id="branch" name="branch" placeholder="Enter Branch" value="{{ $staff->bankData->branch }}" required>
                        </div>
                    </div>
                    <!-- Row 2 -->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="account_status">Account Status</label>
                            <select class="form-control" id="account_status" name="account_status" required>
                                <option value="">Select Status</option>
                                <option value="active" {{ $staff->bankData->account_status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $staff->bankData->account_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
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
                        <input type="text" class="form-control" id="emergency_name" name="emergency_name" placeholder="Enter Emergency Contact Name" value="{{ $staff->moreData->emergency_name }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="relationship">Relationship</label>
                        <input type="text" class="form-control" id="relationship" name="relationship" placeholder="Enter Relationship" value="{{ $staff->moreData->relationship }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="{{ $staff->moreData->address }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="phone_no">Phone No</label>
                        <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Enter Phone Number" value="{{ $staff->moreData->phone_no }}" required>
                    </div>
                </div>

                <!-- Leave Details -->
                <h4>Leave Details:</h4>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="annual_leave">Annual Leave</label>
                        <input type="date" class="form-control" id="annual_leave" name="annual_leave" value="{{ $staff->moreData->annual_leave }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="annual_balance">Balance (Days)</label>
                        <input type="number" class="form-control" id="annual_balance" name="annual_balance" placeholder="Enter Balance Days" value="{{ $staff->moreData->annual_balance }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="carried_leave">Carried Leave</label>
                        <input type="number" class="form-control" id="carried_leave" name="carried_leave" placeholder="Enter Carried Leave" value="{{ $staff->moreData->carried_leave }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="carried_balance">Balance (Days)</label>
                        <input type="number" class="form-control" id="carried_balance" name="carried_balance" placeholder="Enter Balance Days" value="{{ $staff->moreData->carried_balance }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="medical_leave">Medical Leave</label>
                        <input type="date" class="form-control" id="medical_leave" name="medical_leave" value="{{ $staff->moreData->medical_leave }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="medical_balance">Balance (Days)</label>
                        <input type="number" class="form-control" id="medical_balance" name="medical_balance" value="{{ $staff->moreData->medical_balance }}" placeholder="Enter Balance Days" required>
                    </div>
                    <div class="col-md-3">
                        <label for="unpaid_leave">Unpaid Leave</label>
                        <input type="number" class="form-control" id="unpaid_leave" name="unpaid_leave" value="{{ $staff->moreData->unpaid_leave }}" placeholder="Enter Unpaid Leave" required>
                    </div>
                    <div class="col-md-3">
                        <label for="unpaid_balance">Balance (Days)</label>
                        <input type="number" class="form-control" id="unpaid_balance" name="unpaid_balance" value="{{ $staff->moreData->unpaid_balance }}" placeholder="Enter Balance Days" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="total_leave_days">Rate per Month (Total Days)</label>
                        <input type="number" class="form-control" id="total_leave_days" name="total_leave_days" value="{{ $staff->moreData->total_leave_days }}" placeholder="Enter Total Days" required>
                    </div>
                    <div class="col-md-3">
                        <label for="charges_exceeded">Charges if Exceeded (RM)</label>
                        <input type="number" class="form-control" id="charges_exceeded" name="charges_exceeded" value="{{ $staff->moreData->charges_exceeded }}" placeholder="Enter Charges" required>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="text-end">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>

</div>

<script>
    function generateChildrenTable(numChildren) {
        // Clear the previous table
        var tableContainer = document.getElementById('childrenTableContainer');
        tableContainer.innerHTML = '';

        // Only proceed if the number of children is valid (greater than 0)
        if (numChildren > 0) {
            // Create a table
            var table = document.createElement('table');
            table.classList.add('table', 'table-bordered');

            // Create the table header
            var thead = document.createElement('thead');
            var headerRow = document.createElement('tr');
            headerRow.innerHTML = '<th>#</th><th>Name</th><th>Age</th><th>School</th>';
            thead.appendChild(headerRow);
            table.appendChild(thead);

            // Create the table body (rows based on number of children)
            var tbody = document.createElement('tbody');
            for (var i = 1; i <= numChildren; i++) {
                var row = document.createElement('tr');
                row.innerHTML = `
                    <td>${i}</td>
                    <td><input type="text" class="form-control" name="child_name[${i}]" placeholder="Enter Name"></td>
                    <td><input type="number" class="form-control" name="child_age[${i}]" placeholder="Enter Age"></td>
                    <td><input type="text" class="form-control" name="child_school[${i}]" placeholder="Enter School"></td>
                `;
                tbody.appendChild(row);
            }
            table.appendChild(tbody);

            // Append the table to the container
            tableContainer.appendChild(table);
        }
    }

    // Attach event listener for real-time changes
    document.getElementById('children_no').addEventListener('input', function () {
        var numChildren = parseInt(this.value) || 0; // Get the number entered
        generateChildrenTable(numChildren); // Generate the table
    });

    // Generate the table by default based on initial value
    document.addEventListener('DOMContentLoaded', function () {
        var initialChildrenCount = parseInt(document.getElementById('children_no').value) || 0;
        generateChildrenTable(initialChildrenCount);
    });
</script>

@endsection