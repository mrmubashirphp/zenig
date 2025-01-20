<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index()
    {
        $designations = Designation::all();
        return view('designation.index', compact('designations'));
    }

    public function create()
    {
        return view('designation.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    Designation::create($request->only('name'));

    return redirect()->route('designations.index')->with('success', 'Designation created successfully.');
}

public function update(Request $request, Designation $designation)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $designation->update($request->only('name'));

    return redirect()->route('designations.index')->with('success', 'Designation updated successfully.');
}

public function destroy(Designation $designation)
{
    $designation->delete();

    return redirect()->route('designations.index')->with('success', 'Designation deleted successfully.');
}
}
