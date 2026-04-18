@extends('layout')

@section('content')

<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center text-white" style="background-color:#4f46e5;">
        <h5 class="mb-0">Quality Parameters</h5>
        <a href="/qualityparameters/create" class="btn btn-light btn-sm">+ Nuevo</a>
    </div>

    <div class="card-body">
        <table class="table table-hover text-center align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Humedad</th>
                    <th>Temperatura</th>
                    <th>Proteína</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($list as $q)
                <tr>
                    <td>{{ $q->quality_parameter_id }}</td>
                    <td>{{ $q->product_id }}</td>

                    <td>{{ $q->min_moisture }} - {{ $q->max_moisture }}</td>
                    <td>{{ $q->min_temperature }} - {{ $q->max_temperature }}</td>
                    <td>{{ $q->min_protein }} - {{ $q->max_protein }}</td>

                    <td>
                        <span class="badge {{ $q->isactive == 'Y' ? 'bg-success' : 'bg-secondary' }}">
                            {{ $q->isactive }}
                        </span>
                    </td>

                    <td>
                        <a href="/qualityparameters/edit/{{ $q->quality_parameter_id }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="/qualityparameters/destroy/{{ $q->quality_parameter_id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection