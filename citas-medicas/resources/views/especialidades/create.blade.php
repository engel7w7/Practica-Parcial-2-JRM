@extends('layouts.app')

@section('title', 'Crear Especialidad')

@section('content')
    <div style="margin-bottom: 25px;">
        <h1>Crear Especialidad</h1>
    </div>

    <form action="{{ route('especialidades.store') }}" method="POST" style="background: white; padding: 20px; border-radius: 4px;">
        @csrf

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #333;">Nombre *</label>
            <input type="text" name="nombre" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 0.95rem;" 
                   placeholder="Ej: Cardiología" required value="{{ old('nombre') }}">
            @error('nombre')
                <span style="color: #dc3545; font-size: 0.85rem;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #333;">Descripción</label>
            <textarea name="descripcion" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 0.95rem; min-height: 100px;" 
                      placeholder="Descripción breve de la especialidad">{{ old('descripcion') }}</textarea>
            @error('descripcion')
                <span style="color: #dc3545; font-size: 0.85rem;">{{ $message }}</span>
            @enderror
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('especialidades.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endsection
