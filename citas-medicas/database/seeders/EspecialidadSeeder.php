<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Especialidad;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $especialidades = [
            [
                'nombre' => 'Pediatría',
                'descripcion' => 'Especialidad médica dedicada al diagnóstico y tratamiento de enfermedades en niños.',
            ],
            [
                'nombre' => 'Cardiología',
                'descripcion' => 'Especialidad que se ocupa del diagnóstico y tratamiento de enfermedades del corazón.',
            ],
            [
                'nombre' => 'Odontología',
                'descripcion' => 'Rama de la medicina que se dedica a la salud bucal y dental.',
            ],
            [
                'nombre' => 'Ginecología',
                'descripcion' => 'Especialidad médica que trata la salud reproductiva de las mujeres.',
            ],
            [
                'nombre' => 'Medicina General',
                'descripcion' => 'Atención médica general y consulta de primaria para los pacientes.',
            ],
        ];

        foreach ($especialidades as $especialidad) {
            Especialidad::create($especialidad);
        }
    }
}
