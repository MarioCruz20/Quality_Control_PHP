<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function obtenerTodos() {

        $list = Product::all();
        return response()->json($list);
    }

    function obtenerPorId(int $id) {

        $data = Product::find($id);
        return response()->json($data);
    }


    function eliminarPorId(int $id) {

        $data = Product::find($id);
        $data->delete();
        $message = ["message" => "Dato eliminado", "status" => true];
        return response()->json($message);
    }


    function actualizarPorId(Request $request) {
        $id = $request->id;
        $data = Product::find($id);
        $data->updated = now();
        $data->isactive = $request->isactive;
        $data->name = $request->name;
        $data->code = $request->code;
        $data->picture = $request->picture;
        $data->production_line_id = $request->production_line_id;

        $data->save();

        $message = ["message" => "Dato actualizado", "status" => true];

        return response()->json($message);
    }


    function crear(Request $request) {

        $data = new Product();
        $data->created = now();
        $data->createdby = $request->createdby;
        $data->updated = now();
        $data->isactive = $request->isactive;
        $data->name = $request->name;
        $data->code = $request->code;
        $data->picture = $request->picture;
        $data->production_line_id = $request->production_line_id;

        $data->save();

        $message = ["message" => "Dato creado", "status" => true];

        return response()->json($message);
    }

}