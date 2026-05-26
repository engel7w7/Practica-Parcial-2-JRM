@extends('layouts.app')

@section('title', 'Detalle de Especialidad')

@section('content')
    <div style="margin-bottom: 25px;">
        <a href="{{ route('especialidades.index') }}" style="color: #0066cc; text-decoration: none;">← Volver</a>
        <h1 style="margin-top: 10px;">{{ $especialidad->nombre }}</h1>
    </div>

    <div style="background: white; padding: 20px; border-radius: 4px; margin-bottom: 20px;">
        <div style="margin-bottom: 15px;">
            <label style="font-weight: 600; color: #666;">Nombre:</label>
            <p style="margin: 5px 0 0 0; color: #333;">{{ $especialidad->nombre }}</p>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="font-weight: 600; color: #666;">Descripción:</label>
            <p style="margin: 5px 0 0 0; color: #333;">{{ $especialidad->descripcion ?? '-' }}</p>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="font-weight: 600; color: #666;">Creado:</label>
            <p style="margin: 5px 0 0 0; color: #333;">{{ $especialidad->created_at->format('d/m/Y H:i') }}</p>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="font-weight: 600; color: #666;">Actualizado:</label>
            <p style="margin: 5px 0 0 0; color: #333;">{{ $especialidad->updated_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <div style="display: flex; gap: 10px;">
        <a href="{{ route('especialidades.edit', $especialidad) }}" class="btn btn-primary">Editar</a>
        <form action="{{ route('especialidades.destroy', $especialidad) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
        </form>
        <a href="{{ route('especialidades.index') }}" class="btn btn-secondary">Cancelar</a>
    </div>
@endsection
