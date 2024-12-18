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
            // Eliminar la clave primaria actual (id)
            $table->dropPrimary();
            $table->dropColumn('id');

            // Asignar clave como la nueva clave primaria
            $table->string('clave')->primary()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('materias', function (Blueprint $table) {
            // Revertir los cambios
            $table->dropPrimary();
            $table->increments('id');
            $table->string('clave')->unique()->change();
        });
    }
};
