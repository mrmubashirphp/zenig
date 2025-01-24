<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchasePriceController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TypeOfProductController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AreaLevelController;
use App\Http\Controllers\AreaRackController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\TonageController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {

//START MUBASHIR


    //AREA LEVEL 
    Route::get('/area-level/index', [AreaLevelController::class, 'index'])->name('area.level.index');
    Route::get('/area-level/create', [AreaLevelController::class, 'create'])->name('area.level.create');
    Route::post('/area-level/store', [AreaLevelController::class, 'store'])->name('area.level.store');
    Route::get('/area-level/edit/{id}', [AreaLevelController::class, 'edit'])->name('area.level.edit');
    Route::put('/area-level/update/{id}', [AreaLevelController::class, 'update'])->name('area.level.update');
    Route::delete('/area-level/destroy/{id}', [AreaLevelController::class, 'destroy'])->name('area.level.destroy');
    Route::get('/area-level/view/{id}', [AreaLevelController::class, 'view'])->name('area.level.view');



    //AREA RACK
    Route::get('/area-rack/index', [AreaRackController::class, 'index'])->name('area.rack.index');
    Route::get('/area-rack/create', [AreaRackController::class, 'create'])->name('area.rack.create');
    Route::post('/area-rack/store', [AreaRackController::class, 'store'])->name('area.rack.store');
    Route::get('/area-rack/edit/{id}', [AreaRackController::class, 'edit'])->name('area.rack.edit');
    Route::put('/area-rack/update/{id}', [AreaRackController::class, 'update'])->name('area.rack.update');
    Route::delete('/area-rack/destroy/{id}', [AreaRackController::class, 'destroy'])->name('area.rack.destroy');
    Route::get('/area-rack/view/{id}', [AreaRackController::class, 'view'])->name('area.rack.view');


    //AREA
    Route::get('/area/index', [AreaController::class, 'index'])->name('area.index');
    Route::get('/area/create', [AreaController::class, 'create'])->name('area.create');
    Route::post('/area/store', [AreaController::class, 'store'])->name('area.store');
    Route::get('/area/edit/{id}', [AreaController::class, 'edit'])->name('area.edit'); 
    Route::put('/area/update/{id}', [AreaController::class, 'update'])->name('area.update'); 
    Route::delete('/area/destroy/{id}', [AreaController::class, 'destroy'])->name('area.destroy');
    Route::get('/area/view/{id}', [AreaController::class, 'view'])->name('area.view');


    //Type
    Route::get('/type/index', [TypeController::class, 'index'])->name('type.index');
    Route::get('/type/create', [TypeController::class, 'create'])->name('type.create');
    Route::post('/type/store', [TypeController::class, 'store'])->name('type.store');
    Route::get('/type/edit/{id}', [TypeController::class, 'edit'])->name('type.edit'); 
    Route::put('/type/update/{id}', [TypeController::class, 'update'])->name('type.update'); 
    Route::delete('/type/destroy/{id}', [TypeController::class, 'destroy'])->name('type.destroy');
    Route::get('/type/view/{id}', [TypeController::class, 'view'])->name('type.view');


    //Process
    Route::get('/process/index', [ProcessController::class, 'index'])->name('process.index');
    Route::get('/process/create', [ProcessController::class, 'create'])->name('process.create');
    Route::post('/process/store', [ProcessController::class, 'store'])->name('process.store');
    Route::get('/process/edit/{id}', [ProcessController::class, 'edit'])->name('process.edit'); 
    Route::put('/process/update/{id}', [ProcessController::class, 'update'])->name('process.update'); 
    Route::delete('/process/destroy/{id}', [ProcessController::class, 'destroy'])->name('process.destroy');
    Route::get('/process/view/{id}', [ProcessController::class, 'view'])->name('process.view');


    //Tonage
    Route::get('/tonage/index', [TonageController::class, 'index'])->name('tonage.index');
    Route::get('/tonage/create', [TonageController::class, 'create'])->name('tonage.create');
    Route::post('/tonage/store', [TonageController::class, 'store'])->name('tonage.store');
    Route::get('/tonage/edit/{id}', [TonageController::class, 'edit'])->name('tonage.edit'); 
    Route::put('/tonage/update/{id}', [TonageController::class, 'update'])->name('tonage.update'); 
    Route::delete('/tonage/destroy/{id}', [TonageController::class, 'destroy'])->name('tonage.destroy');
    Route::get('/tonage/view/{id}', [TonageController::class, 'view'])->name('tonage.view');
    
    
    
    //Machine
    Route::get('/machine/index', [MachineController::class, 'index'])->name('machine.index');
    Route::get('/machine/create', [MachineController::class, 'create'])->name('machine.create');
    Route::post('/machine/store', [MachineController::class, 'store'])->name('machine.store');
    Route::get('/machine/edit/{id}', [MachineController::class, 'edit'])->name('machine.edit'); 
    Route::put('/machine/update/{id}', [MachineController::class, 'update'])->name('machine.update'); 
    Route::delete('/machine/destroy/{id}', [MachineController::class, 'destroy'])->name('machine.destroy');
    Route::get('/machine/view/{id}', [MachineController::class, 'view'])->name('machine.view');
    
    
    //PVD Purchase Price
    Route::get('/erp/pvd/purchase-price/index', [PurchasePriceController::class, 'index'])->name('pvd.purchase-price.index');
    Route::get('/erp/pvd/purchase-price/create', [PurchasePriceController::class, 'create'])->name('pvd.purchase-price.create');
    Route::post('/erp/pvd/purchase-price/store', [PurchasePriceController::class, 'store'])->name('pvd.purchase-price.store');
    Route::get('/erp/pvd/purchase-price/edit/{id}', [PurchasePriceController::class, 'edit'])->name('pvd.purchase-price.edit');
    Route::put('/erp/pvd/purchase-price/update/{id}', [PurchasePriceController::class, 'update'])->name('pvd.purchase-price.update');
    Route::delete('/erp/pvd/purchase-price/destroy/{id}', [PurchasePriceController::class, 'destroy'])->name('pvd.purchase-price.destroy');
    Route::get('/erp/pvd/purchase-price/view/{id}', [PurchasePriceController::class, 'view'])->name('pvd.purchase-price.view');
    

    //BD Invoice
    Route::get('/erp/bd/invoice/index', [InvoiceController::class, 'index'])->name('bd.invoice.index');
    Route::get('/erp/bd/invoice/create', [InvoiceController::class, 'create'])->name('bd.invoice.create');
    Route::post('/erp/bd/invoice/store', [InvoiceController::class, 'store'])->name('bd.invoice.store');
    Route::get('/erp/bd/invoice/edit/{id}', [InvoiceController::class, 'edit'])->name('bd.invoice.edit');
    Route::put('/erp/bd/invoice/update/{id}', [InvoiceController::class, 'update'])->name('bd.invoice.update');
    Route::delete('/erp/bd/invoice/destroy/{id}', [InvoiceController::class, 'destroy'])->name('bd.invoice.destroy');
    Route::get('/erp/bd/invoice/view/{id}', [InvoiceController::class, 'view'])->name('bd.invoice.view');


//END MUBASHIR









    // zulqarnain

Route::prefix('unit')->group(function () {
    Route::get('/', [UnitController::class, 'index'])->name('setting.unit.index');
    Route::get('/create', [UnitController::class, 'create'])->name('setting.unit.create');
    Route::post('/store', [UnitController::class, 'store'])->name('setting.unit.store');
    Route::get('/{id}/edit', [UnitController::class, 'edit'])->name('setting.unit.edit');
    Route::put('/update/{id}', [UnitController::class, 'update'])->name('setting.unit.update');
    Route::delete('/{id}', [UnitController::class, 'destroy'])->name('setting.unit.destroy');
});   

Route::prefix('type_of_product')->group(function () {
    Route::get('/', [TypeOfProductController::class, 'index'])->name('setting.type_of_product.index');
    Route::get('/create', [TypeOfProductController::class, 'create'])->name('setting.type_of_product.create');
    Route::post('/store', [TypeOfProductController::class, 'store'])->name('setting.type_of_product.store');
    Route::get('/edit/{id}', [TypeOfProductController::class, 'edit'])->name('setting.type_of_product.edit');
    Route::put('/update/{id}', [TypeOfProductController::class, 'update'])->name('setting.type_of_product.update');
    Route::delete('/{id}', [TypeOfProductController::class, 'destroy'])->name('setting.type_of_product.destroy');
});

Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('setting.category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('setting.category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('setting.category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('setting.category.edit');
    Route::put('/update/{id}', [CategoryController::class, 'update'])->name('setting.category.update');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('setting.category.destroy');
});
Route::prefix('supplier')->group(function () {
    Route::get('/', [SupplierController::class, 'index'])->name('setting.supplier.index');
    Route::get('/create', [SupplierController::class, 'create'])->name('setting.supplier.create');
    Route::post('/store', [SupplierController::class, 'store'])->name('setting.supplier.store');
    Route::get('/edit/{id}', [SupplierController::class, 'edit'])->name('setting.supplier.edit');
    Route::put('/update/{id}', [SupplierController::class, 'update'])->name('setting.supplier.update');
    Route::delete('/{id}', [SupplierController::class, 'destroy'])->name('setting.supplier.destroy');
});
Route::prefix('customer')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('setting.customer.index');
    Route::get('/create', [CustomerController::class, 'create'])->name('setting.customer.create');
    Route::post('/store', [CustomerController::class, 'store'])->name('setting.customer.store');
    Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('setting.customer.edit');
    Route::put('/update/{id}', [CustomerController::class, 'update'])->name('setting.customer.update');
    Route::delete('/{id}', [CustomerController::class, 'destroy'])->name('setting.customer.destroy');
});
Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('setting.product.index'); // List all products
    Route::get('/create', [ProductController::class, 'create'])->name('setting.product.create'); // Show create product form
    Route::post('/store', [ProductController::class, 'store'])->name('setting.product.store'); // Store new product
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('setting.product.edit'); // Show edit product form
    Route::put('/update/{id}', [ProductController::class, 'update'])->name('setting.product.update'); // Update product
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('setting.product.destroy'); // Delete product
});


Route::resource('departments', DepartmentController::class);
Route::resource('designations', DesignationController::class); 
Route::resource('staff', StaffController::class);
});




