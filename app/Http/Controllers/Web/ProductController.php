<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductionLine;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $productionLines = ProductionLine::all();
        return view('product.create', compact('productionLines'));
    }

    public function store(Request $request)
    {
        try {
            // validamos los datos recibidos del formulario
            $validatedData = $request->validate([
                'isactive' => 'required|string|max:1',
                'name' => 'required|string|max:100',
                'code' => 'required|string|max:100',
                'picture' => 'string|max:500',
                'production_line_id' => 'required|integer|exists:production_line,production_line_id',
            ]);

            // seteamos los datos para crear un nuevo producto
            $data = new Product();
            $data->created = now();
            $data->createdby = 0;
            $data->updated = now();
            $data->updatedby = 0;
            $data->isactive = $validatedData['isactive'];
            $data->name = $validatedData['name'];
            $data->code = $validatedData['code'];
            $data->picture = $validatedData['picture'];
            $data->production_line_id = $validatedData['production_line_id'];

            // creamos un nuevo registro en la base de datos
            $isOK = $data->save();

            if ($isOK) {
                // redirigimos con un mensaje de éxito
                return redirect()->route('product.index')->with('success', 'Registro creado exitosamente.');
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

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        try {
            // buscamos el registro por su id
            $product = Product::find($id);

            // obtenemos el listado de lineas de produccion
            $productionLines = ProductionLine::all();

            if ($product == null || $productionLines == null) {
                // si no se encuentra el registro, redirigimos con un mensaje de error
                return redirect()->route('product.index')->with('error', 'Registro no encontrado.');
            }

            // retornamos la vista con los datos del registro encontrado
            return view('product.edit', compact('product', 'productionLines'));            
        } catch (Exception $ex) {
            return redirect()->back()
            ->withInput()
            ->with('error', 'Error grave al buscar el registro.');
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            // validamos los datos recibidos del formulario
            $validatedData = $request->validate([
                'isactive' => 'required|string|max:1',
                'name' => 'required|string|max:100',
                'code' => 'required|string|max:100',
                'picture' => 'string|max:500',
                'production_line_id' => 'required|integer|exists:production_line,production_line_id',
            ]);

            // buscamos el registro por su id
            $product = Product::find($id);

            // validacion extra por si el registro lo ha eliminado otro usuario mientras se editaba
            if ($product == null) {
                // si no se encuentra el registro, redirigimos con un mensaje de error
                return redirect()->route('product.index')->with('error', 'Registro no encontrado.');
            }

            // actualizamos los campos del registro con los datos validados
            $product->updated = now();
            $product->updatedby = 0;
            $product->isactive = $validatedData['isactive'];
            $product->name = $validatedData['name'];
            $product->code = $validatedData['code'];
            $product->picture = $validatedData['picture'];
            $product->production_line_id = $validatedData['production_line_id'];

            // guardamos los cambios en la base de datos
            $isOK = $product->save();

            if ($isOK) {
                // redirigimos al usuario con un mensaje de éxito
                return redirect()->route('product.index')->with('success', 'Registro actualizado exitosamente.');
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

    public function destroy(string $id)
    {
        try {
            // buscamos el registro por su id
            $product = Product::find($id);

            if ($product == null) {
                // si no se encuentra el registro, redirigimos con un mensaje de error
                return redirect()->route('product.index')->with('error', 'Registro no encontrado.');
            }

            // eliminamos el registro de la base de datos
            $isOK = $product->delete();

            if ($isOK) {
                // redirigimos al usuario con un mensaje de éxito
                return redirect()->route('product.index')->with('success', 'Registro eliminado exitosamente.');
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
