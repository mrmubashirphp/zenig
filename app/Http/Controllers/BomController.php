<?php

namespace App\Http\Controllers;

use App\Models\Bom;
use App\Models\BomCircuit;
use App\Models\BomMaterial;
use App\Models\BomProcess;
use App\Models\Process;
use App\Models\Product;
use Illuminate\Http\Request;

class BomController extends Controller
{
    public function index()
    {
        $boms = Bom::orderBy('created_at', 'ASC')->with('product')->get();
        return view('mes.engineering.bom.index', [
            'boms' => $boms
        ]);
    }

    public function create()
    {
        $products = Product::orderBy('created_at', 'ASC')->get();
        $processes = Process::orderBy('created_at', 'ASC')->get();
        return view('mes.engineering.bom.create', [
            'products' => $products,
            'processes' => $processes
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'kanban_no' => 'required',
            'created_date' => 'required',
            'created_by' => 'required',
            'part_weight' => 'required',
            'customer' => 'required',
        ]);

        $bom = new Bom;
        $bom->product_id = $request->product_id;
        $bom->customer = $request->customer;
        $bom->kanban_no = $request->kanban_no;
        $bom->part_weight = $request->part_weight;
        $bom->created_by = $request->created_by;
        $bom->created_date = $request->created_date;
        $bom->save();

        $materials = $request->materials ?? [];
        if (is_array($materials)) {
            foreach ($materials as $material) {
                $bom_materials = new BomMaterial;
                $bom_materials->bom_id = $bom->id;
                $bom_materials->product_id = $material['product_id'] ?? null;
                $bom_materials->qty_length = (int) ($material['qty-length'] ?? 1);
                $bom_materials->save();
            }
        }

        $circuits = $request->circuits ?? [];
        if (is_array($circuits)) {
            foreach ($circuits as $circuit) {
                $bom_circuits = new BomCircuit;
                $bom_circuits->bom_id = $bom->id;
                $bom_circuits->product_id = $circuit['product_id'] ?? null;
                $bom_circuits->qty_required = (int) ($circuit['qty-required'] ?? 1);
                $bom_circuits->save();
            }
        }

        if ($request->has('process_name')) {
            foreach ($request->process_name as $index => $processId) {
                $bom_process = new BomProcess();
                $bom_process->process_id = $processId; 
                $bom_process->bom_id = $bom->id ?? ''; 
                $bom_process->process_no = json_encode($request->process_no); 
                $bom_process->material_purchase = json_encode($request->material_purchase) ?? []; 
                $bom_process->circuit_kanban = json_encode($request->circuit_kanban) ?? []; 
                $bom_process->save();
            }
        }
        

        return redirect(route('engineering.bom.index'))->with('success', 'Bom has been added successfully!');
    }

}
