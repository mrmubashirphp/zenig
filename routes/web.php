<?php

use App\Http\Controllers\AreaLevelController;
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

});