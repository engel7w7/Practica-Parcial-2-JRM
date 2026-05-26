<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pacientes = Paciente::all();
        
        if (str_starts_with($request->path(), 'api/')) {
            return response()->json($pacientes);
        }
        
        return view('pacientes.index', ['pacientes' => $pacientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $paciente = Paciente::create($request->all());
        
        if (str_starts_with($request->path(), 'api/')) {
            return response()->json($paciente, 201);
        }
        
        return redirect()->route('pacientes.index')->with('success', 'Paciente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Paciente $paciente)
    {
        if (str_starts_with($request->path(), 'api/')) {
            return response()->json($paciente);
        }
        
        return view('pacientes.show', ['paciente' => $paciente]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', ['paciente' => $paciente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paciente $paciente)
    {
        $paciente->update($request->all());
        
        if (str_starts_with($request->path(), 'api/')) {
            return response()->json($paciente);
        }
        
        return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Paciente $paciente)
    {
        $paciente->delete();
        
        if (str_starts_with($request->path(), 'api/')) {
            return response()->json(['message' => 'Paciente eliminado'], 200);
        }
        
        return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado.');
    }
}

