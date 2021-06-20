<?php

namespace Database\Seeders;

use App\Models\Instrument_type;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(SpecialitySeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(InstrumentTypeSeeder::class);
        $this->call(InstrumentSeeder::class);
    }
}
