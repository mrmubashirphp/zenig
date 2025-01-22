<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Customer;
use Illuminate\View\View;

class CustomerController extends Controller
{
    /**
     * Display a listing of customers.
     */
    public function index(): View
    {
        $customers = Customer::all(); // Retrieve all customers
        return view('setting.customer.index')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new setting.customer.
     */
    public function create(): View
    {
        return view('setting.customer.create'); // Return the create view
    }

    /**
     * Store a newly created customer in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate and save the customer data
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50',
            'phone_no' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'pic_name' => 'nullable|string|max:255',
            'pic_department' => 'nullable|string|max:255',
            'pic_phone_work' => 'nullable|string|max:20',
            'pic_phone_mobile' => 'nullable|string|max:20',
            'pic_fax' => 'nullable|string|max:20',
            'pic_email' => 'nullable|email|max:255',
            'payment_term' => 'nullable|string|max:100',
        ]);

        Customer::create($request->all()); // Create the customer
        return redirect('customer')->with('flash_message', 'Customer Added Successfully!');
    }

    /**
     * Show the form for editing the specified setting.customer.
     */
    public function edit(string $id): View
    {
        $customer = Customer::find($id); // Find the customer by ID
        return view('setting.customer.edit')->with('customer', $customer);
    }

    /**
     * Update the specified customer in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $customer = Customer::find($id); // Find the customer by ID

        // Validate and update the customer data
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50',
            'phone_no' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'pic_name' => 'nullable|string|max:255',
            'pic_department' => 'nullable|string|max:255',
            'pic_phone_work' => 'nullable|string|max:20',
            'pic_phone_mobile' => 'nullable|string|max:20',
            'pic_fax' => 'nullable|string|max:20',
            'pic_email' => 'nullable|email|max:255',
            'payment_term' => 'nullable|string|max:100',
        ]);

        $customer->update($request->all()); // Update the customer
        return redirect('customer')->with('flash_message', 'Customer Updated Successfully!');
    }

    /**
     * Remove the specified customer from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Customer::destroy($id); // Delete the customer
        return redirect('customer')->with('flash_message', 'Customer Deleted Successfully!');
    }
}
