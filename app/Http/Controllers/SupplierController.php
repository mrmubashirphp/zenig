<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Supplier;
use Illuminate\View\View;

class SupplierController extends Controller
{
    /**
     * Display a listing of suppliers.
     */
    public function index(): View
    {
        $suppliers = Supplier::all(); // Retrieve all suppliers
        return view('setting.supplier.index')->with('suppliers', $suppliers);
    }

    /**
     * Show the form for creating a new supplier.
     */
    public function create(): View
    {
        return view('setting.supplier.create'); // Return the create view
    }

    /**
     * Store a newly created supplier in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate and save the supplier data
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone_no' => 'nullable|string|max:20',
            'group' => 'required|string|in:Direct,Indirect',
            'pic_name' => 'nullable|string|max:255',
            'pic_department' => 'nullable|string|max:255',
            'pic_phone_work' => 'nullable|string|max:20',
            'pic_phone_mobile' => 'nullable|string|max:20',
            'pic_fax' => 'nullable|string|max:20',
            'pic_email' => 'nullable|email|max:255',
        ]);

        Supplier::create($request->all()); // Create the supplier
        return redirect('supplier')->with('flash_message', 'Supplier Added Successfully!');
    }

    /**
     * Show the form for editing the specified supplier.
     */
    public function edit(string $id): View
    {
        $supplier = Supplier::find($id); // Find the supplier by ID
        return view('setting.supplier.edit')->with('supplier', $supplier);
    }

    /**
     * Update the specified supplier in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $supplier = Supplier::find($id); // Find the supplier by ID

        // Validate and update the supplier data
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone_no' => 'nullable|string|max:20',
            'group' => 'required|string|in:Direct,Indirect',
            'pic_name' => 'nullable|string|max:255',
            'pic_department' => 'nullable|string|max:255',
            'pic_phone_work' => 'nullable|string|max:20',
            'pic_phone_mobile' => 'nullable|string|max:20',
            'pic_fax' => 'nullable|string|max:20',
            'pic_email' => 'nullable|email|max:255',
        ]);

        $supplier->update($request->all()); // Update the supplier
        return redirect('supplier')->with('flash_message', 'Supplier Updated Successfully!');
    }

    /**
     * Remove the specified supplier from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Supplier::destroy($id); // Delete the supplier
        return redirect('supplier')->with('flash_message', 'Supplier Deleted Successfully!');
    }
}
