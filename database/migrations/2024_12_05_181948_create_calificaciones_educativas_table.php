<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionesEducativasTable extends Migration
{
    public function up()
    {
        Schema::create('calificaciones_educativas', function (Blueprint $table) {
            $table->id(); // ID de la calificación
            $table->foreignId('estudiante_id')->constrained('estudiantes')->onDelete('cascade'); // Relación con estudiantes
            $table->foreignId('grupo_id')->constrained('grupos')->onDelete('cascade'); // Relación con grupos
            $table->decimal('primera_evaluacion', 5, 2); // Calificación de la primera evaluación
            $table->decimal('segunda_evaluacion', 5, 2); // Calificación de la segunda evaluación
            $table->decimal('evaluacion_final', 5, 2); // Calificación de la evaluación final
            $table->decimal('promedio', 5, 2)->nullable(); // Promedio de las evaluaciones
            $table->timestamps(); // Campos de fecha de creación y actualización
        });
    }

    public function down()
    {
        Schema::dropIfExists('calificaciones_educativas');
    }
}
