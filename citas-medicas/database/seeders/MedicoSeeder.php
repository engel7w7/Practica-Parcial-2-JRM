<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Medico;
use App\Models\Especialidad;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $especialidades = Especialidad::all();
        $count = $especialidades->count();
        
        for ($i = 0; $i < 15; $i++) {
            Medico::create([
                'nombre_completo' => fake()->name(),
                'especialidad_id' => $especialidades[$i % $count]->id,
                'telefono' => fake()->phoneNumber(),
                'email' => fake()->unique()->safeEmail(),
                'estado' => 'activo',
            ]);
        }
    }
}

