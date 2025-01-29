<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\TypeOfProduct;
use Illuminate\View\View;

class TypeOfProductController extends Controller
{

    public function index(): View
    {
        $type_of_products = TypeOfProduct::all();
        return view ('setting.type_of_product.index')->with('type_of_products', $type_of_products);
    }

 
    public function create(): View
    {
        return view('setting.type_of_product.create');
    }

  
    public function store(Request $request): RedirectResponse
    {
       $request->validate([
            'name' => 'required',
            'code' => 'required'
       ]);

       $type_of_products = new TypeOfProduct;
       $type_of_products->name = $request->name;
       $type_of_products->code = $request->code;
       $type_of_products->save();
        return redirect('type_of_product')->with('success', 'type of product Added!');
    }

  

    public function edit(string $id): View
    {
        $type_of_product = TypeOfProduct::find($id);
        return view('setting.type_of_product.edit')->with('type_of_products', $type_of_product);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $type_of_product = TypeOfProduct::find($id);
        $input = $request->all();
        $type_of_product->update($input);
        return redirect('type_of_product')->with('flash_message', 'type_of_product Updated!');  
    }

    
    public function destroy(string $id): RedirectResponse
    {
        TypeOfProduct::destroy($id);
        return redirect('type_of_product')->with('flash_message', 'type_of_product deleted!'); 
    }
}