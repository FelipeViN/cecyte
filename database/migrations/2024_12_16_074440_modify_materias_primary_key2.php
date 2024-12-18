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
        Schema::table('materias', function (Blueprint $table) {
            // Elimina el atributo AUTO_INCREMENT y la clave primaria de 'id'
            $table->dropPrimary();
            $table->dropColumn('id');

            // Asigna 'clave' como la nueva clave primaria
            $table->string('clave')->primary()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('materias', function (Blueprint $table) {
            // Eliminar la clave primaria actual en 'clave'
            $table->dropPrimary();

            // Restaurar la columna id con AUTO_INCREMENT
            $table->increments('id');
            $table->string('clave')->unique()->change();
        });
    }
};
