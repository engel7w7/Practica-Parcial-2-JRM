@extends('layouts.app')

@section('title', 'Editar Médico')

@section('content')
    <h1>Editar médico</h1>

    <div style="max-width: 600px;">
        <form action="{{ route('medicos.update', $medico) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500; color: #333;">Nombre completo</label>
                <input type="text" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; font-size: 0.95rem;" 
                       name="nombre_completo" value="{{ old('nombre_completo', $medico->nombre_completo) }}" required>
                @error('nombre_completo') <small style="color: #dc3545;">{{ $message }}</small> @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500; color: #333;">Especialidad</label>
                <select style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; font-size: 0.95rem;" name="especialidad_id" required>
                    <option value="">Selecciona una especialidad</option>
                    @foreach ($especialidades as $esp)
                        <option value="{{ $esp->id }}" @if (old('especialidad_id', $medico->especialidad_id) == $esp->id) selected @endif>
                            {{ $esp->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('especialidad_id') <small style="color: #dc3545;">{{ $message }}</small> @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500; color: #333;">Email</label>
                <input type="email" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; font-size: 0.95rem;" 
                       name="email" value="{{ old('email', $medico->email) }}" required>
                @error('email') <small style="color: #dc3545;">{{ $message }}</small> @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500; color: #333;">Teléfono</label>
                <input type="text" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; font-size: 0.95rem;" 
                       name="telefono" value="{{ old('telefono', $medico->telefono) }}" required>
                @error('telefono') <small style="color: #dc3545;">{{ $message }}</small> @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500; color: #333;">Estado</label>
                <select style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; font-size: 0.95rem;" name="estado" required>
                    <option value="">Selecciona un estado</option>
                    <option value="activo" @if (old('estado', $medico->estado) == 'activo') selected @endif>Activo</option>
                    <option value="inactivo" @if (old('estado', $medico->estado) == 'inactivo') selected @endif>Inactivo</option>
                </select>
                @error('estado') <small style="color: #dc3545;">{{ $message }}</small> @enderror
            </div>

            <div style="display: flex; gap: 10px;">
                <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
@endsection
