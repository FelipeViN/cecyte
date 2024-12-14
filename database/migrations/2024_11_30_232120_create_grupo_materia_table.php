<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoMateriaTable extends Migration
{
    public function up()
    {
        Schema::create('grupo_materia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grupos_id')->constrained()->onDelete('cascade'); // FK a la tabla 'grupos'
            $table->foreignId('materias_id')->constrained()->onDelete('cascade'); // FK a la tabla 'materias'
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grupo_materia');
    }
}