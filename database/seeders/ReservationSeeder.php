<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
Use Carbon\Carbon;
use phpDocumentor\Reflection\Types\Nullable;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservations')->insert([
            [
                'date' => Carbon::parse('2021-05-19'),
                'details' => ' necesito una reserva pa atendir mi exceso de belleza',
                'time' => Carbon::now(),
                'user_id' => 1,
                'service_id' => 1,
                'location_id' => null
            ]
        ]);
    }
}
