<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear usuario administrador para Filament
        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@citas-medicas.com',
            'password' => bcrypt('password123'), // Cambiar en producción
        ]);

        // Crear usuario de prueba
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        $this->call([
            EspecialidadSeeder::class,
            MedicoSeeder::class,
            PacienteSeeder::class,
        ]);
    }
}
