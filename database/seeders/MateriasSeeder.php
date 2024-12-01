<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriasSeeder extends Seeder
{
    public function run()
    {
        $materias = [
            // Primer Semestre
            ['nombre' => 'Álgebra', 'clave' => 'MAT101', 'creditos' => 5, 'semestre' => 1],
            ['nombre' => 'Inglés I', 'clave' => 'ING101', 'creditos' => 4, 'semestre' => 1],
            ['nombre' => 'Química I', 'clave' => 'QUI101', 'creditos' => 4, 'semestre' => 1],
            ['nombre' => 'Tecnologías de la Información y la Comunicación', 'clave' => 'TIC101', 'creditos' => 5, 'semestre' => 1],
            ['nombre' => 'Lectura, Expresión Oral y Escrita I', 'clave' => 'COM101', 'creditos' => 3, 'semestre' => 1],
            ['nombre' => 'Lógica', 'clave' => 'LOG101', 'creditos' => 3, 'semestre' => 1],
            ['nombre' => 'Módulo I', 'clave' => 'MOD101', 'creditos' => 5, 'semestre' => 1],

            // Segundo Semestre
            ['nombre' => 'Geometría y Trigonometría', 'clave' => 'MAT102', 'creditos' => 5, 'semestre' => 2],
            ['nombre' => 'Inglés II', 'clave' => 'ING102', 'creditos' => 4, 'semestre' => 2],
            ['nombre' => 'Química II', 'clave' => 'QUI102', 'creditos' => 4, 'semestre' => 2],
            ['nombre' => 'Lectura, Expresión Oral y Escrita II', 'clave' => 'COM102', 'creditos' => 3, 'semestre' => 2],
            ['nombre' => 'Ciencia, Tecnología, Sociedad y Valores II', 'clave' => 'CTS102', 'creditos' => 3, 'semestre' => 2],
            ['nombre' => 'Módulo II', 'clave' => 'MOD102', 'creditos' => 5, 'semestre' => 2],

            // Tercer Semestre
            ['nombre' => 'Geometría Analítica', 'clave' => 'MAT201', 'creditos' => 5, 'semestre' => 3],
            ['nombre' => 'Inglés III', 'clave' => 'ING201', 'creditos' => 4, 'semestre' => 3],
            ['nombre' => 'Biología', 'clave' => 'BIO201', 'creditos' => 4, 'semestre' => 3],
            ['nombre' => 'Ética', 'clave' => 'ETI201', 'creditos' => 3, 'semestre' => 3],
            ['nombre' => 'Ecología', 'clave' => 'ECO201', 'creditos' => 3, 'semestre' => 3],
            ['nombre' => 'Módulo III', 'clave' => 'MOD201', 'creditos' => 5, 'semestre' => 3],

            // Cuarto Semestre
            ['nombre' => 'Cálculo Diferencial', 'clave' => 'MAT202', 'creditos' => 5, 'semestre' => 4],
            ['nombre' => 'Inglés IV', 'clave' => 'ING202', 'creditos' => 4, 'semestre' => 4],
            ['nombre' => 'Física I', 'clave' => 'FIS202', 'creditos' => 4, 'semestre' => 4],
            ['nombre' => 'Ciencia, Tecnología, Sociedad y Valores III', 'clave' => 'CTS203', 'creditos' => 3, 'semestre' => 4],
            ['nombre' => 'Asignatura Propedéutica', 'clave' => 'PRO202', 'creditos' => 4, 'semestre' => 4],
            ['nombre' => 'Módulo IV', 'clave' => 'MOD202', 'creditos' => 5, 'semestre' => 4],

            // Quinto Semestre
            ['nombre' => 'Cálculo Integral', 'clave' => 'MAT301', 'creditos' => 5, 'semestre' => 5],
            ['nombre' => 'Inglés V', 'clave' => 'ING301', 'creditos' => 4, 'semestre' => 5],
            ['nombre' => 'Física II', 'clave' => 'FIS301', 'creditos' => 4, 'semestre' => 5],
            ['nombre' => 'Asignatura Propedéutica II', 'clave' => 'PRO301', 'creditos' => 4, 'semestre' => 5],
            ['nombre' => 'Módulo V', 'clave' => 'MOD301', 'creditos' => 5, 'semestre' => 5],

            // Sexto Semestre
            ['nombre' => 'Probabilidad y Estadística', 'clave' => 'MAT302', 'creditos' => 5, 'semestre' => 6],
            ['nombre' => 'Asignatura Propedéutica III', 'clave' => 'PRO302', 'creditos' => 4, 'semestre' => 6],
            ['nombre' => 'Módulo VI', 'clave' => 'MOD302', 'creditos' => 5, 'semestre' => 6],
        ];

        DB::table('materias')->insert($materias);
    }
}
