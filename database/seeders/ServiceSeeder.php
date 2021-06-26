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
                'price' => '0'
            ],
            [
                'name' => 'Cardiología',
                'price' => '5'
            ],
            [
                'name' => 'Anestesiología',
                'price' => '10'
            ],
            [
                'name' => 'Oncología',
                'price' => '20'
            ],
            [
                'name' => 'Fisioterapia',
                'price' => '30'
            ],
            [
                'name' => 'Cirugía',
                'price' => '5'
            ],
            [
                'name' => 'Neurología',
                'price' => '10'
            ],
            [
                'name' => 'Dermatología',
                'price' => '20'
            ],
            [
                'name' => 'Ortopedia',
                'price' => '30'
            ]
        ]);
    }
}
