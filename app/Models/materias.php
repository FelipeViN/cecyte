<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materias extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla si es diferente
    protected $table = 'materias';

    // Define los campos que pueden ser asignados masivamente
    protected $fillable = ['nombre', 'clave', 'creditos', 'semestre'];
}
