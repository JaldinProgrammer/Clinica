<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialities')->insert([
            [
                'name' => 'Alergología'
            ],
            [
                'name' => 'Anestesiología'
            ],
            [
                'name' => 'Angiología'
            ],
            [
                'name' => 'Cardiología'
            ],
            [
                'name' => 'Endocrinología'
            ],
            [
                'name' => 'Gastroenterología'
            ],
            [
                'name' => 'Hematología'
            ],
            [
                'name' => 'Infectología'
            ],
            [
                'name' => 'Neumología'
            ],
            [
                'name' => 'Neurología'
            ],
            [
                'name' => 'Nutriología'
            ],
            [
                'name' => 'Oncología médica'
            ],
            [
                'name' => 'Pediatría'
            ],
            [
                'name' => 'Psiquiatría'
            ],
            [
                'name' => 'Toxicología'
            ]
        ]);
    }
}
