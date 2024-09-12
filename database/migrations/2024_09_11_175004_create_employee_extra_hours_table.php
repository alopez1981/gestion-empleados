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
        Schema::create('employee_extra_hours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade'); // Relación con empleados
            $table->foreignId('extra_concept_id')->constrained()->onDelete('cascade'); // Relación con conceptos de horas extras
            $table->decimal('cantidad', 8, 2); // Cantidad de horas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_extra_hours');
    }
};
