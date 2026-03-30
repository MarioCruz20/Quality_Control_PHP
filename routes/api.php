<?php

use App\Http\Controllers\ProductionLineController;
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

//Ejemplo de como llamar al controlador durectamente
Route::delete('/productionline/eliminar/{id}', [ProductionLineController::class, 'eliminarPorId']);

//Esta ruta le pasa el request al controlador
//y el controlador lo recibe
Route::put('/productionline/actualizar', [ProductionLineController::class, 'actualizarPorId']);

//Route para crear
Route::post('/productionline/crear', [ProductionLineController::class, 'crear']);

Route::get('/user', function (Request $request) {
    return $request->user();
    
})->middleware('auth:sanctum');
