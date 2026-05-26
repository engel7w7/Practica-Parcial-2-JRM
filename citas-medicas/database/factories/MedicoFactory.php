<?php

namespace Database\Factories;

use App\Models\Medico;
use App\Models\Especialidad;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Medico>
 */
class MedicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_completo' => $this->faker->name(),
            'especialidad_id' => Especialidad::factory(),
            'telefono' => $this->faker->numerify('###########'),
            'email' => $this->faker->unique()->safeEmail(),
            'estado' => $this->faker->randomElement(['activo', 'inactivo']),
        ];
    }
}
