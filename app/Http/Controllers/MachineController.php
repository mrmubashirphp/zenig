<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\Tonage;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    public function index()
    {
        $machines = Machine::orderBy('created_at', 'ASC')->get();
        return view('machine.index', ['machines' => $machines]);
    }
    public function create()
    {
        $tonages = Tonage::select('id', 'tonage')->get();
        return view('machine.create', ['tonages' => $tonages]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:machines|max:255',
            'code' => 'required|unique:machines',
            'tonage' => 'required',
            'category' => 'required'
        ]);

        $machine = new Machine;
        $machine->name = $request->name;
        $machine->code = $request->code;
        $machine->tonage = json_encode($request->tonage);
        $machine->category = $request->category;
        $machine->save();
        return redirect(route('machine.index'))->with('success', 'Machine has been Added Successfully!');
    }

    public function edit($id)
    {
        $tonages = Tonage::select('id', 'tonage')->get();
        $machine = Machine::find($id);
        return view('machine.edit', [
            'machine' => $machine,
            'tonages' => $tonages
        ]);
    }
    public function update(Request $request,$id)
    {
        $machine = Machine::find($id);
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required',
            'tonage' => 'required',
            'category' => 'required'
        ]);

        $machine->name = $request->name;
        $machine->code = $request->code;
        $machine->tonage = json_encode($request->tonage);
        $machine->category = $request->category;
        $machine->save();
        return redirect(route('machine.index'))->with('success', 'Machine has been Updated Successfully!');
    }
    public function destroy($id)
    {
        $machine = Machine::find($id);
        $machine->delete();
        return redirect(route('machine.index'))->with('success', 'Machine has been Deleted Successfully!');
    }

    public function view($id)
    {
        $tonages = Tonage::select('id', 'tonage')->get();
        $machine = Machine::find($id);
        return view('machine.view', [
            'machine' => $machine,
            'tonages' => $tonages
        ]);
    }
}
