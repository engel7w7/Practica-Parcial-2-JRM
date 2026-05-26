@extends('layouts.app')

@section('title', 'Pacientes')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h1>Pacientes</h1>
        <a href="{{ route('pacientes.create') }}" class="btn btn-primary">Agregar paciente</a>
    </div>

    <!-- Barra de búsqueda -->
    <div style="background: white; padding: 15px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #eee;">
        <form method="GET" action="{{ route('pacientes.index') }}" style="display: flex; gap: 10px; flex-wrap: wrap; align-items: flex-end;">
            <div style="flex: 1; min-width: 250px;">
                <label style="display: block; font-size: 0.9rem; font-weight: 500; margin-bottom: 5px; color: #333;">Buscar por nombre o email</label>
                <input type="text" name="buscar" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; font-size: 0.95rem;" 
                       placeholder="Ej: Juan, juan@email.com" value="{{ request('buscar', '') }}">
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
            @if(request('buscar'))
                <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Limpiar</a>
            @endif
        </form>
    </div>

    @if (count($pacientes) > 0)
        <table style="width: 100%; border-collapse: collapse; background: white;">
            <tr style="border-bottom: 2px solid #eee;">
                <th style="padding: 12px; text-align: left; font-weight: 600; color: #333;">Nombre</th>
                <th style="padding: 12px; text-align: left; font-weight: 600; color: #333;">Email</th>
                <th style="padding: 12px; text-align: left; font-weight: 600; color: #333;">Teléfono</th>
                <th style="padding: 12px; text-align: left; font-weight: 600; color: #333;">Tipo</th>
                <th style="padding: 12px; text-align: left; font-weight: 600; color: #333;">F. Nacimiento</th>
                <th style="padding: 12px; text-align: left; font-weight: 600; color: #333;">Acciones</th>
            </tr>
            @foreach ($pacientes as $paciente)
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 12px;">{{ $paciente->nombre_completo }}</td>
                    <td style="padding: 12px;">{{ $paciente->email }}</td>
                    <td style="padding: 12px;">{{ $paciente->telefono }}</td>
                    <td style="padding: 12px;">
                        <span style="padding: 4px 8px; border-radius: 3px; font-size: 0.85rem; @if ($paciente->tipo_paciente === 'nuevo') background: #d1ecf1; color: #0c5460; @else background: #fff3cd; color: #856404; @endif">
                            {{ ucfirst($paciente->tipo_paciente) }}
                        </span>
                    </td>
                    <td style="padding: 12px;">{{ $paciente->fecha_nacimiento->format('d/m/Y') }}</td>
                    <td style="padding: 12px;">
                        <a href="{{ route('pacientes.show', $paciente) }}" class="btn btn-sm btn-info" style="margin-right: 5px;">Ver</a>
                        <a href="{{ route('pacientes.edit', $paciente) }}" class="btn btn-sm btn-warning" style="margin-right: 5px;">Editar</a>
                        <form action="{{ route('pacientes.destroy', $paciente) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <p style="color: #666; padding: 20px; background: #f9f9f9; border-radius: 4px;">
            No hay pacientes registrados. <a href="{{ route('pacientes.create') }}" style="color: #0066cc; text-decoration: none;">Crear uno</a>
        </p>
    @endif
@endsection
