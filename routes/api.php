<?php

use App\Http\Controllers\ProductionLineController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Definicion del endpoint:
//GET: normalmente se usa para datos que son solicitados
Route::get('/productionline/obtener/todos', function() {

    $controller = new ProductionLineController();
    return $controller->obtenerTodos();
});

//Aquí se crea una ruta con parametros dinamicos
//es decir {id}
Route::get('/productionline/obtener/{id}', function($id) {
    $controller = new ProductionLineController();
    return $controller->obtenerPorId($id);
    });

//Ejemplo de como llamar al controlador directamente
Route::delete('/productionline/eliminar/{id}', [ProductionLineController::class, 'eliminarPorId']);

//Esta ruta le pasa el request al controlador
//y el controlador lo recibe
Route::put('/productionline/actualizar', [ProductionLineController::class, 'actualizarPorId']);

//Route para crear
Route::post('/productionline/crear', [ProductionLineController::class, 'crear']);


//Definicion del endpoint:
//GET: normalmente se usa para datos que son solicitados
Route::get('/product/obtener/todos', function() {

    $controller = new ProductController();
    return $controller->obtenerTodos();
});

//Aquí se crea una ruta con parametros dinamicos
//es decir {id}
Route::get('/product/obtener/{id}', function($id) {
    $controller = new ProductController();
    return $controller->obtenerPorId($id);
    });

//Ejemplo de como llamar al controlador directamente
Route::delete('/product/eliminar/{id}', [ProductController::class, 'eliminarPorId']);

//Esta ruta le pasa el request al controlador
//y el controlador lo recibe
Route::put('/product/actualizar', [ProductController::class, 'actualizarPorId']);

//Route para crear
Route::post('/product/crear', [ProductController::class, 'crear']);

Route::get('/user', function (Request $request) {
    return $request->user();
    
})->middleware('auth:sanctum');