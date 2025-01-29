<?php

namespace App\Http\Controllers;

use App\Models\Order; 
use App\Models\OrderProduct; 
use App\Models\Customer;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer')->get();
        return view('order.index', compact('orders'));
    }

public function create()
{
    $customers = Customer::orderBy('created_at','ASC')->get();
    $products = Product::with(['typeOfProduct', 'category', 'unit', 'customer'])->get();  
    return view('order.create', compact('customers', 'products'));
}

public function store(Request $request)
{
   $request->validate([
    'created_by' => 'required',
    'created_date' => 'required',
    'order_no' => 'required',
    'order_month' => 'required',
    'customer_id' => 'required',
   ]);

    $order = new Order;
    $order->created_by = $request->created_by;
    $order->created_date = $request->created_date;
    $order->order_no = $request->order_no;
    $order->po_no = $request->po_no;
    $order->order_month = $request->order_month;
    $order->status = $request->status;
    $order->customer_id = $request->customer_id;
    $order->attachment = $request->attachment;
    $order->save();
    

    foreach ($request->products as $products) {
        $order_product = new OrderProduct();
        $order_product->product_id = $products['product_id'];
        $order_product->order_id = $order->id;
        $order_product->price = (int) $products['price_unit'] ?? 1;
        $order_product->sst_percent = (int) $products['sst_percent'] ?? 1;
        $order_product->sst_value = (int) $products['sst_value'] ?? 1;
        $order_product->firm_qty = (int) $products['firm_qty'] ?? 1;
        $order_product->forecast_qty_1 = (int) $products['forecast_qty_1'] ?? 1;
        $order_product->forecast_qty_2 = (int) $products['forecast_qty_2'] ?? 1;
        $order_product->forecast_qty_3 = (int) $products['forecast_qty_3'] ?? 1;
        $order_product->save();
    }

    return redirect()->route('order.index')->with('status','Order has been Save successfully');
}

public function edit($id)
{
    $customers = Customer::orderBy('created_at', 'ASC')->get();
    $products = Product::with(['typeOfProduct', 'category', 'unit', 'customer'])->get();
    $order = Order::with('order_product.product')->find($id); 

    return view('order.edit', compact('order', 'customers', 'products'));
}


public function update(Request $request,$id)
{
    $order = Order::find($id);

    $request->validate([
        'created_by' => 'required',
        'created_date' => 'required',
        'order_no' => 'required',
        'order_month' => 'required',
        'customer_id' => 'required',
        'status' => 'required'
       ]);
    
        $order->created_by = $request->created_by;
        $order->created_date = $request->created_date;
        $order->order_no = $request->order_no;
        $order->po_no = $request->po_no;
        $order->order_month = $request->order_month;
        $order->status = $request->status;
        $order->customer_id = $request->customer_id;
        $order->attachment = $request->attachment;
        $order->save();
        
        $order->order_product()->delete();
    
        foreach ($request->products as $products) {
            $order_product = new OrderProduct();
            $order_product->product_id = $products['product_id'];
            $order_product->order_id = $order->id;
            $order_product->price = (int) $products['price_unit'] ?? 1;
            $order_product->sst_percent = (int) $products['sst_percent'] ?? 1;
            $order_product->sst_value = (int) $products['sst_value'] ?? 1;
            $order_product->firm_qty = (int) $products['firm_qty'] ?? 1;
            $order_product->forecast_qty_1 = (int) $products['forecast_qty_1'] ?? 1;
            $order_product->forecast_qty_2 = (int) $products['forecast_qty_2'] ?? 1;
            $order_product->forecast_qty_3 = (int) $products['forecast_qty_3'] ?? 1;
            $order_product->save();
        }

        return redirect()->route('order.index')->with('status','Order has been Update successfully');
}


public function show($id)
{
    $customers = Customer::orderBy('created_at','ASC')->get();
    $products = Product::with(['typeOfProduct', 'category', 'unit', 'customer'])->get();  
    $order = Order::with('order_product.product')->find($id); 

    return view('order.show', compact('order', 'customers', 'products'));
}

public function destroy($id)
{
    $order = Order::findOrFail($id);
    $order->order_product()->delete();
    $order->delete();
    return redirect()->route('order.index')->with('status', 'Order has been deleted successfully');
}


}

