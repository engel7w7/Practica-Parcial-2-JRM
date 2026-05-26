<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    /** @use HasFactory<\Database\Factories\MedicoFactory> */
    use HasFactory;
    protected $fillable = [
        'nombre_completo',
        'especialidad_id',
        'telefono',
        'email',
        'estado',
    ];

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class);
    }
}
