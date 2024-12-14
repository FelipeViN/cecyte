<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grupos extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'semestre', 'cicloEscolar'];
     // Relación con estudiantes
   public function estudiantes()
   {
       return $this->belongsToMany(Estudiantes::class, 'alumno_grupo', 'grupo_id', 'estudiante_id');
   }


    // Relación muchos a muchos con Materias
    public function materias()
    {
        return $this->belongsToMany(Materias::class, 'grupo_materia');  // Tabla intermedia 'grupo_materia'
    }

    public function calificaciones()
{
    return $this->hasMany(CalificacionEducativa::class);
}
}
