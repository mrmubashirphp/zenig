<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalePrice;
use App\Models\Product;
use App\Models\Unit;

class SalePriceController extends Controller
{
    public function index()
    {
        $salePrices = SalePrice::all();
        return view('sale_price.index', compact('salePrices'));
    }

    public function create()
    {
        $products = Product::with(['typeOfProduct', 'category', 'unit'])->get();
        return view('sale_price.create', compact('products'));
    }

    public function store(Request $request)
    {
        $product = Product::findOrFail($request->part_no);

        SalePrice::create([
            'product_id' => $product->id,
            'part_no' => $product->part_no,
            'part_name' => $product->part_name,
            'model' => $product->model,
            'variance' => $product->variance,
            'unit' => $request->unit,
            'price_per_unit' => $request->price_per_unit,
            'effective_date' => $request->effective_date,
            'status' => $request->status ?? 'In Progress',
        ]);

        return redirect()->route('saleprice.index')->with('success', 'Sale Price created successfully.');
    }

    public function show($id)
    {
        $salePrice = SalePrice::findOrFail($id);
        return view('sale_price.show', compact('salePrice'));
    }

    public function edit($id)
    {
        $salePrice = SalePrice::findOrFail($id); 
        $products = Product::all(); 
        return view('sale_price.edit', compact('salePrice', 'products'));
    }

    public function update(Request $request, SalePrice $salePrice)
    {
        $salePrice->update([
            'part_no' => $request->part_no,
            'part_name' => $request->part_name,
            'model' => $request->model,
            'variance' => $request->variance,
            'unit' => $request->unit,
            'price_per_unit' => $request->price_per_unit,
            'effective_date' => $request->effective_date,
            'status' => $request->status ?? 'In Progress',
        ]);

        return redirect()->route('saleprice.index')->with('success', 'Sale price updated successfully.');
    }

    public function destroy($id)
    {
        $salePrice = SalePrice::findOrFail($id);
        $salePrice->delete();
        return redirect()->route('saleprice.index')->with('success', 'Sale price deleted successfully.');
    }

//     public function verifyPage($id)
// {
//     $salePrice = SalePrice::findOrFail($id);
//     $designations = Designation::all(); // Assuming you're pulling designations
//     $departments = Department::all(); // Assuming you're pulling departments

//     return view('sale_price.verify', compact('salePrice', 'designations', 'departments'));
// }
// public function updateStatus(Request $request, $id)
// {
//     $salePrice = SalePrice::findOrFail($id);
    
//     // Validate the status (either "Completed" or "Declined")
//     // $salePrice->update([
//     //     'status' => $request->status,
//     // ]);

//     return redirect()->route('saleprice.index')->with('success', 'Sale price status updated.');
// }

// public function verify(Request $request, $id)
// {
//     if (!$request->has('status')) {
//         return redirect()->back()->with('error', 'Status is required.');
//     }

//     $salePrice = SalePrice::findOrFail($id);

//     $salePrice->status = $request->status;  // Ensure that status is set

//     $salePrice->save();

//     return redirect()->route('saleprice.index')->with('success', 'Sale price status updated.');
// }

}
