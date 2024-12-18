<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriasSeeder extends Seeder
{
    public function run()
    {
                // Vaciar la tabla antes de insertar nuevos datos
                DB::table('materias')->truncate();
        $materias = [
            // Primer Semestre
            ['nombre' => 'Álgebra', 'clave' => 'MAT101', 'creditos' => 5, 'semestre' => 1, 'descripcion' => 'Conceptos básicos de álgebra.'],
            ['nombre' => 'Inglés I', 'clave' => 'ING101', 'creditos' => 4, 'semestre' => 1, 'descripcion' => 'Introducción al inglés nivel básico.'],
            ['nombre' => 'Química I', 'clave' => 'QUI101', 'creditos' => 4, 'semestre' => 1, 'descripcion' => 'Fundamentos básicos de química.'],
            ['nombre' => 'Tecnologías de la Información y la Comunicación', 'clave' => 'TIC101', 'creditos' => 5, 'semestre' => 1, 'descripcion' => 'Uso de herramientas TIC.'],
            ['nombre' => 'Lectura, Expresión Oral y Escrita I', 'clave' => 'COM101', 'creditos' => 3, 'semestre' => 1, 'descripcion' => 'Técnicas de lectura y escritura.'],
            ['nombre' => 'Lógica', 'clave' => 'LOG101', 'creditos' => 3, 'semestre' => 1, 'descripcion' => 'Introducción al razonamiento lógico.'],
            ['nombre' => 'Módulo I', 'clave' => 'MOD101', 'creditos' => 5, 'semestre' => 1, 'descripcion' => 'Primera fase del módulo profesional.'],

            // Segundo Semestre
            ['nombre' => 'Geometría y Trigonometría', 'clave' => 'MAT102', 'creditos' => 5, 'semestre' => 2, 'descripcion' => 'Estudio de figuras y trigonometría.'],
            ['nombre' => 'Inglés II', 'clave' => 'ING102', 'creditos' => 4, 'semestre' => 2, 'descripcion' => 'Desarrollo de habilidades en inglés.'],
            ['nombre' => 'Química II', 'clave' => 'QUI102', 'creditos' => 4, 'semestre' => 2, 'descripcion' => 'Conceptos avanzados de química.'],
            ['nombre' => 'Lectura, Expresión Oral y Escrita II', 'clave' => 'COM102', 'creditos' => 3, 'semestre' => 2, 'descripcion' => 'Perfeccionamiento de habilidades comunicativas.'],
            ['nombre' => 'Ciencia, Tecnología, Sociedad y Valores II', 'clave' => 'CTS102', 'creditos' => 3, 'semestre' => 2, 'descripcion' => 'Relación entre ciencia y sociedad.'],
            ['nombre' => 'Módulo II', 'clave' => 'MOD102', 'creditos' => 5, 'semestre' => 2, 'descripcion' => 'Segunda fase del módulo profesional.'],

            // Tercer Semestre
            ['nombre' => 'Geometría Analítica', 'clave' => 'MAT201', 'creditos' => 5, 'semestre' => 3, 'descripcion' => 'Estudio de coordenadas y ecuaciones.'],
            ['nombre' => 'Inglés III', 'clave' => 'ING201', 'creditos' => 4, 'semestre' => 3, 'descripcion' => 'Nivel intermedio de inglés.'],
            ['nombre' => 'Biología', 'clave' => 'BIO201', 'creditos' => 4, 'semestre' => 3, 'descripcion' => 'Estudio de organismos vivos.'],
            ['nombre' => 'Ética', 'clave' => 'ETI201', 'creditos' => 3, 'semestre' => 3, 'descripcion' => 'Reflexión sobre valores y moral.'],
            ['nombre' => 'Ecología', 'clave' => 'ECO201', 'creditos' => 3, 'semestre' => 3, 'descripcion' => 'Relación entre organismos y ambiente.'],
            ['nombre' => 'Módulo III', 'clave' => 'MOD201', 'creditos' => 5, 'semestre' => 3, 'descripcion' => 'Tercera fase del módulo profesional.'],

            // Cuarto Semestre
            ['nombre' => 'Cálculo Diferencial', 'clave' => 'MAT202', 'creditos' => 5, 'semestre' => 4, 'descripcion' => 'Introducción al cálculo diferencial.'],
            ['nombre' => 'Inglés IV', 'clave' => 'ING202', 'creditos' => 4, 'semestre' => 4, 'descripcion' => 'Nivel avanzado de inglés.'],
            ['nombre' => 'Física I', 'clave' => 'FIS202', 'creditos' => 4, 'semestre' => 4, 'descripcion' => 'Estudio de mecánica clásica.'],
            ['nombre' => 'Ciencia, Tecnología, Sociedad y Valores III', 'clave' => 'CTS203', 'creditos' => 3, 'semestre' => 4, 'descripcion' => 'Avances tecnológicos y su impacto social.'],
            ['nombre' => 'Asignatura Propedéutica', 'clave' => 'PRO202', 'creditos' => 4, 'semestre' => 4, 'descripcion' => 'Preparación para estudios avanzados.'],
            ['nombre' => 'Módulo IV', 'clave' => 'MOD202', 'creditos' => 5, 'semestre' => 4, 'descripcion' => 'Cuarta fase del módulo profesional.'],

            // Quinto Semestre
            ['nombre' => 'Cálculo Integral', 'clave' => 'MAT301', 'creditos' => 5, 'semestre' => 5, 'descripcion' => 'Introducción al cálculo integral.'],
            ['nombre' => 'Inglés V', 'clave' => 'ING301', 'creditos' => 4, 'semestre' => 5, 'descripcion' => 'Fluidez en inglés profesional.'],
            ['nombre' => 'Física II', 'clave' => 'FIS301', 'creditos' => 4, 'semestre' => 5, 'descripcion' => 'Conceptos avanzados de física.'],
            ['nombre' => 'Asignatura Propedéutica II', 'clave' => 'PRO301', 'creditos' => 4, 'semestre' => 5, 'descripcion' => 'Preparación académica avanzada.'],
            ['nombre' => 'Módulo V', 'clave' => 'MOD301', 'creditos' => 5, 'semestre' => 5, 'descripcion' => 'Quinta fase del módulo profesional.'],

            // Sexto Semestre
            ['nombre' => 'Probabilidad y Estadística', 'clave' => 'MAT302', 'creditos' => 5, 'semestre' => 6, 'descripcion' => 'Estudio de probabilidades y datos.'],
            ['nombre' => 'Asignatura Propedéutica III', 'clave' => 'PRO302', 'creditos' => 4, 'semestre' => 6, 'descripcion' => 'Finalización de preparación académica.'],
            ['nombre' => 'Módulo VI', 'clave' => 'MOD302', 'creditos' => 5, 'semestre' => 6, 'descripcion' => 'Última fase del módulo profesional.'],
        ];

        DB::table('materias')->insert($materias);
    }
}
