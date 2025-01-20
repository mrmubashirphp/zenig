<?php

namespace App\Http\Controllers;

use App\Models\Tonage;
use Illuminate\Http\Request;

class TonageController extends Controller
{
    //

    public function index()
    {
        $tonages = Tonage::orderBy('created_at', 'ASC')->get();
        return view('tonage.index', ['tonages' => $tonages]);
    }
    public function create()
    {
        return view('tonage.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'tonage' => 'required'
        ]);

        $tonage = new Tonage;
        $tonage->tonage = $request->tonage;
        $tonage->save();
        return redirect(route('tonage.index'))->with('success', 'Tonage Added Successfully!');
    }
    public function edit($id)
    {
        $tonage = Tonage::find($id);
        return view('tonage.edit', ['tonage' => $tonage]);
    }
    public function update(Request $request,$id)
    {
        $tonage = Tonage::find($id);
        $request->validate([
            'tonage' => 'required'
        ]);
        
        $tonage->tonage = $request->tonage;
        $tonage->save();
        return redirect(route('tonage.index'))->with('success', 'Tonage Updated Successfully!');
    }
    public function destroy(Request $request,$id)
    {
        $tonage = Tonage::find($id);
        $tonage->delete();
        return redirect(route('tonage.index'))->with('success', 'Tonage Deleted Successfully!');
    }

    public function view($id)
    {
        $tonage = Tonage::find($id);
        return view('tonage.view', ['tonage' => $tonage]);
    }

}
