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
        $table->boolean('visible')->default(true); // Por defecto, será visible
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('materias', function (Blueprint $table) {
        $table->dropColumn('visible'); // Elimina la columna visible
    });
}

};
