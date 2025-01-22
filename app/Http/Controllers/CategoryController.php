<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{

    public function index(): View
    {
        $categories = Category::all();
        return view ('setting.category.index')->with('categories', $categories);
    }

 
    public function create(): View
    {
        return view('setting.category.create');
    }

  
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Category::create($input);
        return redirect('category')->with('flash_message', 'category Addedd!');
    }

  

    public function edit(string $id): View
    {
        $category = Category::find($id);
        return view('setting.category.edit')->with('categories', $category);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $category = Category::find($id);
        $input = $request->all();
        $category->update($input);
        return redirect('category')->with('flash_message', 'category Updated!');  
    }

    
    public function destroy(string $id): RedirectResponse
    {
        Category::destroy($id);
        return redirect('category')->with('flash_message', 'category deleted!'); 
    }
}