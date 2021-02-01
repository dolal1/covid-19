<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Healthworker;

class HealthworkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Healthworker::create([
            'name'  => 'Collin Doki',
            'username'  => 'collindoki',
            'hospital_id'=> 1,
        ]);
    }
}
