<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            [
                'name' => 'Oftalmología',
                'price' => '400',
                'description' => 'La oftalmología es la especialidad médica encargada del estudio y tratamiento de las enfermedades del ojo y estructuras perioculares. La visión es uno de los sentidos más preciados por ello es imprescindible garantizar un buen cuidado, tanto de forma preventiva en situaciones de salud mediante exámenes rutinarios como en situaciones de enfermedad'
            ],
            [
                'name' => 'Cardiología',
                'price' => '50',
                'description' => 'La cardiología es la rama de la medicina que se encarga del estudio, diagnóstico y tratamiento de las enfermedades del corazón y del aparato circulatorio. Es médica, pero no quirúrgica; los especialistas en el abordaje quirúrgico del corazón son el cirujano cardiaco o el cirujano cardiovascular.'
            ],
            [
                'name' => 'Consulta',
                'price' => '100',
                'description' => 'La consulta médica general es una revisión médica integral con un protocolo común en el cual el médico explora a nivel subjetivo y objetivo un malestar, dolor, sufrimiento, o daño del paciente. El médico hace uso de sus conocimientos, intuición y conciencia para establecer un diagnóstico y dar una solución a un problema de salud.'
            ],
            [
                'name' => 'Oncología',
                'price' => '200',
                'description' => 'La oncología es la especialidad médica que estudia y trata las neoplasias; tumores benignos y malignos, pero con especial atención a los tumores malignos o cáncer. '
            ],
            [
                'name' => 'Fisioterapia',
                'price' => '300',
                'description' => 'La fisioterapia, también conocida como terapia física,​ es una disciplina de la ciencia de la salud que ofrece un tratamiento terapéutico y de rehabilitación no farmacológica para diagnosticar, prevenir y tratar síntomas de múltiples dolencias, tanto agudas como crónicas, por medio de ejercicios terapéuticos y agentes físicos como la electricidad, ultrasonido, láser, calor, frío, agua, técnicas manuales como estiramientos, tracciones, masoterapia.'
            ],
            [
                'name' => 'Dermatología',
                'price' => '200',
                'description' => 'La dermatología es la rama de la medicina que se encarga del estudio, conocimiento y el tratamiento de las enfermedades o afecciones de la piel. El vocablo proviene del griego «derma» que significa piel. Esta especialidad además se encarga de la prevención de las enfermedades, de la conservación y cuidado de la normalidad cutánea como también de la dermocosmetica que se dedica a la higiene, la protección y la apariencia de la piel humana. Específicamente las funciones que abarca la dermatología son la protección contra agentes físicos, químicos, radiaciones, virus, hongos y bacterias.'
            ],
            [
                'name' => 'Ortopedia',
                'price' => '300',
                'description' => 'La ortopedia es la técnica que busca corregir o evitar las deformidades del cuerpo humano mediante ejercicios corporales o diversos aparatos.Los aparatos ortopédicos son denominados órtosis u ortesis, y se diferencian de las prótesis (que buscan reemplazar de forma artificial alguna parte del cuerpo que, por algún motivo, falta).'
            ]
        ]);
    }
}
