<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoGrupoTable extends Migration
{
    public function up()
    {
        Schema::create('alumno_grupo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estudiante_id')->constrained('estudiantes')->onDelete('cascade'); // FK a 'estudiantes'
            $table->foreignId('grupo_id')->constrained('grupos')->onDelete('cascade');           // FK a 'grupos'
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alumno_grupo');
    }
}
