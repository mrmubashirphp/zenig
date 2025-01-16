<?php

namespace App\Http\Controllers;

use App\Models\AreaLevel;
use Illuminate\Http\Request;

class AreaLevelController extends Controller
{

    // AreaLevel index
    public function index()
    {
        $arealevels = AreaLevel::orderBy('created_at', 'ASC')->get();
        return view('area-level.index', [
            'arealevels' => $arealevels
        ]);
    }

    // AreaLevel create
    public function create()
    {
        return view('area-level.create');
    }

    // AreaLevel store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required'
        ]);

        $arealevel = new AreaLevel;
        $arealevel->name = $request->name;
        $arealevel->code = $request->code;
        $arealevel->save();
        return redirect(route('area.level.index'))->with('success', 'Area Level Added Successfully!');
    }

    // AreaLevel edit
    public function edit($id)
    {
        $arealevel = AreaLevel::find($id);
        return view('area-level.edit', ['arealevel' => $arealevel]);
    }

    // AreaLevel store
    public function update(Request $request, $id)
    {
        $arealevel = AreaLevel::find($id);
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required'
        ]);

        $arealevel->name = $request->name;
        $arealevel->code = $request->code;
        $arealevel->save();
        return redirect(route('area.level.index'))->with('success', 'Area Level Added Successfully!');
    }
    public function destroy($id)
    {
        $arealevel = AreaLevel::find($id);
        $arealevel->delete();
        return redirect(route('area.level.index'))->with('success', 'Area Level Deleted Successfully!');
    }

    public function view($id)
    {
        $arealevel = AreaLevel::find($id);
        return view('area-level.edit', ['arealevel' => $arealevel]);
    }
}
