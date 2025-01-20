<?php

namespace App\Http\Controllers;

use App\Models\AreaLevel;
use App\Models\AreaRack;
use Illuminate\Http\Request;

class AreaRackController extends Controller
{
    public function index()
    {
        $arearacks = AreaRack::select('id', 'name', 'code', 'arealevels', 'created_at')->get();
        return view('area-rack.index', ['arearacks' => $arearacks]);
    }
    public function create()
    {
        $arealevels = AreaLevel::select('id', 'name')->get();
        return view('area-rack.create', ['arealevels' => $arealevels]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required',
            'arealevel' => 'required'
        ]);

        $arearack = new AreaRack;
        $arearack->name = $request->name;
        $arearack->code = $request->code;
        $arearack->arealevels = json_encode($request->arealevel);
        $arearack->save();
        return redirect(route('area.rack.index'))->with('success', 'Area Rack Added Successfully!');
    }
    public function edit($id)
    {

        $arealevels = AreaLevel::select('id', 'name', 'code')->get();
        $arearack = AreaRack::find($id);
        return view('area-rack.edit', [
            'arearack' => $arearack,
            'arealevels' => $arealevels
        ]);
    }
    public function update(Request $request, $id)
    {
        $arearack = AreaRack::find($id);
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required',
            'arealevel' => 'required'
        ]);
        $arearack->name = $request->name;
        $arearack->code = $request->code;
        $arearack->arealevels = json_encode($request->arealevel);
        $arearack->save();
        return redirect(route('area.rack.index'))->with('success', 'Area Rack Updated Successfully!');
    }
    public function destroy($id)
    {
        $arearack = AreaRack::find($id);

        if (!$arearack) {
            return redirect(route('area.rack.index'))->with('error', 'Area Rack not found!');
        }

        $arearack->delete();
        return redirect(route('area.rack.index'))->with('success', 'Area Rack Deleted Successfully!');
    }

    public function view($id)
    {

        $arealevels = AreaLevel::select('id', 'name', 'code')->get();
        $arearack = AreaRack::find($id);
        return view('area-rack.view', [
            'arearack' => $arearack,
            'arealevels' => $arealevels
        ]);
    }

}
