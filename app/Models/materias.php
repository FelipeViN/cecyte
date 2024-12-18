<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materias extends Model
{
    use HasFactory;

    protected $table = 'materias';

    protected $primaryKey = 'clave'; // Especifica que 'clave' es la clave primaria

    public $incrementing = false; // Indica que 'clave' no es autoincremental
    protected $keyType = 'string'; // Define que la clave primaria es de tipo string

    protected $fillable = ['nombre', 'clave', 'creditos', 'semestre', 'descripcion', 'visible'];
}
