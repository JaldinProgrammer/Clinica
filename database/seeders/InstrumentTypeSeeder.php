<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class InstrumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instrument_types')->insert([
            [
                'name' => 'Material de antisepsia'
            ],
            [
                'name' => 'Material corto punzante'
            ],
            [
                'name' => 'Material esteril'
            ],
            [
                'name' => 'Farmacos'
            ]
        ]);
    }
}
