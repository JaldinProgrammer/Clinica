<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert([
            [
                'name' => 'de centro a primer anillo',
                'price' => '0'
            ],
            [
                'name' => 'de primer anillo a tercer anillo',
                'price' => '5'
            ],
            [
                'name' => 'de tecer anillo a cuarto anillo',
                'price' => '10'
            ],
            [
                'name' => 'de cuarto anillo a septimo anillo',
                'price' => '20'
            ],
            [
                'name' => 'de septimo anillo en adelante',
                'price' => '30'
            ],
        ]);
    }
}
