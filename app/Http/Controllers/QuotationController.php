<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Quotation;
use App\Models\Customer;
use App\Models\Product;
use App\Models\QuotationDetil;
use Illuminate\Support\Facades\Auth;

class QuotationController extends Controller
{
    public function index()
    {
        // Fetch all quotations with their associated customers
        $quotations = Quotation::with('customer')->get();
        return view('ERP.bd.quotation.index', compact('quotations'));
    }

    public function create()
    {
        // Fetch customers and products for the form dropdowns
        $customers = Customer::orderBy('created_at', 'ASC')->get();
        $rowCount = Quotation::count();
        $products = Product::all();

        return view('ERP.bd.quotation.create', compact('customers', 'products', 'rowCount'));
    }
    public function show($id)
    {
        $quotation = Quotation::with('qoutation_detail.products','customer')->findOrFail($id);
        $customers = Customer::orderBy('created_at','ASC')->get();
        $products = Product::all();
        $rowCount = Quotation::count();

        return view('ERP.bd.quotation.show', compact('quotation', 'customers', 'products', 'rowCount'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'outer_department' => 'required',
            'cc' => 'required',
        ]);

        $rowCount = Quotation::count();

        $quotation = new Quotation;
        $quotation->customer_id = $request->customer_id;
        $quotation->cc = $request->cc;
        $quotation->term = $request->term;
        $quotation->department = $request->outer_department;
        $quotation->date = $request->created_date;
        $quotation->created_by = $request->created_by;
        $quotation->ref_no = $rowCount + 1;
        $quotation->save();


        if (isset($request->products) && is_array($request->products)) {
            foreach ($request->products as $product) {
                $quotation_detail = new QuotationDetil();
                $quotation_detail->product_id = $product['product_id'];
                $quotation_detail->quotation_id = $quotation->id;
                $quotation_detail->remarks = (int) ($product['remarks'] ?? 1);
                $quotation_detail->price_rm = (int) ($product['price_rm'] ?? 1);
                $quotation_detail->save();
            }
        } else {
            // Handle the case where no products are sent
            throw new Exception("No products were provided in the request.");
        }


        return redirect()->route('ERP.bd.quotation.index')->with('success', 'Quotation created successfully.');
    }


    public function edit($id)
    {
        // Retrieve the quotation with its related details and associated products
        $quotation = Quotation::with('qoutation_detail.products','customer')->findOrFail($id);

        $customers = Customer::orderBy('created_at','ASC')->get();
        $products = Product::all();
        $rowCount = Quotation::count();

        return view('ERP.bd.quotation.edit', compact('quotation', 'customers', 'products', 'rowCount'));
    }


    public function update(Request $request, $id)
    {
        $quotation = Quotation::find($id);
        $request->validate([
            'customer_id' => 'required',
            'outer_department' => 'required',
            'cc' => 'required',
        ]);

        $rowCount = Quotation::count();

        $quotation->customer_id = $request->customer_id;
        $quotation->cc = $request->cc;
        $quotation->term = $request->term;
        $quotation->department = $request->outer_department;
        $quotation->date = $request->created_date;
        $quotation->created_by = $request->created_by;
        $quotation->save();


        if (isset($request->products) && is_array($request->products)) {
            foreach ($request->products as $product) {
                $quotation_detail = new QuotationDetil();
                $quotation_detail->product_id = $product['product_id'];
                $quotation_detail->quotation_id = $quotation->id;
                $quotation_detail->remarks = (int) ($product['remarks'] ?? 1);
                $quotation_detail->price_rm = (int) ($product['price_rm'] ?? 1);
                $quotation_detail->save();
            }
        } else {
            // Handle the case where no products are sent
            throw new Exception("No products were provided in the request.");
        }


        return redirect()->route('ERP.bd.quotation.index')->with('success', 'Quotation updated successfully.');
    }


    public function destroy($id)
    {
        // Find the quotation and delete it along with its products
        $quotation = Quotation::findOrFail($id);
        $quotation->qoutation_detail()->delete();
        $quotation->delete();

        return redirect()->route('ERP.bd.quotation.index')->with('success', 'Quotation deleted successfully.');
    }
}
