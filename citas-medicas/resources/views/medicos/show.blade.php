@extends('layouts.app')

@section('title', 'Médico: ' . $medico->nombre_completo)

@section('content')
    <h1>{{ $medico->nombre_completo }}</h1>

    <div class="card" style="max-width: 600px;">
        <div class="card-body">
            <p><strong>Email:</strong> {{ $medico->email }}</p>
            <p><strong>Teléfono:</strong> {{ $medico->telefono }}</p>
            <p><strong>Especialidad:</strong> {{ $medico->especialidad->nombre ?? '-' }}</p>
            <p><strong>Estado:</strong> 
                <span class="badge @if ($medico->estado === 'activo') bg-success @else bg-danger @endif">
                    {{ ucfirst($medico->estado) }}
                </span>
            </p>
            <p class="text-muted small">
                Creado: {{ $medico->created_at->format('d/m/Y H:i') }}<br>
                Actualizado: {{ $medico->updated_at->format('d/m/Y H:i') }}
            </p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Volver</a>
        <a href="{{ route('medicos.edit', $medico) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('medicos.destroy', $medico) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
        </form>
    </div>
@endsection
