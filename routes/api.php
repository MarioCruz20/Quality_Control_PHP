<?php

//antes: use App\Http\Controllers\ProductionLineController;
//ahora:
use App\Http\Controllers\Api\ProductionLineController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// GET: se usa normalmente para enviar datos,
// sin necesidad de ocultar algun dato enviado
// desde el cliente
Route::get('/productionline/obtener/todos', function () {
    $controller = new ProductionLineController();
    $data = $controller->obtenerTodos();
    return $data;
});

Route::get('/productionline/obtener/{id}', function ($id) {
    $controller = new ProductionLineController();
    $data = $controller->obtenerPorId($id);
    return $data;
});

Route::delete('/productionline/eliminar/{id}', [ProductionLineController::class, 'eliminarPorId']);
Route::put('/productionline/actualizar', [ProductionLineController::class, 'actualizarPorId']);
Route::post('/productionline/crear', [ProductionLineController::class, 'crear']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
