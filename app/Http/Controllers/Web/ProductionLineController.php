<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ProductionLine;
use Exception;
use Illuminate\Http\Request;

class ProductionLineController extends Controller
{
    /**
     * Equivale a obtenerTodos.
     */
    public function index()
    {
        // obtenemos todos lo registros
        $productionLines = ProductionLine::all();
        // retornamos la vista con los datos obtenidos
        // compact() es una función de PHP que crea un array asociativo a 
        // partir de variables y sus valores.
        return view('production_line.index', compact('productionLines'));
    }

    /**
     * Este sirve para redirigir a la vista de creación.
     */
    public function create()
    {
        return view('production_line.create');
    }

    /**
     * Este sirve para almacenar los datos del formulario en la BD.
     */
    public function store(Request $request)
    {
        try {
            // validamos los datos recibidos del formulario
            $validatedData = $request->validate([
                'isactive' => 'required|string|max:1',
                'name' => 'required|string|max:100',
                'description' => 'required|string|max:100',
            ]);

            $data = new ProductionLine();
            $data->created = now();
            $data->createdby = 0; // mas adelante se reemplazará por el id del usuario autenticado
            $data->updated = now();
            $data->updatedby = 0;
            $data->isactive = $validatedData['isactive'];
            $data->name = $validatedData['name'];
            $data->description = $validatedData['description'];
    
            // creamos un nuevo registro en la base de datos
            //ProductionLine::create($validatedData);
            $isOK = $data->save();

            if ($isOK) {
                // redirigimos con un mensaje de éxito
                return redirect()->route('production_line.index')->with('success', 'Registro creado exitosamente.');
            } else {
                return redirect()->back()
                ->withInput() // Envía los datos del formulario de vuelta
                ->with('error', 'Error al crear el registro.');
            }
        } catch (Exception $ex) {
            return redirect()->back()
            ->withInput()
            ->with('error', 'Error grave al crear el registro.');
        }
    }

    /**
     * Este sirve para mostrar los detalles de un registro específico.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Este sirve para redirigir a la vista de edición.
     */
    public function edit(string $id)
    {
        try {
            // buscamos el registro por su id
            $productionLine = ProductionLine::find($id);

            if ($productionLine == null) {
                // si no se encuentra el registro, redirigimos con un mensaje de error
                return redirect()->route('production_line.index')->with('error', 'Registro no encontrado.');
            }

            // retornamos la vista con los datos del registro encontrado
            return view('production_line.edit', compact('productionLine'));            
        } catch (Exception $ex) {
            return redirect()->back()
            ->withInput()
            ->with('error', 'Error grave al buscar el registro.');
        }
    }

    /**
     * Este sirve para guardar los cambios de un registro específico
     */
    public function update(Request $request, string $id)
    {
        try {
            // validamos los datos recibidos del formulario
            $validatedData = $request->validate([
                'isactive' => 'required|string|max:1',
                'name' => 'required|string|max:100',
                'description' => 'required|string|max:100',
            ]);

            // buscamos el registro por su id
            $productionLine = ProductionLine::find($id);

            // validacion extra por si el registro lo ha eliminado otro usuario mientras se editaba
            if ($productionLine == null) {
                // si no se encuentra el registro, redirigimos con un mensaje de error
                return redirect()->route('production_line.index')->with('error', 'Registro no encontrado.');
            }

            // actualizamos los campos del registro con los datos validados
            $productionLine->updated = now();
            $productionLine->updatedby = 0; // mas adelante se reemplazará por el id del usuario autenticado
            $productionLine->isactive = $validatedData['isactive'];
            $productionLine->name = $validatedData['name'];
            $productionLine->description = $validatedData['description'];

            // guardamos los cambios en la base de datos
            $isOK = $productionLine->save();

            if ($isOK) {
                // redirigimos al usuario con un mensaje de éxito
                return redirect()->route('production_line.index')->with('success', 'Registro actualizado exitosamente.');
            } else {
                return redirect()->back()
                ->withInput() // Envía los datos del formulario de vuelta
                ->with('error', 'Error al actualizar el registro.');
            }
        } catch (Exception $ex) {
            return redirect()->back()
            ->withInput()
            ->with('error', 'Error grave al actualizar el registro.');
        }
    }

    /**
     * Este sirve para eliminar un registro específico.
     */
    public function destroy(string $id)
    {
        try {
            // buscamos el registro por su id
            $productionLine = ProductionLine::find($id);

            if ($productionLine == null) {
                // si no se encuentra el registro, redirigimos con un mensaje de error
                return redirect()->route('production_line.index')->with('error', 'Registro no encontrado.');
            }

            // eliminamos el registro de la base de datos
            $isOK = $productionLine->delete();

            if ($isOK) {
                // redirigimos al usuario con un mensaje de éxito
                return redirect()->route('production_line.index')->with('success', 'Registro eliminado exitosamente.');
            } else {
                return redirect()->back()
                ->with('error', 'Error al eliminar el registro.');
            }
        } catch (Exception $ex) {
            return redirect()->back()
            ->with('error', 'Error grave al eliminar el registro.');
        }
    }
}
