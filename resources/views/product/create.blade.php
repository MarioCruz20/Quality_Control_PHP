@extends('layouts.app')

@section('title', 'Nuevo Producto')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('product.index') }}" class="inline-flex items-center text-sm font-nav text-blue-600 hover:text-blue-800 transition-colors">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Volver a la lista
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="p-8">
            <div class="mb-8">
                <h1 class="font-nav text-2xl font-bold text-gray-900">Registrar Nuevo Producto</h1>
                <p class="text-sm text-gray-500 mt-1">Complete los datos para dar de alta a un nuevo producto en el sistema.</p>
            </div>

            <form action="{{ route('product.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label for="productionline" class="block font-nav text-sm font-semibold text-gray-700 mb-2">Linea de Producción</label>
                        <div class="relative">
                            <select id="productionline" name="production_line_id" 
                                class="block w-full px-4 py-3 rounded-xl border border-gray-300 bg-white text-gray-700 font-sans focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none outline-none transition-all cursor-pointer">
                                <option value="" disabled {{ old('production_line_id') ? '' : 'selected' }}>Seleccionar...</option>
    
                                @foreach ($productionLines as $line)
                                    <option value="{{ $line->production_line_id }}" 
                                        {{ old('production_line_id') == $line->production_line_id ? 'selected' : '' }}>
                                        {{ $line->name }}
                                    </option>
                                @endforeach
                            </select>
                            
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <label for="name" class="block font-nav text-sm font-semibold text-gray-700 mb-2">Nombre del producto</label>
                        <input type="text" name="name" id="name" placeholder="Ej. Producto 1" 
                            value="{{ old('name') }}" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all placeholder:text-gray-400">
                    </div>

                    <div class="md:col-span-2">
                        <label for="code" class="block font-nav text-sm font-semibold text-gray-700 mb-2">Código del producto</label>
                        <input type="text" name="code" id="code" placeholder="Ej. PROD-001" 
                            value="{{ old('code') }}" required
                            class="uppercase w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none transition-all placeholder:text-gray-400">
                    </div>
                    
                    <div class="md:col-span-2">
                        <label for="picture" class="block font-nav text-sm font-semibold text-gray-700 mb-2">Imagen del producto</label>
                        <input type="text" name="picture" id="picture" placeholder="Ej. https://example.com/product-image.jpg" 
                            value="{{ old('picture') }}" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none transition-all placeholder:text-gray-400">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block font-nav text-sm font-semibold text-gray-700 mb-2">Estado</label>
                        <div class="flex items-center space-x-6 py-2">
                            <label class="inline-flex items-center cursor-pointer group">
                                <input type="radio" name="isactive" value="Y" 
                                {{ old('isactive') == 'Y' ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500" checked>
                                <span class="ml-2 text-sm text-gray-700 group-hover:text-blue-600 transition-colors">Activo</span>
                            </label>

                            <label class="inline-flex items-center cursor-pointer group">
                                <input type="radio" name="isactive" value="N" 
                                {{ old('isactive') == 'N' ? 'checked' : '' }}
                                class="w-4 h-4 text-red-600 border-gray-300 focus:ring-red-500">
                                <span class="ml-2 text-sm text-gray-700 group-hover:text-red-600 transition-colors">Inactivo</span>
                            </label>
                        </div>
                        <p class="mt-1 text-xs text-gray-400 italic">* Si se selecciona Inactivo, no se podran crear registros a partir de él.</p>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-100 flex items-center justify-end space-x-4">
                    <button type="reset" class="px-6 py-2.5 font-nav text-sm font-semibold text-gray-600 hover:text-gray-800 transition-colors">
                        Limpiar Formulario
                    </button>
                    <button type="submit" class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-nav font-bold rounded-xl shadow-lg shadow-blue-200 transition-all active:scale-95">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection