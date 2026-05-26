@extends('layouts.app')

@section('title', 'Médicos')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h1>Médicos</h1>
        <a href="{{ route('medicos.create') }}" class="btn btn-primary">Agregar médico</a>
    </div>

    <!-- Barra de búsqueda y filtros -->
    <div style="background: white; padding: 15px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #eee;">
        <form method="GET" action="{{ route('medicos.index') }}" style="display: flex; gap: 10px; flex-wrap: wrap; align-items: flex-end;">
            <div style="flex: 1; min-width: 250px;">
                <label style="display: block; font-size: 0.9rem; font-weight: 500; margin-bottom: 5px; color: #333;">Buscar por nombre o especialidad</label>
                <input type="text" name="buscar" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; font-size: 0.95rem;" 
                       placeholder="Ej: Juan, Cardiología" value="{{ $buscar }}">
            </div>
            <div>
                <label style="display: block; font-size: 0.9rem; font-weight: 500; margin-bottom: 5px; color: #333;">Estado</label>
                <select name="estado" style="padding: 8px; border: 1px solid #ddd; border-radius: 4px; font-size: 0.95rem;">
                    <option value="">Todos</option>
                    <option value="activo" @if($estado == 'activo') selected @endif>Activo</option>
                    <option value="inactivo" @if($estado == 'inactivo') selected @endif>Inactivo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
            @if($buscar || $estado)
                <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Limpiar</a>
            @endif
        </form>
    </div>

    @if (count($medicos) > 0)
        <table style="width: 100%; border-collapse: collapse; background: white;">
            <tr style="border-bottom: 2px solid #eee;">
                <th style="padding: 12px; text-align: left; font-weight: 600; color: #333;">Nombre</th>
                <th style="padding: 12px; text-align: left; font-weight: 600; color: #333;">Especialidad</th>
                <th style="padding: 12px; text-align: left; font-weight: 600; color: #333;">Email</th>
                <th style="padding: 12px; text-align: left; font-weight: 600; color: #333;">Teléfono</th>
                <th style="padding: 12px; text-align: left; font-weight: 600; color: #333;">Estado</th>
                <th style="padding: 12px; text-align: left; font-weight: 600; color: #333;">Acciones</th>
            </tr>
            @foreach ($medicos as $medico)
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 12px;">{{ $medico->nombre_completo }}</td>
                    <td style="padding: 12px;">{{ $medico->especialidad->nombre ?? '-' }}</td>
                    <td style="padding: 12px;">{{ $medico->email }}</td>
                    <td style="padding: 12px;">{{ $medico->telefono }}</td>
                    <td style="padding: 12px;">
                        <span style="padding: 4px 8px; border-radius: 3px; font-size: 0.85rem; @if ($medico->estado === 'activo') background: #d4edda; color: #155724; @else background: #f8d7da; color: #721c24; @endif">
                            {{ ucfirst($medico->estado) }}
                        </span>
                    </td>
                    <td style="padding: 12px;">
                        <a href="{{ route('medicos.show', $medico) }}" class="btn btn-sm btn-info" style="margin-right: 5px;">Ver</a>
                        <a href="{{ route('medicos.edit', $medico) }}" class="btn btn-sm btn-warning" style="margin-right: 5px;">Editar</a>
                        <form action="{{ route('medicos.destroy', $medico) }}" method="POST" style="display:inline;">
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
            @if($buscar || $estado)
                No se encontraron médicos con esos criterios. <a href="{{ route('medicos.index') }}" style="color: #0066cc; text-decoration: none;">Ver todos</a>
            @else
                No hay médicos registrados. <a href="{{ route('medicos.create') }}" style="color: #0066cc; text-decoration: none;">Crear uno</a>
            @endif
        </p>
    @endif
@endsection
