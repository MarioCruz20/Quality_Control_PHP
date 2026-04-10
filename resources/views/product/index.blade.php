@extends('layouts.app')

@section('title', 'Lista de Productos')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="font-nav text-2xl font-bold text-gray-800 tracking-tight">Gestión de Productos</h1>
            <p class="text-sm text-gray-500 font-sans">Visualiza, crea, edita y elimina productos.</p>
        </div>
        
        <a href="product/create" class="inline-flex items-center justify-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-nav font-semibold rounded-lg shadow-sm transition-all transition-transform hover:scale-105">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Registrar Nuevo
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 font-nav text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">ID</th>
                        <th class="px-6 py-4 font-nav text-xs font-semibold text-gray-600 uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-4 font-nav text-xs font-semibold text-gray-600 uppercase tracking-wider">Código</th>
                        <th class="px-6 py-4 font-nav text-xs font-semibold text-gray-600 uppercase tracking-wider">Fecha Registro</th>
                        <th class="px-6 py-4 font-nav text-xs font-semibold text-gray-600 uppercase tracking-wider">Fecha Actualización</th>
                        <th class="px-6 py-4 font-nav text-xs font-semibold text-gray-600 uppercase tracking-wider">Línea de Producción</th>
                        <th class="px-6 py-4 font-nav text-xs font-semibold text-gray-600 uppercase tracking-wider">Estado</th>
                        <th class="px-6 py-4 font-nav text-xs font-semibold text-gray-600 uppercase tracking-wider text-right">Opciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 font-sans">
                    @forelse($products as $product)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-500 text-center">{{ $product->product_id }}</td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-semibold text-gray-900">{{ $product->name }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $product->code }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $product->created->format('d M Y h:i A') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $product->updated->format('d M Y h:i A') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $product->productionLine->name }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                @if ($product->isactive == 'Y')
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Activo
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        Inactivo
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end space-x-2">
                                    <a href="{{ route('product.edit', $product->product_id) }}" 
                                    class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-md transition-colors inline-block"
                                    title="Editar">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('product.destroy', $product->product_id) }}" method="POST" 
                                        onsubmit="return confirm('¿Estás seguro de eliminar el registro {{ $product->name }}? Esta acción no se puede deshacer.');"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button type="submit" class="p-1.5 text-red-600 hover:bg-red-50 rounded-md transition-colors" title="Eliminar">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-gray-500 italic">
                                No se encontraron registrados en el sistema.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection