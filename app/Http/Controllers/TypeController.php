<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::orderBy('created_at', 'ASC')->get();
        return view('type.index', ['types' => $types]);
    }
    public function create()
    {
        return view('type.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required'
        ]);

        $type = new Type;
        $type->type = $request->type;
        $type->save();
        return redirect(route('type.index'))->with('success', 'Type Added Successfully!');
    }
    public function edit($id)
    {
        $type = Type::find($id);
        return view('type.edit', ['type' => $type]);
    }
    public function update(Request $request, $id)
    {
        $type = Type::find($id);
        $request->validate([
            'type' => 'required'
        ]);

        $type->type = $request->type;
        $type->save();
        return redirect(route('type.index'))->with('success', 'Type Updated Successfully!');
    }
    public function destroy(Request $request, $id)
    {
        $type = Type::find($id);
        $type->delete();
        return redirect(route('type.index'))->with('success', 'Type Deleted Successfully!');
    }
    public function view($id)
    {
        $type = Type::find($id);
        return view('type.view', ['type' => $type]);
    }
}
