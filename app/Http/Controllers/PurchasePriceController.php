<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PurchasePrice;
use Illuminate\Http\Request;

class PurchasePriceController extends Controller
{
    //

    public function index()
    {
        $purchaseprices = PurchasePrice::orderBy('created_at', 'ASC')->with('product')->get();
        return view('erp.pvd.purchase-price.index', [
            'purchaseprices' => $purchaseprices
        ]);
    }


    public function create()
    {
        $products = Product::with('typeOfProduct', 'category', 'unit')->get();
        return view('erp.pvd.purchase-price.create', [
            'products' => $products
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'price_unit' => 'required',
            'date' => 'required',
            'product_id' => 'required',  // Add product_id to validation if needed
        ]);

        $status = 'request';
        $purchaseprice = new PurchasePrice();
        $purchaseprice->price = $request->price_unit;
        $purchaseprice->date = $request->date;
        $purchaseprice->status = $status;
        $purchaseprice->product_id = $request->product_id;  // Add product_id field
        $purchaseprice->save();

        return redirect(route('pvd.purchase-price.index'))->with('success', 'Purchase Price has been Added Successfully!');
    }


    public function edit($id)
    {
        $products = Product::with('typeOfProduct', 'category', 'unit')->get();
        $purchaseprice = PurchasePrice::with('product.typeOfProduct', 'product.unit', 'product.category')->find($id);
        return view('erp.pvd.purchase-price.edit', compact('products', 'purchaseprice'));
    }

    public function update(Request $request, $id)
    {
        $purchaseprice = PurchasePrice::find($id);

        $request->validate([
            'price_unit' => 'required',
            'date' => 'required',
            'product_id' => 'required|exists:products,id',
        ]);

        $status = 'request';
        
        $purchaseprice->price = $request->price_unit;
        $purchaseprice->date = $request->date;
        $purchaseprice->status = $status;
        $purchaseprice->product_id = $request->product_id;  // Add product_id field
        $purchaseprice->save();

        return redirect()->route('pvd.purchase-price.index')->with('success', 'Purchase Price has been updated successfully!');
    }
    public function destroy(Request $request, $id)
    {
        $purchaseprice = PurchasePrice::find($id);
        $purchaseprice->delete();
        return redirect()->route('pvd.purchase-price.index')->with('success', 'Purchase Price has been Deleted successfully!');
    }

    public function view($id)
    {
        $products = Product::with('typeOfProduct', 'category', 'unit')->get();
        $purchaseprice = PurchasePrice::with('product.typeOfProduct', 'product.unit', 'product.category')->find($id);
        return view('erp.pvd.purchase-price.view', compact('products', 'purchaseprice'));
    }



}
