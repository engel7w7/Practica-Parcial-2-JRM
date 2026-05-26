@extends('layouts.app')

@section('title', 'Crear Paciente')

@section('content')
    <div style="margin-bottom: 25px;">
        <h1>Crear Paciente</h1>
    </div>

    <form action="{{ route('pacientes.store') }}" method="POST" style="background: white; padding: 20px; border-radius: 4px;">
        @csrf

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #333;">Nombre Completo *</label>
            <input type="text" name="nombre_completo" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 0.95rem;" 
                   placeholder="Ej: Juan Pérez García" required value="{{ old('nombre_completo') }}">
            @error('nombre_completo')
                <span style="color: #dc3545; font-size: 0.85rem;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #333;">Email *</label>
            <input type="email" name="email" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 0.95rem;" 
                   placeholder="Ej: juan@example.com" required value="{{ old('email') }}">
            @error('email')
                <span style="color: #dc3545; font-size: 0.85rem;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #333;">Teléfono *</label>
            <input type="tel" name="telefono" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 0.95rem;" 
                   placeholder="Ej: 3124567890" required value="{{ old('telefono') }}">
            @error('telefono')
                <span style="color: #dc3545; font-size: 0.85rem;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #333;">Dirección</label>
            <input type="text" name="direccion" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 0.95rem;" 
                   placeholder="Ej: Calle 45 #123-45" value="{{ old('direccion') }}">
            @error('direccion')
                <span style="color: #dc3545; font-size: 0.85rem;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #333;">Fecha de Nacimiento *</label>
            <input type="date" name="fecha_nacimiento" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 0.95rem;" 
                   required value="{{ old('fecha_nacimiento') }}">
            @error('fecha_nacimiento')
                <span style="color: #dc3545; font-size: 0.85rem;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #333;">Tipo de Paciente *</label>
            <select name="tipo_paciente" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 0.95rem;" required>
                <option value="">-- Seleccionar --</option>
                <option value="nuevo" @if(old('tipo_paciente') == 'nuevo') selected @endif>Nuevo</option>
                <option value="recurrente" @if(old('tipo_paciente') == 'recurrente') selected @endif>Recurrente</option>
            </select>
            @error('tipo_paciente')
                <span style="color: #dc3545; font-size: 0.85rem;">{{ $message }}</span>
            @enderror
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endsection
