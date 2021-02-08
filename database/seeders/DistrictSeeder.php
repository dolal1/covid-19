<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        District::create([
            'name'  => 'Kampala',
        ]);
        District::create([
            'name'  => 'Wakiso',
        ]);
        District::create([
            'name'  => 'Mukono',
        ]);
    }
}
