<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Unit;
use Illuminate\View\View;

class UnitController extends Controller
{

    public function index(): View
    {
        $units = Unit::all();
        return view ('setting.unit.index')->with('units', $units);
    }

 
    public function create(): View
    {
        return view('setting.unit.create');
    }

  
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required'
       ]);

       $type_of_products = new Unit;
       $type_of_products->name = $request->name;
       $type_of_products->code_input = $request->code;
       $type_of_products->save();
        return redirect('unit')->with('flash_message', 'unit Addedd!');
    }

  

    public function edit(string $id): View
    {
        $unit = Unit::find($id);
        return view('setting.unit.edit')->with('units', $unit);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $unit = Unit::find($id);
        $input = $request->all();
        $unit->update($input);
        return redirect('unit')->with('flash_message', 'unit Updated!');  
    }

    
    public function destroy(string $id): RedirectResponse
    {
        Unit::destroy($id);
        return redirect('unit')->with('flash_message', 'unit deleted!'); 
    }
}