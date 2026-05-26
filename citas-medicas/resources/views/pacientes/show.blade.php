@extends('layouts.app')

@section('title', 'Detalle de Paciente')

@section('content')
    <div style="margin-bottom: 25px;">
        <a href="{{ route('pacientes.index') }}" style="color: #0066cc; text-decoration: none;">← Volver</a>
        <h1 style="margin-top: 10px;">{{ $paciente->nombre_completo }}</h1>
    </div>

    <div style="background: white; padding: 20px; border-radius: 4px; margin-bottom: 20px;">
        <div style="margin-bottom: 15px;">
            <label style="font-weight: 600; color: #666;">Nombre:</label>
            <p style="margin: 5px 0 0 0; color: #333;">{{ $paciente->nombre_completo }}</p>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="font-weight: 600; color: #666;">Email:</label>
            <p style="margin: 5px 0 0 0; color: #333;">{{ $paciente->email }}</p>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="font-weight: 600; color: #666;">Teléfono:</label>
            <p style="margin: 5px 0 0 0; color: #333;">{{ $paciente->telefono }}</p>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="font-weight: 600; color: #666;">Dirección:</label>
            <p style="margin: 5px 0 0 0; color: #333;">{{ $paciente->direccion ?? '-' }}</p>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="font-weight: 600; color: #666;">Fecha de Nacimiento:</label>
            <p style="margin: 5px 0 0 0; color: #333;">{{ $paciente->fecha_nacimiento->format('d/m/Y') }}</p>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="font-weight: 600; color: #666;">Tipo de Paciente:</label>
            <p style="margin: 5px 0 0 0; color: #333;">
                <span style="padding: 4px 8px; border-radius: 3px; font-size: 0.85rem; @if ($paciente->tipo_paciente === 'nuevo') background: #d1ecf1; color: #0c5460; @else background: #fff3cd; color: #856404; @endif">
                    {{ ucfirst($paciente->tipo_paciente) }}
                </span>
            </p>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="font-weight: 600; color: #666;">Creado:</label>
            <p style="margin: 5px 0 0 0; color: #333;">{{ $paciente->created_at->format('d/m/Y H:i') }}</p>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="font-weight: 600; color: #666;">Actualizado:</label>
            <p style="margin: 5px 0 0 0; color: #333;">{{ $paciente->updated_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <div style="display: flex; gap: 10px;">
        <a href="{{ route('pacientes.edit', $paciente) }}" class="btn btn-primary">Editar</a>
        <form action="{{ route('pacientes.destroy', $paciente) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
        </form>
        <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </div>
@endsection
