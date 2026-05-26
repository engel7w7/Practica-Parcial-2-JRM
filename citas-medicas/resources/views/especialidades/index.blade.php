@extends('layouts.app')

@section('title', 'Especialidades')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h1>Especialidades</h1>
        <a href="{{ route('especialidades.create') }}" class="btn btn-primary">Agregar especialidad</a>
    </div>

    @if (count($especialidades) > 0)
        <table style="width: 100%; border-collapse: collapse; background: white;">
            <tr style="border-bottom: 2px solid #eee;">
                <th style="padding: 12px; text-align: left; font-weight: 600; color: #333;">Nombre</th>
                <th style="padding: 12px; text-align: left; font-weight: 600; color: #333;">Descripción</th>
                <th style="padding: 12px; text-align: left; font-weight: 600; color: #333;">Acciones</th>
            </tr>
            @foreach ($especialidades as $especialidad)
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 12px;">{{ $especialidad->nombre }}</td>
                    <td style="padding: 12px;">{{ $especialidad->descripcion }}</td>
                    <td style="padding: 12px;">
                        <a href="{{ route('especialidades.show', $especialidad) }}" class="btn btn-sm btn-info" style="margin-right: 5px;">Ver</a>
                        <a href="{{ route('especialidades.edit', $especialidad) }}" class="btn btn-sm btn-warning" style="margin-right: 5px;">Editar</a>
                        <form action="{{ route('especialidades.destroy', $especialidad) }}" method="POST" style="display:inline;">
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
            No hay especialidades registradas. <a href="{{ route('especialidades.create') }}" style="color: #0066cc; text-decoration: none;">Crear una</a>
        </p>
    @endif
@endsection
