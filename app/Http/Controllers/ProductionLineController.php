<?php

namespace App\Http\Controllers;

use App\Models\ProductionLine;
use Illuminate\Http\Request;

//Sin el extends Controller no se podrian hacer las solicitudes desde el cliente
class ProductionLineController extends Controller
{
    /**
     * 
     * 
     */
    //Metodo que devuelve todos los productos de la tabla "productionline"
    Function obtenerTodos() {

    //all() muestra todos los registros, en este caso de production_line
    $list = ProductionLine::all(); 
    return  response()->json($list);//SELECT * FROM production_line
    }

    function obtenerPorId(int $id) {
        //SELECT * FROM production_line WEHRE production_line_id = ?
        $data = ProductionLine::find($id);

        return response()->json($data);
    }

    function eliminarPorId(int $id) {
        //SELECT * FROM production_line WEHRE production_line_id = ?
        $data = ProductionLine::find($id);
        //Y cuando la encuentra la id se elimina el dato
        //SELECT * FROM production_line WEHRE production_line_id = ?
        $data->delete();

        //Se crea un mensaje para decirle al usuario que la eliminación se hizo correctamente
        $message = ["message" => "Dato eliminado", "status" => true];

        return response()->json($message);
    }

    //el atributo $request sirve para asignarle todos lo datos, recibiendo todos estos datos
    //y no tener que declarar cada uno ($id, $updatedby, $isactive, etc)
    function actualizarPorId(Request $request) {
        //$request puede que lo hayan enviado
        //Desde POST o GET
        $id = $request->id;

        //Buscar el id del producto que se va a actulizar
        $data = ProductionLine::find($id);
        $data->updated = now();
        $data->updatedby = $request->updatedby;
        $data->isactive = $request->isactive;
        $data->name = $request->name;
        $data->description = $request->description;
        //UPDATE production_line SET updated
        $data->save();

        $message = ["message" =>"Dato actualizado", "status" => true];
    }

        function crear(Request $request) {
    
        $data = new ProductionLine();
        $data->created = now();
        $data->createdby = $request->createdby;
        $data->updated = now();
        $data->updatedby = $request->updatedby;
        $data->isactive = $request->isactive;
        $data->name = $request->name;
        $data->description = $request->description;

        // INSERT INTO production_line (name, des...) VALUES (?, ?...)
        $data->save();

        $message = ["message" => "Dato creado", "status" => true];
        return response()->json($message);
    }
}
