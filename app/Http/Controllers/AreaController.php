<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\AreaRack;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    //

    public function index()
    {
        $areas = Area::orderBy('created_at', 'ASC')->get();
        return view('area.index', ['areas' => $areas]);
    }
    public function create()
    {  
        $area_racks = AreaRack::select('id', 'name', 'code')->get();
        return view('area.create', ['area_racks' => $area_racks]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required',
            'department' => 'required',
            'area_rack' => 'required'
        ]);

        $area = new Area;
        $area->name = $request->name;
        $area->code = $request->code;
        $area->department = $request->department;
        $area->area_rack = json_encode($request->area_rack);
        $area->save();
        return redirect(route('area.index'))->with('success', 'Area Added Successfully!');
    }
    public function edit($id)
    {
        $area_racks = AreaRack::select('id', 'name', 'code')->get();
        $area = Area::find($id);
        return view('area.edit', [
            'area' => $area,
            'area_racks' => $area_racks,
        ]);
    }
    public function update(Request $request, $id)
    {
        $area = Area::find($id);
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required',
            'department' => 'required',
            'area_rack' => 'required'
        ]);

        $area->name = $request->name;
        $area->code = $request->code;
        $area->department = $request->department;
        $area->area_rack = json_encode($request->area_rack);
        $area->save();
        return redirect(route('area.index'))->with('success', 'Area Updated Successfully!');
    }
    public function destroy(Request $request, $id)
    {
        $area = Area::find($id);
        $area->delete();
        return redirect(route('area.index'))->with('success', 'Area Deleted Successfully!');
    }
    public function view($id)
    {
        $area_racks = AreaRack::select('id', 'name', 'code')->get();
        $area = Area::find($id);
        return view('area.view', [
            'area' => $area,
            'area_racks' => $area_racks,
        ]);
    }
}
