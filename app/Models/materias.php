<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materias extends Model
{
    use HasFactory;

    protected $table = 'materias';
    protected $primaryKey = 'clave';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nombre',
        'clave',
        'creditos',
        'semestre',
        'descripcion',
        'visible',
    ];
}
