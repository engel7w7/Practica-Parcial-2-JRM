<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    /** @use HasFactory<\Database\Factories\PacienteFactory> */
    use HasFactory;
    protected $fillable = [
        'nombre_completo',
        'email',
        'telefono',
        'direccion',
        'fecha_nacimiento',
        'tipo_paciente',
    ];
    
    public function pacientes()
    {
        return $this->hasMany(Paciente::class);
    }
}
