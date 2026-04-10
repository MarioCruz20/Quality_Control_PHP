<?php

use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\ProductionLineController;
use Illuminate\Support\Facades\Route;

//Antes
//Route::get('/home', function () {
//    return view('home');
//});


Route::get('/', function () {
    return view('home');
});

//Cambio a primera vista 
Route::get('/home', function () {
    return view('welcome');
});

Route::get('/production_line', [ProductionLineController::class, 'index'])->name('production_line.index');

Route::get('/production_line/create', [ProductionLineController::class, 'create'])->name('production_line.create');
Route::post('/production_line/store', [ProductionLineController::class, 'store'])->name('production_line.store');
Route::get('/production_line/edit/{id}', [ProductionLineController::class, 'edit'])->name('production_line.edit');
Route::put('/production_line/update/{id}', [ProductionLineController::class, 'update'])->name('production_line.update');
Route::delete('/production_line/destroy/{id}', [ProductionLineController::class, 'destroy'])->name('production_line.destroy');

Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
