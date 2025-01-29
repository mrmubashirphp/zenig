<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    //

    public function index(){
        $invoices = Invoice::orderBy('created_at','ASC')->get();
        return view('erp.bd.invoice.index',[
            'invoices' => $invoices
        ]);
    }

    public function create(){
        $cutomers = Customer::orderBy('created_at','ASC')->get();
        $products = Product::orderBy('created_at','ASC')->with('unit')->get();
        return view('erp.bd.invoice.create',[
            'products' => $products,
            'cutomers' => $cutomers
        ]);
    }
    public function store(Request $request){
        $request->validate([
            'do_no' => 'required',
            'invoice_no' => 'required|unique:invoices',
            'customer' => 'required',
            'date' => 'required',
            'create_by' => 'required',
            'term' => 'required',
            'ac_no' => 'required',
        ]);

        $invoice = new Invoice;
        $invoice->do_no = $request->do_no;
        $invoice->invoice_no = $request->invoice_no;
        $invoice->cutomer_id = $request->customer;
        $invoice->date = $request->date;
        $invoice->create_by = $request->create_by;
        $invoice->term = $request->term;
        $invoice->ac_no = $request->ac_no;
        $invoice->save();


        foreach ($request->products as $products) {
            $invoice_detail = new InvoiceDetail;
            $invoice_detail->invoice_id = $invoice->id;
            $invoice_detail->product_id = $products['product_id'];
            $invoice_detail->quantity = (int) $products['quantity'] ?? 1;
            $invoice_detail->unit_price = (int) $products['unit_price'] ?? 1;
            $invoice_detail->save();
        }
        

        return redirect(route('bd.invoice.index'))->with('success','Invoice has been Added Successfully!');
    }
    public function edit($id){
        $cutomers = Customer::orderBy('created_at','ASC')->get();
        $products = Product::orderBy('created_at','ASC')->with('unit')->get();
        $invoice = Invoice::with('invoice_detail.product.unit','customer')->find($id);
        return view('erp.bd.invoice.edit',[
            'invoice' => $invoice,
            'products' => $products,
            'cutomers' => $cutomers
        ]);
    }
    public function update(Request $request,$id){
        $invoice = Invoice::find($id);
        $request->validate([
            'do_no' => 'required',
            'invoice_no' => 'required',
            'customer' => 'required',
            'date' => 'required',
            'create_by' => 'required',
            'term' => 'required',
            'ac_no' => 'required',
        ]);

        $invoice->do_no = $request->do_no;
        $invoice->invoice_no = $request->invoice_no;
        $invoice->cutomer_id = $request->customer;
        $invoice->date = $request->date;
        $invoice->create_by = $request->create_by;
        $invoice->term = $request->term;
        $invoice->ac_no = $request->ac_no;
        $invoice->save();

        $invoice->invoice_detail()->delete();

        foreach ($request->products as $products) {
            $invoice_detail = new InvoiceDetail;
            $invoice_detail->invoice_id = $invoice->id;
            $invoice_detail->product_id = $products['product_id'];
            $invoice_detail->quantity = (int) $products['quantity'] ?? 1;
            $invoice_detail->unit_price = (int) $products['unit_price'] ?? 1;
            $invoice_detail->save();
        }
        

        return redirect(route('bd.invoice.index'))->with('success','Invoice has been Updated Successfully!');
    }
    public function destroy($id){
        $invoice = Invoice::find($id);
        $invoice->invoice_detail()->delete();
        $invoice->delete();
        return redirect(route('bd.invoice.index'))->with('success','Invoice has been Deleted Successfully!');
    }

    public function view($id){
        $cutomers = Customer::orderBy('created_at','ASC')->get();
        $products = Product::orderBy('created_at','ASC')->with('unit')->get();
        $invoice = Invoice::with('invoice_detail.product.unit','customer')->find($id);
        return view('erp.bd.invoice.view',[
            'invoice' => $invoice,
            'products' => $products,
            'cutomers' => $cutomers
        ]);
    }

}
