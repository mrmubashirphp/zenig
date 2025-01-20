<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\AreaLevelController;
use App\Http\Controllers\AreaRackController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\TonageController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {

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

});