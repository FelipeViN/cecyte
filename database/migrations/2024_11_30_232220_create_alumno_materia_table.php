<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoMateriaTable extends Migration
{
    public function up()
    {
        Schema::create('alumno_materia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estudiantes_id')->constrained()->onDelete('cascade');  // FK a la tabla 'alumnos'
            $table->foreignId('materias_id')->constrained()->onDelete('cascade');  // FK a la tabla 'materias'
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alumno_materia');
    }
}
