<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\TypeOfProduct;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Customer;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['typeOfProduct', 'category', 'unit', 'customer'])->get();
        return view('setting.product.index', compact('products'));
    }

    public function create()
    {
        $types = TypeOfProduct::all();
        $categories = Category::all();
        $units = Unit::all();
        $customers = Customer::all();
        return view('setting.product.create', compact('types', 'categories', 'units', 'customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'part_no' => 'required|string|max:255',
            'part_name' => 'required|string|max:255',
            'type_of_product_id' => 'required|exists:type_of_products,id',
            'category_id' => 'required|exists:categories,id',
            'unit_id' => 'required|exists:units,id',
            'customer_id' => 'required|exists:customers,id',
            'moq' => 'nullable|integer',
            'model' => 'nullable|string',
            'variance' => 'nullable|string',
            'description' => 'nullable|string',
            'part_weight' => 'nullable|string',
            'standard_packaging' => 'nullable|string',
            'customer_product_code' => 'nullable|string',
            'have_bom' => 'nullable|boolean',
        ]);

        Product::create($request->all());
        return redirect()->route('setting.product.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product,$id)
    {
        $product = Product::findOrFail($id);
        $types = TypeOfProduct::all();
        $categories = Category::all();
        $units = Unit::all();
        $customers = Customer::all();
        return view('setting.product.edit', compact('product', 'types', 'categories', 'units', 'customers'));
    }

    public function update(Request $request,$id)
    {
        $product = Product::find($id);
        $request->validate([
            'part_no' => 'required|string|max:255',
            'part_name' => 'required|string|max:255',
            'type_of_product_id' => 'required|exists:type_of_products,id',
            'category_id' => 'required|exists:categories,id',
            'unit_id' => 'required|exists:units,id',
            'customer_id' => 'required|exists:customers,id',
            'moq' => 'nullable|integer',
            'model' => 'nullable|string',
            'variance' => 'nullable|string',
            'description' => 'nullable|string',
            'part_weight' => 'nullable|string',
            'standard_packaging' => 'nullable|string',
            'customer_product_code' => 'nullable|string',
            'have_bom' => 'nullable|boolean',
        ]);

        $product->part_no = $request->part_no;
        $product->part_name = $request->part_name;
        $product->type_of_product_id = $request->type_of_product_id;
        $product->model = $request->model;
        $product->category_id = $request->category_id;
        $product->variance = $request->variance;
        $product->description = $request->description;
        $product->moq = $request->moq;
        $product->unit_id = $request->unit_id;
        $product->part_weight = $request->part_weight;
        $product->customer_id = $request->customer_id;
        $product->customer_product_code = $request->customer_product_code;
        $product->have_bom = $request->have_bom;
        $product->save();
        return redirect()->route('setting.product.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('setting.product.index')->with('success', 'Product deleted successfully.');
    }
}
