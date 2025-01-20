<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\PersonalData;
use App\Models\FamilyData;
use App\Models\BankData;
use App\Models\More;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::all();
        return view('staff.index', compact('staff'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|string|unique:staff,code', 
            'full_name' => 'required|string',
            'user_name' => 'required|string|unique:staff,user_name',
            'email' => 'required|email|unique:staff,email',
            'password' => 'required|string|min:8',
            'department' => 'required|string',
            'designation' => 'required|string',
            'is_active' => 'sometimes|boolean', 
        ]);
    
        $role = isset($validatedData['role']) ? implode(',', (array) $validatedData['role']) : 'User'; // Default to 'User' if role is not provided
    
        $staff = Staff::create([
            'code' => $validatedData['code'],
            'full_name' => $validatedData['full_name'],
            'user_name' => $validatedData['user_name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'department' => $validatedData['department'],
            'designation' => $validatedData['designation'],
            'role' => $role,
            'is_active' => isset($validatedData['is_active']) ? $validatedData['is_active'] : false,
        ]);
    
        // Save personal data
        if ($request->has('gender')) {
            $staff->personalData()->create([
                'gender' => $request->input('gender') ?? null,
                'marital_status' => $request->input('marital_status') ?? null,
                'passport' => $request->input('passport') ?? null,
                'passport_expiry' => $request->input('passport_expiry') ?? null,
                'address' => $request->input('address') ?? null,
                'ethnic' => $request->input('ethnic') ?? null,
                'immigration_no' => $request->input('immigration_no') ?? null,
                'immigration_expiry' => $request->input('immigration_expiry') ?? null,
                'dob' => $request->input('dob') ?? null,
                'age' => $request->input('age') ?? null,
                'permit_no' => $request->input('permit_no') ?? null,
                'permit_expiry' => $request->input('permit_expiry') ?? null,
                'phone' => $request->input('phone') ?? null,
                'mobile' => $request->input('mobile') ?? null,
                'epf_no' => $request->input('epf_no') ?? null,
                'sosco' => $request->input('sosco') ?? null,
                'nric' => $request->input('nric') ?? null,
                'nationality' => $request->input('nationality') ?? null,
                'tax_identification_no' => 'required|string',
                'base_salary' => $request->input('base_salary') ?? null
            ]);
        }
    
        // Save family data
        $staff->familyData()->create([
            'spouse_name' => $request->input('spouse_name') ?? null,
            'spouse_nric' => $request->input('spouse_nric') ?? null,
            'spouse_passport' => $request->input('spouse_passport') ?? null,
            'spouse_passport_expiry' => $request->input('spouse_passport_expiry') ?? null,
            'spouse_dob' => $request->input('spouse_dob') ?? null,
            'spouse_age' => $request->input('spouse_age') ?? null,
            'spouse_permit_no' => $request->input('spouse_permit_no') ?? null,
            'spouse_permit_expiry' => $request->input('spouse_permit_expiry') ?? null,
            'spouse_address' => $request->input('spouse_address') ?? null,
            'children_no' => $request->input('children_no') ?? null,
        ]);
    
        // Store bank data
        if ($request->has('bank_name')) {
            $staff->bankData()->create([
                'bank_name' => $request->input('bank_name') ?? null,
                'account_no' => $request->input('account_no') ?? null,
                'account_type' => $request->input('account_type') ?? null,
                'branch' => $request->input('branch') ?? null,
                'account_status' => $request->input('account_status') ?? null,
            ]);
        }
    
        // Store emergency and leave data
        $staff->moreData()->create([
            'staff_id' => $staff->id,
            'emergency_name' => $request->input('emergency_name') ?? null,
            'relationship' => $request->input('relationship') ?? null,
            'address' => $request->input('address') ?? null,
            'phone_no' => $request->input('phone_no') ?? null,
            'annual_leave' => $request->input('annual_leave') ?? null,
            'annual_balance' => $request->input('annual_balance') ?? null,
            'carried_leave' => $request->input('carried_leave') ?? null,
            'carried_balance' => $request->input('carried_balance') ?? null,
            'medical_leave' => $request->input('medical_leave') ?? null,
            'medical_balance' => $request->input('medical_balance') ?? null,
            'unpaid_leave' => $request->input('unpaid_leave') ?? null,
            'unpaid_balance' => $request->input('unpaid_balance') ?? null,
            'total_leave_days' => $request->input('total_leave_days') ?? null,
            'charges_exceeded' => $request->input('charges_exceeded') ?? null,
        ]);
    
        return redirect()->route('staff.index')->with('success', 'Staff added successfully!');
    }

    public function edit($id)
    {
        $staff = Staff::with(['personalData', 'familyData', 'bankData', 'moreData'])->findOrFail($id);
        return view('staff.edit', compact('staff'));
    }

public function update(Request $request, $id)
{
    // Validate the incoming request
    $validated = $request->validate([
        // Staff Information
        'full_name' => 'required',
        'user_name' => 'required',
        'email' => 'required|email',
        'department' => 'required',
        'designation' => 'required',
        'role' => 'required',
        'is_active' => 'nullable|boolean',

        // Personal Data
        'gender' => 'nullable|string',
        'marital_status' => 'nullable|string',
        'passport' => 'nullable|string',
        'passport_expiry' => 'nullable|date',
        'address' => 'nullable|string',
        'ethnic' => 'nullable|string',
        'immigration_no' => 'nullable|string',
        'immigration_expiry' => 'nullable|date',
        'dob' => 'nullable|date',
        'age' => 'nullable|integer',
        'permit_no' => 'nullable|string',
        'permit_expiry' => 'nullable|date',
        'phone' => 'nullable|string',
        'mobile' => 'nullable|string',
        'epf_no' => 'nullable|string',
        'sosco' => 'nullable|string',
        'nric' => 'nullable|string',
        'nationality' => 'nullable|string',
        'tax_identification_no' => 'nullable|string',
        'base_salary' => 'nullable|numeric',

        // Bank Data
        'bank_name' => 'nullable|string',
        'account_no' => 'nullable|string',
        'account_type' => 'nullable|string',
        'branch' => 'nullable|string',
        'account_status' => 'nullable|string',

        // Family Data
        'spouse_name' => 'nullable|string',
        'spouse_nric' => 'nullable|string',
        'spouse_passport' => 'nullable|string',
        'spouse_passport_expiry' => 'nullable|date',
        'spouse_dob' => 'nullable|date',
        'spouse_age' => 'nullable|integer',
        'spouse_permit_no' => 'nullable|string',
        'spouse_permit_expiry' => 'nullable|date',
        'spouse_address' => 'nullable|string',
        'children_no' => 'nullable|integer',

        // Emergency/Leave Data
        'emergency_name' => 'nullable|string',
        'relationship' => 'nullable|string',
        'address' => 'nullable|string',
        'phone_no' => 'nullable|string',
        'annual_leave' => 'nullable',
        'annual_balance' => 'nullable|integer',
        'carried_leave' => 'nullable|integer',
        'carried_balance' => 'nullable|integer',
        'medical_leave' => 'nullable',
        'medical_balance' => 'nullable|integer',
        'unpaid_leave' => 'nullable|integer',
        'unpaid_balance' => 'nullable|integer',
        'total_leave_days' => 'nullable|integer',
        'charges_exceeded' => 'nullable',
    ]);

    // Find the staff member by ID
    $staff = Staff::findOrFail($id);

    // Update staff data
    $staff->update([
        'full_name' => $validated['full_name'],
        'user_name' => $validated['user_name'],
        'email' => $validated['email'],
        'department' => $validated['department'],
        'designation' => $validated['designation'],
        'role' => implode(',', $validated['role']),
        'is_active' => $request->has('is_active') ? true : false,
    ]);

    // Update personal data if available
    if ($staff->personalData) {
        $staff->personalData->update([
            'gender' => $validated['gender'] ?? null,
            'marital_status' => $validated['marital_status'] ?? null,
            'passport' => $validated['passport'] ?? null,
            'passport_expiry' => $validated['passport_expiry'] ?? null,
            'address' => $validated['address'] ?? null,
            'ethnic' => $validated['ethnic'] ?? null,
            'immigration_no' => $validated['immigration_no'] ?? null,
            'immigration_expiry' => $validated['immigration_expiry'] ?? null,
            'dob' => $validated['dob'] ?? null,
            'age' => $validated['age'] ?? null,
            'permit_no' => $validated['permit_no'] ?? null,
            'permit_expiry' => $validated['permit_expiry'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'mobile' => $validated['mobile'] ?? null,
            'epf_no' => $validated['epf_no'] ?? null,
            'sosco' => $validated['sosco'] ?? null,
            'nric' => $validated['nric'] ?? null,
            'nationality' => $validated['nationality'] ?? null,
            'tax_identification_no' => $validated['tax_identification_no'] ?? '',
            'base_salary' => $validated['base_salary'] ?? null,
        ]);
    }

    // Update family data if available
    if ($staff->familyData) {
        $staff->familyData->update([
            'spouse_name' => $validated['spouse_name'] ?? null,
            'spouse_nric' => $validated['spouse_nric'] ?? null,
            'spouse_passport' => $validated['spouse_passport'] ?? null,
            'spouse_passport_expiry' => $validated['spouse_passport_expiry'] ?? null,
            'spouse_dob' => $validated['spouse_dob'] ?? null,
            'spouse_age' => $validated['spouse_age'] ?? null,
            'spouse_permit_no' => $validated['spouse_permit_no'] ?? null,
            'spouse_permit_expiry' => $validated['spouse_permit_expiry'] ?? null,
            'spouse_address' => $validated['spouse_address'] ?? null,
            'children_no' => $validated['children_no'] ?? null,
        ]);
    }

    // Update bank data if available
    if ($staff->bankData) {
        $staff->bankData->update([
            'bank_name' => $validated['bank_name'] ?? null,
            'account_no' => $validated['account_no'] ?? null,
            'account_type' => $validated['account_type'] ?? null,
            'branch' => $validated['branch'] ?? null,
            'account_status' => $validated['account_status'] ?? null,
        ]);
    }

    // Update emergency/leave data if available
    if ($staff->moreData) {
        $staff->moreData->update([
            'emergency_name' => $validated['emergency_name'] ?? null,
            'relationship' => $validated['relationship'] ?? null,
            'address' => $validated['address'] ?? null,
            'phone_no' => $validated['phone_no'] ?? null,
            'annual_leave' => $validated['annual_leave'] ?? null,
            'annual_balance' => $validated['annual_balance'] ?? null,
            'carried_leave' => $validated['carried_leave'] ?? null,
            'carried_balance' => $validated['carried_balance'] ?? null,
            'medical_leave' => $validated['medical_leave'] ?? null,
            'medical_balance' => $validated['medical_balance'] ?? null,
            'unpaid_leave' => $validated['unpaid_leave'] ?? null,
            'unpaid_balance' => $validated['unpaid_balance'] ?? null,
            'total_leave_days' => $validated['total_leave_days'] ?? null,
            'charges_exceeded' => $validated['charges_exceeded'] ?? null,
        ]);
    }

    // Redirect with success message
    return redirect()->route('staff.index')->with('success', 'Staff updated successfully!');
}

}