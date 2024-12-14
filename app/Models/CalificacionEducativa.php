<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalificacionEducativa extends Model
{
    use HasFactory;

    // Nombre de la tabla si no es el plural por convención
    protected $table = 'calificaciones_educativas';

    // Definir las columnas que pueden ser asignadas en masa
    protected $fillable = [
        'estudiante_id',
        'grupo_id',
        'primera_evaluacion',
        'segunda_evaluacion',
        'evaluacion_final',
    ];

    // Relación con el estudiante
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    // Relación con el grupo
    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }

    // Puedes agregar una función para obtener el promedio de las calificaciones
    public function obtenerPromedio()
    {
        return ($this->primera_evaluacion + $this->segunda_evaluacion + $this->evaluacion_final) / 3;
    }
}

