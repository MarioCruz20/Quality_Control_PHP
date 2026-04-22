@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Control de cálidad</h1>

<div class="container mx-auto">

    <h1 class="text-2xl font-bold mb-6">Panel de Control</h1>

    <!-- Tarjetas -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

        <div class="bg-white shadow-md rounded-xl p-4">
            <h2 class="text-gray-600">Productos</h2>
            <p class="text-2xl font-bold">--</p>
        </div>

        <div class="bg-white shadow-md rounded-xl p-4">
            <h2 class="text-gray-600">Inspecciones</h2>
            <p class="text-2xl font-bold">--</p>
        </div>

        <div class="bg-white shadow-md rounded-xl p-4">
            <h2 class="text-gray-600">Aprobados</h2>
            <p class="text-2xl font-bold text-green-600">--</p>
        </div>

    </div>

    <!-- Accesos rápidos -->
    <div class="bg-white shadow-md rounded-xl p-6">
        <h2 class="text-lg font-semibold mb-4">Accesos rápidos</h2>

        <div class="flex gap-4 flex-wrap">
            <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Registrar producto
            </a>

            <a href="#" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
                Ver registros
            </a>

            <a href="#" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                Reportes
            </a>
        </div>
    </div>

</div>
@endsection