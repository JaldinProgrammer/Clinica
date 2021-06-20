<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class InstrumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instruments')->insert([
            [
                'name' => 'gasas',
                'price' => 2.0,
                'stock' => 10,
                'instrument_type_id' => 1
            ],
            [
                'name' => 'torundas ',
                'price' => 4.5,
                'stock' => 10,
                'instrument_type_id' => 1
            ],
            [
                'name' => 'clorhexidina ',
                'price' => 15.0,
                'stock' => 10,
                'instrument_type_id' => 1
            ],
            [
                'name' => 'iodopovidona ',
                'price' => 10.0,
                'stock' => 10,
                'instrument_type_id' => 1
            ],
            [
                'name' => 'micropore',
                'price' => 6.5,
                'stock' => 10,
                'instrument_type_id' => 1
            ],
            [
                'name' => 'hojas de bisturí',
                'price' => 6.1,
                'stock' => 10,
                'instrument_type_id' => 2
            ],
            [
                'name' => 'jeringas ',
                'price' => 3.5,
                'stock' => 100,
                'instrument_type_id' => 2
            ],
            [
                'name' => 'agujas quirúrgicas',
                'price' => 2.5,
                'stock' => 100,
                'instrument_type_id' => 2
            ],
            [
                'name' => 'tijeras',
                'price' => 0,
                'stock' => 100,
                'instrument_type_id' => 2
            ],
            [
                'name' => 'Clonazepan',
                'price' => 60.0,
                'stock' => 100,
                'instrument_type_id' => 3
            ],
            [
                'name' => 'Tetrahidrocanabinol',
                'price' => 34.5,
                'stock' => 100,
                'instrument_type_id' => 3
            ],
            [
                'name' => 'Lingotema',
                'price' => 16.5,
                'stock' => 100,
                'instrument_type_id' => 3
            ]
        ]);
    }
}
