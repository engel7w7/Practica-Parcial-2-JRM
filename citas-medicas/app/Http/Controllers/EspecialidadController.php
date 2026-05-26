<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;

class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $especialidades = Especialidad::all();
        
        if (str_starts_with($request->path(), 'api/')) {
            return response()->json($especialidades);
        }
        
        return view('especialidades.index', ['especialidades' => $especialidades]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('especialidades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $especialidad = Especialidad::create($request->all());
        
        if (str_starts_with($request->path(), 'api/')) {
            return response()->json($especialidad, 201);
        }
        
        return redirect()->route('especialidades.index')->with('success', 'Especialidad creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Especialidad $especialidad)
    {
        if (str_starts_with($request->path(), 'api/')) {
            return response()->json($especialidad);
        }
        
        return view('especialidades.show', ['especialidad' => $especialidad]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Especialidad $especialidad)
    {
        return view('especialidades.edit', ['especialidad' => $especialidad]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Especialidad $especialidad)
    {
        $especialidad->update($request->all());
        
        if (str_starts_with($request->path(), 'api/')) {
            return response()->json($especialidad);
        }
        
        return redirect()->route('especialidades.index')->with('success', 'Especialidad actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Especialidad $especialidad)
    {
        $especialidad->delete();
        
        if (str_starts_with($request->path(), 'api/')) {
            return response()->json(['message' => 'Especialidad eliminada'], 200);
        }
        
        return redirect()->route('especialidades.index')->with('success', 'Especialidad eliminada.');
    }
}

