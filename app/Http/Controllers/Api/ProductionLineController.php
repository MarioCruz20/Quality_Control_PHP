<?php

// antes: namespace App\Http\Controllers;
// ahora:
namespace App\Http\Controllers\Api;

// importamos la clase Controller
use App\Http\Controllers\Controller;

use App\Models\ProductionLine;
use Illuminate\Http\Request;

class ProductionLineController extends Controller
{
    /**
     * Devuelve todos los registros
     * de la tabla production_line
     *
     * @return response - JSON - los datos de la tabla
     */
    function obtenerTodos() {
        
        // all() Equivale a:
        // SELECT * FROM production_line
        $list = ProductionLine::all();
        return response()->json($list);
    }

    function obtenerPorId(int $id) {
        
        // SELECT * FROM production_line WHERE production_line_id = ?
        $data = ProductionLine::find($id);
        return response()->json($data);
    }

    function eliminarPorId(int $id) {
        $data = ProductionLine::find($id);
        // DELETE FROM production_line WHERE production_line_id = ?
        $data->delete();
        $message = ["message" => "Dato eliminado", "status" => true];
        return response()->json($message);
    }
    
    function actualizarPorId(Request $request) {
        // capturamos el id enviado desde el cliente
        $id = $request->id;

        $data = ProductionLine::find($id);
        $data->updated = now();
        $data->updatedby = $request->updatedby;
        $data->isactive = $request->isactive;
        $data->name = $request->name;
        $data->description = $request->description;

        // UPDATE production_line SET updated = now(), updatedby = ?... WHERE production_line_id = ?
        $isOK = $data->save();

        $message = [];

        if ($isOK) {
            $message = ["message" => "Dato actualizado", "status" => true];
        } else {
            $message = ["message" => "Dato no actualizado", "status" => false];
        }

        return response()->json($message);
    }

    function crear(Request $request) {
        // capturamos el id enviado desde el cliente
        $data = new ProductionLine();
        $data->created = now();
        $data->createdby = $request->createdby;
        $data->updated = now();
        $data->updatedby = $request->updatedby;
        $data->isactive = $request->isactive;
        $data->name = $request->name;
        $data->description = $request->description;

        // INSERT INTO production_line (created, createdby...) VALUES (?, ?...);
        $isOK = $data->save();

        $message = [];

        if ($isOK) {
            $message = ["message" => "Dato insertado", "status" => true];
        } else {
            $message = ["message" => "Dato no insertado", "status" => false];
        }

        return response()->json($message);
    }
}
