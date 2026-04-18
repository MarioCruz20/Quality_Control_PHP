@extends('layout')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-7">

        <div class="card shadow-sm">
            <div class="card-header text-white" style="background-color:#4f46e5;">
                <h5>Nuevo Quality Parameter</h5>
            </div>

            <div class="card-body">
                <form method="POST" action="/qualityparameters/store">
                    @csrf

                    <div class="mb-3">
                        <label>Producto</label>
                        <select name="product_id" class="form-select">
                            @foreach($products as $p)
                                <option value="{{ $p->product_id }}">{{ $p->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label>Min Humedad</label>
                            <input type="number" step="0.01" name="min_moisture" class="form-control">
                        </div>

                        <div class="col-md-6 mb-2">
                            <label>Max Humedad</label>
                            <input type="number" step="0.01" name="max_moisture" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label>Min Temperatura</label>
                            <input type="number" step="0.01" name="min_temperature" class="form-control">
                        </div>

                        <div class="col-md-6 mb-2">
                            <label>Max Temperatura</label>
                            <input type="number" step="0.01" name="max_temperature" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label>Min Sodio</label>
                            <input type="number" step="0.01" name="min_sodium" class="form-control">
                        </div>

                        <div class="col-md-6 mb-2">
                            <label>Max Sodio</label>
                            <input type="number" step="0.01" name="max_sodium" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label>Min Proteína</label>
                            <input type="number" step="0.01" name="min_protein" class="form-control">
                        </div>

                        <div class="col-md-6 mb-2">
                            <label>Max Proteína</label>
                            <input type="number" step="0.01" name="max_protein" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Estado</label>
                        <select name="isactive" class="form-select">
                            <option value="Y">Activo</option>
                            <option value="N">Inactivo</option>
                        </select>
                    </div>

                    <button class="btn btn-primary">Guardar</button>
                    <a href="/qualityparameters" class="btn btn-secondary">Volver</a>

                </form>
            </div>
        </div>

    </div>
</div>

@endsection