<?php

namespace App\Http\Controllers;

use App\Models\Process;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function index()
    {
        $processes = Process::orderBy('created_at', 'ASC')->get();
        return view('process.index', ['processes' => $processes]);
    }
    public function create()
    {
        return view('process.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required',
            'description' => 'required',
        ]);

        $process = new Process;
        $process->name = $request->name;
        $process->code = $request->code;
        $process->description = $request->description;
        $process->save();
        return redirect(route('process.index'))->with('success', 'Process Added Successfully!');
    }
    public function edit($id)
    {
        $process = Process::find($id);
        return view('process.edit', ['process' => $process]);
    }
    public function update(Request $request,$id)
    {
        $process = Process::find($id);
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required',
            'description' => 'required',
        ]);

        $process->name = $request->name;
        $process->code = $request->code;
        $process->description = $request->description;
        $process->save();
        return redirect(route('process.index'))->with('success', 'Process Updated Successfully!');
    }


    public function destroy($id)
    {
        $process = Process::find($id);
        $process->delete();
        return redirect(route('process.index'))->with('success','Process Deleted Successfully !');
    }
    public function view($id)
    {
        $process = Process::find($id);
        return view('process.view', ['process' => $process]);
    }
}
