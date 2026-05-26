<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo', 120);
            $table->string('email', 100)->unique();
            $table->string('telefono', 20);
            $table->string('direccion', 255)->nullable();
            $table->date('fecha_nacimiento');
            $table->enum('tipo_paciente', ['nuevo', 'recurrente']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
