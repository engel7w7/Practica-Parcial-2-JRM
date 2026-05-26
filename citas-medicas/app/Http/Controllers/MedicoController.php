<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;
use App\Models\Especialidad;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Medico::with('especialidad');
        
        // Búsqueda por nombre o especialidad
        if ($request->has('buscar') && $request->buscar != '') {
            $buscar = $request->buscar;
            $query->where('nombre_completo', 'like', "%$buscar%")
                  ->orWhereHas('especialidad', function ($q) use ($buscar) {
                      $q->where('nombre', 'like', "%$buscar%");
                  });
        }
        
        // Filtrar por estado
        if ($request->has('estado') && $request->estado != '') {
            $query->where('estado', $request->estado);
        }
        
        $medicos = $query->get();
        
        // Siempre devolver JSON para peticiones API (/api/medicos)
        if (str_starts_with($request->path(), 'api/')) {
            return response()->json($medicos);
        }
        
        return view('medicos.index', [
            'medicos' => $medicos,
            'buscar' => $request->buscar ?? '',
            'estado' => $request->estado ?? ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $especialidades = Especialidad::all();
        return view('medicos.create', ['especialidades' => $especialidades]);   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $medico = Medico::create($request->all());
        
        if (str_starts_with($request->path(), 'api/')) {
            return response()->json($medico, 201);
        }
        
        return redirect()->route('medicos.index')->with('success', 'Médico creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Medico $medico)
    {
        if (str_starts_with($request->path(), 'api/')) {
            return response()->json($medico);
        }
        
        return view('medicos.show', ['medico' => $medico]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medico $medico)
    {
        $especialidades = Especialidad::all();
        return view('medicos.edit', ['medico' => $medico, 'especialidades' => $especialidades]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medico $medico)
    {
        $medico->update($request->all());
        
        if (str_starts_with($request->path(), 'api/')) {
            return response()->json($medico);
        }
        
        return redirect()->route('medicos.index')->with('success', 'Médico actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Medico $medico)
    {
        $medico->delete();
        
        if (str_starts_with($request->path(), 'api/')) {
            return response()->json(['message' => 'Médico eliminado'], 200);
        }
        
        return redirect()->route('medicos.index')->with('success', 'Médico eliminado.');
    }
}

