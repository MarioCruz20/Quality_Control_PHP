<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\QualityParameters;
use App\Models\Product;
use Illuminate\Http\Request;

class QualityParametersController extends Controller
{
    public function index()
    {
        $list = QualityParameters::all();
        return view('qualityparameters.index', compact('list'));
    }

    public function create()
    {
        $products = Product::all();
        return view('qualityparameters.create', compact('products'));
    }

    public function store(Request $request)
    {
        $data = new QualityParameters();

        $data->created = now();
        $data->createdby = 0;
        $data->updated = now();
        $data->updatedby = 0;
        $data->isactive = $request->isactive;

        $data->min_moisture = $request->min_moisture;
        $data->max_moisture = $request->max_moisture;
        $data->min_temperature = $request->min_temperature;
        $data->max_temperature = $request->max_temperature;
        $data->min_sodium = $request->min_sodium;
        $data->max_sodium = $request->max_sodium;
        $data->min_protein = $request->min_protein;
        $data->max_protein = $request->max_protein;

        $data->product_id = $request->product_id;

        $data->save();

        return redirect()->route('qualityparameters.index');
    }

    public function edit($id)
    {
        $qualityParameters = QualityParameters::find($id);
        $products = Product::all();

        return view('qualityparameters.edit', compact('qualityParameters', 'products'));
    }

    public function update(Request $request, $id)
    {
        $data = QualityParameters::find($id);

        $data->updated = now();
        $data->updatedby = 0;
        $data->isactive = $request->isactive;

        $data->min_moisture = $request->min_moisture;
        $data->max_moisture = $request->max_moisture;
        $data->min_temperature = $request->min_temperature;
        $data->max_temperature = $request->max_temperature;
        $data->min_sodium = $request->min_sodium;
        $data->max_sodium = $request->max_sodium;
        $data->min_protein = $request->min_protein;
        $data->max_protein = $request->max_protein;

        $data->product_id = $request->product_id;

        $data->save();

        return redirect()->route('qualityparameters.index');
    }

    public function destroy($id)
    {
        $data = QualityParameters::find($id);
        $data->delete();

        return redirect()->route('qualityparameters.index');
    }
}